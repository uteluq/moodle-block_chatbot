<?php

class block_chatbot extends block_base
{
    public function init()
    {
        $this->title = get_string('pluginname', 'block_chatbot');
    }

    public function applicable_formats() {
        return array(
            'course-view' => true, // Only available in courses.
            'site'       => false, // Not available on the site homepage.
            'mod'        => false, // Not available in activities (modules).
            'my'         => false, // Not available on the user dashboard.
        );
    }
    public function instance_allow_multiple() {
        return false; // Prevents multiple instances of the block in the same course.
    }



    public function has_config()
    {
        return true;
    }

    public function get_content()
    {
        global $OUTPUT, $CFG, $USER, $COURSE, $DB;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass;

        // Get the current course name
        global $PAGE;
        $coursename = $PAGE->course->fullname;

        // Default prompt with dynamic course name
        $default_prompt =  get_string('default_prompt', 'block_chatbot');


        // Retrieve the existing prompt from the database
        $existing_prompt = $DB->get_record('block_chatbot_prompts', array('userid' => $USER->id, 'courseid' => $COURSE->id));

        // Check if the user is a teacher
        $coursecontext = context_course::instance($COURSE->id);
        $isteacher = has_capability('moodle/course:manageactivities', $coursecontext);

        // Prepare data for the templates
        $templateData = [
            'has_prompt' => !empty($existing_prompt),
            'prompt_text' => $existing_prompt ? $existing_prompt->prompt : $default_prompt,
            'isteacher' => $isteacher  // Add the isteacher variable
        ];

        // Load the templates
        $this->content->text = $OUTPUT->render_from_template('block_chatbot/chatbot', $templateData);
        $this->content->text .= $OUTPUT->render_from_template('block_chatbot/prompt_modal', $templateData);
        $this->content->text .= $OUTPUT->render_from_template('block_chatbot/load-course-modal', $templateData);

        // Add JavaScript
        $this->content->text .= <<<EOT
        <script type="text/javascript">
            function togglePromptModal() {
                const modal = document.getElementById('promptModal');
                modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
            }

            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById("chatform").addEventListener("submit", function(e) {
                    e.preventDefault();
                    const question = document.getElementById("question").value;
                    const errorDiv = document.getElementById("error-message");
                    //let sansRag = document.getElementById("toggleButtonsCheckbox").checked;

                    errorDiv.textContent = "Envoi de la question...";
                    body = JSON.stringify({
                            question: question,
                            //sansRag: sansRag,
                            sesskey: M.cfg.sesskey,
                            userid: {$USER->id},
                            courseid: {$COURSE->id}
                        });
                console.log(body);

                    fetch("{$CFG->wwwroot}/blocks/chatbot/ajax.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: body
                    })
                    .then(response => response.json())
                    .then(data => {
                        errorDiv.textContent = "";
                        if (data.error) {
                            errorDiv.textContent = "Erreur: " + data.error;
                            return;
                        }
                        const chatMessages = document.getElementById("chat-messages");
                        chatMessages.innerHTML += `
                            <div class="message user-message">\${question}</div>
                            <div class="message bot-message">\${data.answer}</div>
                        `;
                        document.getElementById("question").value = "";
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    })
                    .catch(error => {
                        console.error("Erreur:", error);
                        errorDiv.textContent = "Erreur lors de l'envoi de la question: " + error.message;
                    });
                });

                document.getElementById("promptform").addEventListener("submit", function(e) {
                    e.preventDefault();
                    //const promptname = document.getElementById("promptname").value;
                    //const promptdescription = document.getElementById("promptdescription").value;
                    const prompttext = document.getElementById("prompttext").value;
                    const errorDiv = document.getElementById("error-message");

                    errorDiv.textContent = "Enregistrement du prompt...";

                    fetch("{$CFG->wwwroot}/blocks/chatbot/add_prompt.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            //promptname: promptname,
                            // promptdescription: promptdescription,
                            prompttext: prompttext,
                            sesskey: M.cfg.sesskey,
                            userid: {$USER->id},
                            courseid: {$COURSE->id}
                        })
                    )
                    .then(response => response.json())
                    .then(data => {
                        errorDiv.textContent = "";
                        if (data.error) {
                            errorDiv.textContent = "Erreur: " + data.error;
                            return;
                        }
                        errorDiv.textContent = "Prompt enregistré avec succès!";
                        togglePromptModal();
                        setTimeout(() => {
                            location.reload(); // Reload to update the display
                        }, 1500);
                    })
                    .catch(error => {
                        console.error("Erreur:", error);
                        errorDiv.textContent = "Erreur lors de l'enregistrement du prompt: " + error.message;
                    });
                });


               document.getElementById("fileUploadForm").addEventListener("submit", function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                const errorDiv = document.getElementById("error-message");

                // Add userid and courseid to formData
                formData.append('userid', {$USER->id});
                formData.append('courseid', {$COURSE->id});
                console.log(formData);

                errorDiv.textContent = "Téléchargement du fichier en cours...";

                fetch("{$CFG->wwwroot}/blocks/chatbot/weaviate_db.php", {
                    method: "POST",
                    body: formData,
                })
                    .then(response => response.text()) // On récupère la réponse brute sous forme de texte
                    .then(responseText => {
                        let data;
                        console.log(responseText);

                        try {
                            // Tentative de parsing du JSON
                            data = JSON.parse(responseText);
                        } catch (err) {
                            console.error("Erreur de parsing JSON:", err);
                            throw new Error("La réponse du serveur n'est pas au format JSON valide.");
                        }

                        errorDiv.textContent = ""; // Réinitialise le message d'erreur

                        // Gestion des erreurs renvoyées dans le JSON
                        if (data.error) {
                            errorDiv.textContent = "Erreur: " + data.error;
                            return;
                        }

                        // Message de succès
                        errorDiv.textContent = "Fichier indexé avec succès!";
                        document.getElementById("file").value = ""; // Réinitialise l'input file
                        document.getElementById("fileUploadModal").style.display = "none"; // Ferme la modal

                        setTimeout(() => {
                            location.reload(); // Recharger pour mettre à jour l'affichage
                        }, 1500);
                    })
                    .catch(error => {
                        // Gestion des erreurs réseau ou autres
                        console.error("Erreur:", error);
                        errorDiv.textContent = "Erreur lors du traitement du fichier: " + error.message;
                    });
            });


            });
        </script>
        EOT;

        $this->content->footer = '';

        return $this->content;
    }
}
