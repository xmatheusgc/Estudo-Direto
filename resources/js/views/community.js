var btnSend = document.querySelector("#chat-send-btn")
btnSend.addEventListener('click', sendMessage)

var txtMessage = document.querySelector("#chat-text-box")

txtMessage.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        sendMessage()
    }
})

function sendMessage() {
    var txtMessage = document.querySelector("#chat-text-box")
    var messageContent = txtMessage.value

    if (messageContent !== '') { 
        const messageSection = document.querySelector(".messages-container")

        const userMessage = document.createElement('div')

        messageSection.appendChild(userMessage)
        userMessage.className = 'message-box'
        userMessage.id = 'user-message'
        userMessage.textContent = messageContent

        txtMessage.value = ''
    }
}

// 

var menu = document.querySelector(".menu")

var btnAddFriend = document.querySelector("#btn-add-friend")
btnAddFriend.addEventListener('click', showFriendMenu)

var btnVoltar = document.querySelector("#btn-exit-menu");
btnVoltar.addEventListener('click', showFriendMenu)

var overlayIsHidden = true

function showFriendMenu(){
    if (overlayIsHidden === true) {
        menu.style.display = "block"
        overlayIsHidden = false
    }
    else {
        menu.style.display = "none"
        overlayIsHidden = true
    }
}

