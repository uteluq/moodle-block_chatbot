/**
 * @copyright 2025 Université TÉLUQ
 */

define(['jquery', 'core/str'], function($, str) {
    return {
        init: function(wwwroot, sesskey, userid, courseid) {
            // Toggle prompt modal
            const togglePromptModal = function() {
                const modal = document.getElementById('promptModal');
                modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
            };

            // Toggle file upload modal
            const toggleFileUploadModal = function() {
                const modal = document.getElementById('fileUploadModal');
                modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
            };

            // Handle chat form submission
            $("#chatform").on("submit", function(e) {
                e.preventDefault();
                const question = $("#question").val();
                const errorDiv = $("#error-message");

                str.get_string('sending_question', 'block_uteluqchatbot').then(function(sendingQuestionStr) {
                    errorDiv.text(sendingQuestionStr);
                }).catch(function() {
                    errorDiv.text("Sending the question...");
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
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    errorDiv.text("");
                    if (data.error) {
                        str.get_string('error', 'block_uteluqchatbot').then(function(errorStr) {
                            errorDiv.text(errorStr + data.error);
                        }).catch(function() {
                            errorDiv.text("Error: " + data.error);
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
                .catch(function(error) {
                    console.error("Error:", error);
                    str.get_string('error_sending_question', 'block_uteluqchatbot').then(function(errorSendingQuestionStr) {
                        errorDiv.text(errorSendingQuestionStr + error.message);
                    }).catch(function() {
                        errorDiv.text("Error sending the question: " + error.message);
                    });
                });
            });

            // Handle prompt form submission
            $("#promptform").on("submit", function(e) {
                e.preventDefault();
                const prompttext = $("#prompttext").val();
                const errorDiv = $("#error-message");

                str.get_string('saving_prompt', 'block_uteluqchatbot').then(function(savingPromptStr) {
                    errorDiv.text(savingPromptStr);
                }).catch(function() {
                    errorDiv.text("Saving the prompt...");
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
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    errorDiv.text("");
                    if (data.error) {
                        str.get_string('error', 'block_uteluqchatbot').then(function(errorStr) {
                            errorDiv.text(errorStr + data.error);
                        }).catch(function() {
                            errorDiv.text("Error: " + data.error);
                        });
                        return;
                    }
                    str.get_string('prompt_saved_successfully', 'block_uteluqchatbot').then(function(promptSavedSuccessfullyStr) {
                        errorDiv.text(promptSavedSuccessfullyStr);
                    }).catch(function() {
                        errorDiv.text("Prompt saved successfully!");
                    });
                    togglePromptModal();
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                })
                .catch(function(error) {
                    console.error("Error:", error);
                    str.get_string('error_saving_prompt', 'block_uteluqchatbot').then(function(errorSavingPromptStr) {
                        errorDiv.text(errorSavingPromptStr + error.message);
                    }).catch(function() {
                        errorDiv.text("Error saving the prompt: " + error.message);
                    });
                });
            });

            // Handle file upload form submission
            document.getElementById("fileUploadForm").addEventListener("submit", function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const errorDiv = document.getElementById("error-message");

                formData.append('userid', userid);
                formData.append('courseid', courseid);

                str.get_string('uploading_file', 'block_uteluqchatbot').then(function(uploadingFileStr) {
                    errorDiv.textContent = uploadingFileStr;
                }).catch(function() {
                    errorDiv.textContent = "Uploading the file...";
                });

                fetch(wwwroot + "/blocks/uteluqchatbot/weaviate_db.php", {
                    method: "POST",
                    body: formData,
                })
                .then(function(response) {
                    return response.text();
                })
                .then(function(responseText) {
                    let data;
                    try {
                        data = JSON.parse(responseText);
                    } catch (err) {
                        console.error("JSON parsing error:", err);
                        str.get_string('json_parse_error', 'block_uteluqchatbot').then(function(jsonParseErrorStr) {
                            errorDiv.textContent = jsonParseErrorStr + err.message;
                        }).catch(function() {
                            errorDiv.textContent = "JSON Parse Error: " + err.message;
                        });
                        throw new Error("The server response is not valid JSON.");
                    }

                    errorDiv.textContent = "";

                    if (data.error) {
                        str.get_string('error_processing_file', 'block_uteluqchatbot').then(function(errorProcessingFileStr) {
                            errorDiv.textContent = errorProcessingFileStr + data.error;
                        }).catch(function() {
                            errorDiv.textContent = "Error processing the file: " + data.error;
                        });
                        return;
                    }

                    str.get_string('file_indexed_successfully', 'block_uteluqchatbot').then(function(fileIndexedSuccessfullyStr) {
                        errorDiv.textContent = fileIndexedSuccessfullyStr;
                    }).catch(function() {
                        errorDiv.textContent = "File indexed successfully!";
                    });

                    document.getElementById("file").value = "";
                    document.getElementById("fileUploadModal").style.display = "none";

                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                })
                .catch(function(error) {
                    console.error("Error:", error);
                    str.get_string('error_processing_file', 'block_uteluqchatbot').then(function(errorProcessingFileStr) {
                        errorDiv.textContent = errorProcessingFileStr + error.message;
                    }).catch(function() {
                        errorDiv.textContent = "Error processing the file: " + error.message;
                    });
                });
            });

            // Expose functions to the global scope for HTML onclick handlers
            window.togglePromptModal = togglePromptModal;
            window.toggleFileUploadModal = toggleFileUploadModal;
        }
    };
});
