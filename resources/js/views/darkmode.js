function toggleTheme() {
    const body = document.body;
    const currentTheme = body.classList.contains('dark-theme') ? 'dark' : 'light';
    
    body.classList.toggle('dark-theme');
    body.classList.toggle('light-theme');

    localStorage.setItem('theme', currentTheme === 'dark' ? 'light' : 'dark');
}

document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme');
    const body = document.body;

    if (savedTheme) {
        body.classList.add(savedTheme === 'dark' ? 'dark-theme' : 'light-theme');
    } else {
        body.classList.add('light-theme');
    }

    document.getElementById('theme-toggle-btn').addEventListener('click', toggleTheme);
});
