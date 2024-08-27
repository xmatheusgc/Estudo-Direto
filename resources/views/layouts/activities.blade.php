@extends('app')

@section('title', 'Exercicios')

@section('content')

<main>
    <div class="activities-section">
        <h2>Atividades</h2>
        <div class="timer" id="timer">00:00:00</div>
        <div class="timer-buttons">
            <button onclick="startTimer()">Iniciar</button>
            <button onclick="pauseTimer()">Pausar</button>
            <button onclick="resetTimer()">Reiniciar</button>
        </div>
    </div>
</main>

<script>
    let timerInterval;
    let seconds = 0, minutes = 0, hours = 0;
    let isPaused = true;

    function updateTimerDisplay() {
        document.getElementById('timer').textContent = 
            `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }

    function startTimer() {
        if (isPaused) {
            isPaused = false;
            timerInterval = setInterval(() => {
                seconds++;
                if (seconds === 60) {
                    seconds = 0;
                    minutes++;
                    if (minutes === 60) {
                        minutes = 0;
                        hours++;
                    }
                }
                updateTimerDisplay();
            }, 1000);
        }
    }

    function pauseTimer() {
        if (!isPaused) {
            clearInterval(timerInterval);
            isPaused = true;
        }
    }

    function resetTimer() {
        clearInterval(timerInterval);
        isPaused = true;
        seconds = 0;
        minutes = 0;
        hours = 0;
        updateTimerDisplay();
    }

    // Initialize timer display
    updateTimerDisplay();
</script>

@endsection