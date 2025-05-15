<?php

class block_chatbot extends block_base
{
    public function init()
    {
        $this->title = get_string('pluginname', 'block_chatbot');
    }

    public function applicable_formats() {
        return array(
            'course-view' => true, // Disponible uniquement dans les cours.
            'site'       => false, // Non disponible sur la page d'accueil.
            'mod'        => false, // Non disponible dans les activités (modules).
            'my'         => false, // Non disponible sur le tableau de bord utilisateur.
        );
    }
    public function instance_allow_multiple() {
        return false; // Empêche plusieurs instances du bloc dans un même cours.
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

        // Récupérer le nom du cours actuel
        global $PAGE;
        $coursename = $PAGE->course->fullname;

        // Le prompt par défaut avec le nom du cours dynamique
        $default_prompt = <<<EOT
Contexte de la situation :
L’apprenant suit un cours sur {$coursename}. Ton rôle est de l’accompagner en lui fournissant des réponses précises, pertinentes et adaptées à son apprentissage.
Mission :
En tant qu’assistant, ta mission est d’aider l’apprenant à comprendre les concepts du cours sur {$coursename} en répondant à ses questions, tout en t’appuyant sur le contexte fourni pour formuler une réponse. [[ historique ]].
Tu dois formuler des réponses claires, précises et pertinentes, en veillant à ne transmettre que des informations issues du cours. Si une réponse ne peut être trouvée dans le contexte fourni, répondre strictement par : " Je suis calibré en fonction du contenu du cours qui a été soigneusement sélectionné par votre enseignant. Si vous voulez plus de renseignement on vous invite à le contacter. "
Si l'apprenant écrit des phrases montrant qu'il n'a pas compris un concept ou une explication précédente, vérifie [[ historique ]] pour identifier ce qui a été mal compris, puis reformule ton explication avec plus de simplicité et des exemples plus concrets.
Instructions :
1. Détecte les émotions dans la question de l’apprenant et adopte un ton empathique et bienveillant.
2. Réponds de manière claire et structurée.
3. Explique le concept avec des exemples si nécessaire.
4. Ne fais aucune supposition en dehors du contexte fourni.
Nouvelle question de l’apprenant  [[ question ]] 
EOT;


        // Récupérer le prompt existant de l'utilisateur
        $existing_prompt = $DB->get_record('block_chatbot_prompts', array('userid' => $USER->id, 'courseid' => $COURSE->id));

        // Vérification du rôle enseignant
        $coursecontext = context_course::instance($COURSE->id);
        $isteacher = has_capability('moodle/course:manageactivities', $coursecontext);

        // Préparer les données pour les templates
        $templateData = [
            'has_prompt' => !empty($existing_prompt),
            'prompt_text' => $existing_prompt ? $existing_prompt->prompt : $default_prompt,
            'isteacher' => $isteacher  // Ajout de la variable isteacher,
        ];

        // Chargement des templates
        $this->content->text = $OUTPUT->render_from_template('block_chatbot/chatbot', $templateData);
        $this->content->text .= $OUTPUT->render_from_template('block_chatbot/prompt_modal', $templateData);
        $this->content->text .= $OUTPUT->render_from_template('block_chatbot/load-course-modal', $templateData);

        // Ajout du JavaScript
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
                    })
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
                            location.reload(); // Recharger pour mettre à jour l'affichage
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
