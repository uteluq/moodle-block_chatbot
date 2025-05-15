/**
 * @copyright 2025 Université TÉLUQ
 */



define(["jquery"], function($) {
    return {
      init: function(wwwroot, sesskey, userid, courseid) {
        $("#chatform").on("submit", function(e) {
          e.preventDefault();
          const question = $("#question").val();
          const errorDiv = $("#error-message");

          errorDiv.text("Envoi de la question...");

          fetch(`${wwwroot}/blocks/chatbot/ajax.php`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              question: question,
              sesskey: sesskey,
            }),
          })
            .then((response) => {
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
              }
              return response.json();
            })
            .then((data) => {
              errorDiv.text("");
              if (data.error) {
                errorDiv.text("Erreur: " + data.error);
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
            .catch((error) => {
              errorDiv.text(
                "Erreur lors de l'envoi de la question: " + error.message,
              );
            });
        });

        $("#promptform").on("submit", function(e) {
          e.preventDefault();
          const promptname = $("#promptname").val();
          const promptdescription = $("#promptdescription").val();
          const prompttext = $("#prompttext").val();
          const errorDiv = $("#error-message");

          errorDiv.text("Ajout du prompt...");

          fetch(`${wwwroot}/blocks/chatbot/add_prompt.php`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              name: promptname,
              description: promptdescription,
              text: prompttext,
              userid: userid,
              courseid: courseid,
            }),
          })
            .then((response) => {
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
              }
              return response.json();
            })
            .then((data) => {
              errorDiv.text("");
              if (data.error) {
                errorDiv.text("Erreur: " + data.error);
                return;
              }
              errorDiv.text("Prompt ajouté avec succès !");
              $("#promptform")[0].reset();
            })
            .catch((error) => {
              errorDiv.text("Erreur lors de l'ajout du prompt: " + error.message);
            });
        });
      },
    };
  });
