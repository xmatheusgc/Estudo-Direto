var btnLight = document.querySelector('.btn-light-mode');
var btnDark = document.querySelector('.btn-dark-mode');

var imgBanner = document.querySelector('.banner-img')

var body = document.body;

btnLight.addEventListener('click', toggleMode);
btnDark.addEventListener('click', toggleMode);

var isDarkMode = localStorage.getItem('darkMode') === 'true';
if (isDarkMode) {
    toggleMode();
}

function toggleMode() {
    if (body.classList.contains('dark-mode')) {

        body.classList.remove('dark-mode');
        btnDark.style.display = 'none';
        btnLight.style.display = 'block';

        localStorage.setItem('darkMode', 'false');
    } else {

        body.classList.add('dark-mode');
        btnLight.style.display = 'none';
        btnDark.style.display = 'block';

        localStorage.setItem('darkMode', 'true');
    }
}