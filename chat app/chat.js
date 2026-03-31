document.getElementById('send').addEventListener('click', function() {
    var message = document.getElementById('message').value;

    if (message.trim() !== '') {
        sendMessage(message);
    }
});

function sendMessage(message) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_message.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            loadMessages();
        }
    };

    xhr.send('message=' + encodeURIComponent(message));
    document.getElementById('message').value = '';
}

function loadMessages() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'load_messages.php', true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('chat-box').innerHTML = xhr.responseText;
        }
    };

    xhr.send();
}

setInterval(loadMessages, 2000);