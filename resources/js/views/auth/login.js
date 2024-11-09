document.getElementById('google-login-btn').addEventListener('click', function (e) {
    e.preventDefault();
    const popup = window.open('/login/google', 'Google Login', 'width=600,height=600');

    const interval = setInterval(function() {
        if (popup.closed) {
            clearInterval(interval); 
            return;
        }

        try {
            if (popup.location.href.includes('close-popup=true')) {
                popup.close(); 
                window.location.href = '/'; 
            }
        } catch (e) {
            clearInterval(interval); 
        }
    }, 500);
});

window.addEventListener('message', function(event) {
    if (event.data === 'close-popup') {
        window.location.href = '/'; 
    }
}, false);