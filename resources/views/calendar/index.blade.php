@extends('app')

@section('title', 'Noticias')

@section('content')

<main>
    <div class="calendar-container">
        <div class="calendar-header">
            <button id="prev-month">&lt;</button>
            <h2 id="month-year"></h2>
            <button id="next-month">&gt;</button>
        </div>
        <div class="calendar-grid">
            <div class="calendar-day">Dom</div>
            <div class="calendar-day">Seg</div>
            <div class="calendar-day">Ter</div>
            <div class="calendar-day">Qua</div>
            <div class="calendar-day">Qui</div>
            <div class="calendar-day">Sex</div>
            <div class="calendar-day">Sáb</div>
        </div>
        <div id="calendar-days" class="calendar-grid"></div>
    </div>

    <!-- Modal -->
    <div id="event-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Adicionar Evento</h2>
            <form id="event-form">
                <input type="hidden" id="event-date">
                
                <input type="text" id="event-text" placeholder="Lembrete" required>

                <select id="event-category" required>
                    <option value="Pessoal">Pessoal</option>
                    <option value="Trabalho">Trabalho</option>
                    <option value="Estudos">Estudos</option>
                    <option value="Outro">Outro</option>
                </select>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
</main>

@endsection
