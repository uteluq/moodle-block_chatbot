(function() {
    // Initialize the function
    function init(wwwroot, sesskey, userid, courseid) {
        // Toggle prompt modal
        function togglePromptModal() {
            const modal = document.getElementById('promptModal');
            modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
        }

        // Toggle file upload modal
        function toggleFileUploadModal() {
            const modal = document.getElementById('fileUploadModal');
            modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
        }

        // Handle chat form submission
        $("#chatform").on("submit", function(e) {
            e.preventDefault();
            const question = $("#question").val();
            const errorDiv = $("#error-message");

            require(['core/str'], function(str) {
                str.get_string('sending_question', 'block_uteluqchatbot').then(function(sendingQuestionStr) {
                    errorDiv.text(sendingQuestionStr);
                }).catch(function() {
                    errorDiv.text("Sending the question...");
                });
            });

            const body = JSON.stringify({
                question: question,
                sesskey: sesskey,
                userid: userid,
                courseid: courseid
            });

            fetch(wwwroot + "/blocks/uteluqchatbot/ajax.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: body
            })
            .then(response => response.json())
            .then(data => {
                errorDiv.text("");
                if (data.error) {
                    require(['core/str'], function(str) {
                        str.get_string('error', 'block_uteluqchatbot').then(function(errorStr) {
                            errorDiv.text(errorStr + data.error);
                        }).catch(function() {
                            errorDiv.text("Error: " + data.error);
                        });
                    });
                    return;
                }
                const chatMessages = $("#chat-messages");
                chatMessages.append(`
                    <div class="message user-message">${question}</div>
                    <div class="message bot-message">${data.answer}</div>
                `);
                $("#question").val("");
                chatMessages.scrollTop(chatMessages[0].scrollHeight);
            })
            .catch(error => {
                console.error("Error:", error);
                require(['core/str'], function(str) {
                    str.get_string('error_sending_question', 'block_uteluqchatbot').then(function(errorSendingQuestionStr) {
                        errorDiv.text(errorSendingQuestionStr + error.message);
                    }).catch(function() {
                        errorDiv.text("Error sending the question: " + error.message);
                    });
                });
            });
        });

        // Handle prompt form submission
        $("#promptform").on("submit", function(e) {
            e.preventDefault();
            const prompttext = $("#prompttext").val();
            const errorDiv = $("#error-message");

            require(['core/str'], function(str) {
                str.get_string('saving_prompt', 'block_uteluqchatbot').then(function(savingPromptStr) {
                    errorDiv.text(savingPromptStr);
                }).catch(function() {
                    errorDiv.text("Saving the prompt...");
                });
            });

            fetch(wwwroot + "/blocks/uteluqchatbot/add_prompt.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    prompttext: prompttext,
                    sesskey: sesskey,
                    userid: userid,
                    courseid: courseid
                })
            })
            .then(response => response.json())
            .then(data => {
                errorDiv.text("");
                if (data.error) {
                    require(['core/str'], function(str) {
                        str.get_string('error', 'block_uteluqchatbot').then(function(errorStr) {
                            errorDiv.text(errorStr + data.error);
                        }).catch(function() {
                            errorDiv.text("Error: " + data.error);
                        });
                    });
                    return;
                }
                require(['core/str'], function(str) {
                    str.get_string('prompt_saved_successfully', 'block_uteluqchatbot').then(function(promptSavedSuccessfullyStr) {
                        errorDiv.text(promptSavedSuccessfullyStr);
                    }).catch(function() {
                        errorDiv.text("Prompt saved successfully!");
                    });
                });
                togglePromptModal();
                setTimeout(() => {
                    location.reload(); // Reload to update the display
                }, 1500);
            })
            .catch(error => {
                console.error("Error:", error);
                require(['core/str'], function(str) {
                    str.get_string('error_saving_prompt', 'block_uteluqchatbot').then(function(errorSavingPromptStr) {
                        errorDiv.text(errorSavingPromptStr + error.message);
                    }).catch(function() {
                        errorDiv.text("Error saving the prompt: " + error.message);
                    });
                });
            });
        });

        // Handle file upload form submission
        document.getElementById("fileUploadForm").addEventListener("submit", function(e) {
            e.preventDefault();
            console.log("File upload form submitted"); // Debugging log

            const formData = new FormData(this);
            const errorDiv = document.getElementById("error-message");

            // Add userid and courseid to formData
            formData.append('userid', userid);
            formData.append('courseid', courseid);

            require(['core/str'], function(str) {
                str.get_string('uploading_file', 'block_uteluqchatbot').then(function(uploadingFileStr) {
                    errorDiv.textContent = uploadingFileStr;
                }).catch(function() {
                    errorDiv.textContent = "Uploading the file...";
                });
            });

            fetch(wwwroot + "/blocks/uteluqchatbot/weaviate_db.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.text())
            .then(responseText => {
                let data;
                try {
                    data = JSON.parse(responseText);
                } catch (err) {
                    console.error("JSON parsing error:", err);
                    require(['core/str'], function(str) {
                        str.get_string('json_parse_error', 'block_uteluqchatbot').then(function(jsonParseErrorStr) {
                            errorDiv.textContent = jsonParseErrorStr + err.message;
                        }).catch(function() {
                            errorDiv.textContent = "JSON Parse Error: " + err.message;
                        });
                    });
                    throw new Error("The server response is not valid JSON.");
                }

                errorDiv.textContent = "";

                if (data.error) {
                    require(['core/str'], function(str) {
                        str.get_string('error_processing_file', 'block_uteluqchatbot').then(function(errorProcessingFileStr) {
                            errorDiv.textContent = errorProcessingFileStr + data.error;
                        }).catch(function() {
                            errorDiv.textContent = "Error processing the file: " + data.error;
                        });
                    });
                    return;
                }

                require(['core/str'], function(str) {
                    str.get_string('file_indexed_successfully', 'block_uteluqchatbot').then(function(fileIndexedSuccessfullyStr) {
                        errorDiv.textContent = fileIndexedSuccessfullyStr;
                    }).catch(function() {
                        errorDiv.textContent = "File indexed successfully!";
                    });
                });

                document.getElementById("file").value = "";
                document.getElementById("fileUploadModal").style.display = "none";

                setTimeout(() => {
                    location.reload();
                }, 1500);
            })
            .catch(error => {
                console.error("Error:", error);
                require(['core/str'], function(str) {
                    str.get_string('error_processing_file', 'block_uteluqchatbot').then(function(errorProcessingFileStr) {
                        errorDiv.textContent = errorProcessingFileStr + error.message;
                    }).catch(function() {
                        errorDiv.textContent = "Error processing the file: " + error.message;
                    });
                });
            });
        });

        // Expose functions to the global scope for HTML onclick handlers
        window.togglePromptModal = togglePromptModal;
        window.toggleFileUploadModal = toggleFileUploadModal;
    }

    // Expose init globally
    window.Chatbot = {
        init: init
    };
})();
