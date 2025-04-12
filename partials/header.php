

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz App with Chatbot</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="bg-blue-600 shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
            <a href="#" class="text-white text-2xl font-bold flex items-center">
                📚 QUESTIONAIRRE
            </a>

            <div class="flex items-center gap-4">
                <a href="./index.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                    🚪 Log out
                </a>
                
            </div>
        </div>
    </div>
</nav>

<!-- Chatbot Container -->
<div id="chatbot-container" class="fixed bottom-5 right-5 w-80 bg-white shadow-lg rounded-lg hidden">
    <div class="p-4 border-b bg-blue-600 text-white flex justify-between items-center">
        <span>🤖 AI Chatbot</span>
        <button id="close-chatbot" class="text-white">✖</button>
    </div>
    <div class="p-3 h-60 overflow-y-auto" id="chat-messages">
        <p class="text-gray-600">Hello! How can I help you today? 😊</p>
    </div>
    <div class="p-3 border-t flex">
        <input type="text" id="chat-input" class="flex-1 p-2 border rounded-l-md" placeholder="Type a message...">
        <button id="send-chat" class="bg-blue-600 text-white px-4 py-2 rounded-r-md">➡️</button>
    </div>
</div>

<!-- Chatbot JavaScript -->
<script>
document.getElementById("chatbot-btn").addEventListener("click", function () {
    document.getElementById("chatbot-container").classList.toggle("hidden");
});

document.getElementById("close-chatbot").addEventListener("click", function () {
    document.getElementById("chatbot-container").classList.add("hidden");
});

document.getElementById("send-chat").addEventListener("click", function () {
    let input = document.getElementById("chat-input");
    let message = input.value.trim();
    let chatBox = document.getElementById("chat-messages");

    if (message) {
        chatBox.innerHTML += `<p class="text-blue-600"><strong>You:</strong> ${message}</p>`;
        chatBox.scrollTop = chatBox.scrollHeight;
        input.value = "";

        fetch("<?php echo $_SERVER['PHP_SELF']; ?>", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            chatBox.innerHTML += `<p class="text-gray-600"><strong>Bot:</strong> ${data.response}</p>`;
            chatBox.scrollTop = chatBox.scrollHeight;
        })
        .catch(() => {
            chatBox.innerHTML += `<p class="text-red-500"><strong>Bot:</strong> Sorry, an error occurred.</p>`;
        });
    }
});

document.getElementById("chat-input").addEventListener("keypress", function (e) {
    if (e.key === "Enter") {
        document.getElementById("send-chat").click();
    }
});
</script>

</body>
</html>
