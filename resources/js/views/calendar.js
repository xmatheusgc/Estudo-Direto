document.addEventListener('DOMContentLoaded', function() {
    const monthYear = document.getElementById('month-year');
    const calendarDays = document.getElementById('calendar-days');
    const prevMonthButton = document.getElementById('prev-month');
    const nextMonthButton = document.getElementById('next-month');
    const eventModal = document.getElementById('event-modal');
    const eventForm = document.getElementById('event-form');
    const eventDateInput = document.getElementById('event-date');
    const eventTextInput = document.getElementById('event-text');
    const eventCategoryInput = document.getElementById('event-category');
    const closeModal = document.querySelector('.close');

    let date = new Date();
    let currentMonth = date.getMonth();
    let currentYear = date.getFullYear();
    let events = {}; // Object to hold events

    function renderCalendar(month, year) {
        if (monthYear) {
            monthYear.textContent = `${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}`;
        }

        if (calendarDays) {
            calendarDays.innerHTML = '';
        }

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            calendarDays?.appendChild(document.createElement('div'));
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const dayElement = document.createElement('div');
            dayElement.textContent = i;
            dayElement.classList.add('calendar-date');
            dayElement.dataset.date = `${year}-${month + 1}-${i}`;

            if (events[`${year}-${month + 1}-${i}`]) {
                const event = events[`${year}-${month + 1}-${i}`];
                const eventElement = document.createElement('div');
                eventElement.classList.add('event', event.category);
                eventElement.textContent = event.text;
                dayElement.appendChild(eventElement);

                eventElement.addEventListener('mouseenter', function() {
                    this.classList.add('expanded');
                });

                eventElement.addEventListener('mouseleave', function() {
                    this.classList.remove('expanded');
                });
            }

            dayElement.addEventListener('click', function() {
                eventDateInput.value = this.dataset.date;
                eventModal.style.display = 'block';
            });

            calendarDays?.appendChild(dayElement);
        }
    }

    prevMonthButton?.addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    });

    nextMonthButton?.addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    });

    closeModal?.addEventListener('click', function() {
        eventModal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == eventModal) {
            eventModal.style.display = 'none';
        }
    });

    eventForm?.addEventListener('submit', function(event) {
        event.preventDefault();
        const date = eventDateInput.value;
        const text = eventTextInput.value;
        const category = eventCategoryInput.value;

        events[date] = { text, category };
        renderCalendar(currentMonth, currentYear);
        eventModal.style.display = 'none';

        // Limpa os campos após o envio
        eventTextInput.value = '';
        eventCategoryInput.value = 'Pessoal'; // Defina o valor padrão de volta, se necessário
        eventDateInput.value = '';
    });

    renderCalendar(currentMonth, currentYear);
});
