const clock_menu = document.getElementById('clock-menu');
const btnOpenClock = document.getElementById('btn-open-clock');
const btnCloseClock = document.getElementById('btn-close-clock')

let clockToggle = false;

btnOpenClock.addEventListener("click", toggleClockMenu);
btnCloseClock.addEventListener("click", toggleClockMenu);

function toggleClockMenu() {
    clockToggle = !clockToggle;

    if (clockToggle) {
        clock_menu.style.display = "block";
        btnOpenClock.style.display = "none"
    } else {
        clock_menu.style.display = "none"; 
        btnOpenClock.style.display = "block"
    }
}


const start_btn = document.getElementById('start-btn');
const reset_btn = document.getElementById('reset-btn');
const timer_numbers = document.getElementById('timer-num');

let minutes = 0;
let seconds = 0;
let milliseconds = 0;
let timer;
let isRunning = false;

start_btn.addEventListener("click", toggleTimer);
reset_btn.addEventListener("click", resetTimer);

function toggleTimer() {
    if (isRunning) {
        pauseTimer();
    } else {
        startTimer();
    }
}

function startTimer() {
    isRunning = true;
    start_btn.innerText = "Pausar"; // Muda o texto para "Pausar"
    
    timer = setInterval(() => {
        milliseconds += 1;

        if (milliseconds >= 100) {
            milliseconds = 0;
            seconds++;
        }

        if (seconds >= 60) {
            seconds = 0;
            minutes++;
        }

        updateTimer();
    }, 10);
}

function pauseTimer() {
    isRunning = false;
    start_btn.innerText = "Iniciar"; // Muda o texto para "Iniciar"
    clearInterval(timer);
}

function updateTimer() {
    timer_numbers.innerHTML = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')},${String(milliseconds).padStart(2, '0')}`;
}

function resetTimer() {
    clearInterval(timer);
    isRunning = false;
    minutes = 0;
    seconds = 0;
    milliseconds = 0;
    start_btn.innerText = "Iniciar"; // Reseta o botão para "Iniciar"
    updateTimer();
}
