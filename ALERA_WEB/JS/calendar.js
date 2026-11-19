const monthYearDisplay = document.getElementById('monthYearDisplay');
        const daysGrid = document.getElementById('daysGrid');
        const prevBtn = document.getElementById('prevMonth');
        const nextBtn = document.getElementById('nextMonth');

        // Month Names Array
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        let currentDate = new Date();
        let selectedDate = null;

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            const firstDayIndex = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();
            let daysHTML = "";

            const today = new Date();
            const todayKey = dateKey(today);
            const selectedKey = selectedDate && dateKey(selectedDate);

            for (let index = 0; index < 42; index++) {
                const date = new Date(year, month, index - firstDayIndex + 1);
                const key = dateKey(date);
                const isAdjacentMonth = date.getMonth() !== month;
                const isPreviousMonth = isAdjacentMonth && date < new Date(year, month, 1);
                const classes = [
                    isPreviousMonth ? "prev-date" : "",
                    isAdjacentMonth && !isPreviousMonth ? "next-date" : "",
                    key === todayKey ? "today" : "",
                    key === selectedKey ? "selected" : ""
                ].filter(Boolean).join(" ");
                const label = date.toLocaleDateString(undefined, {
                    weekday: "long",
                    year: "numeric",
                    month: "long",
                    day: "numeric"
                });

                daysHTML += `<button type="button" class="${classes}" data-date="${key}" aria-label="${label}"${key === todayKey ? ' aria-current="date"' : ""}${key === selectedKey ? ' aria-pressed="true"' : ' aria-pressed="false"'}>${date.getDate()}</button>`;
            }

            monthYearDisplay.innerText = `${months[month]} ${year}`;
            daysGrid.innerHTML = daysHTML;
        }

        function dateKey(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, "0");
            const day = String(date.getDate()).padStart(2, "0");
            return `${year}-${month}-${day}`;
        }

        daysGrid.addEventListener("click", (event) => {
            const dayButton = event.target.closest("button[data-date]");
            if (!dayButton || !daysGrid.contains(dayButton)) return;

            const [year, month, day] = dayButton.dataset.date.split("-").map(Number);
            selectedDate = new Date(year, month - 1, day);
            currentDate = new Date(year, month - 1, 1);
            renderCalendar();
        });

        prevBtn.addEventListener('click', () => {
            currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1);
            renderCalendar();
        });

        nextBtn.addEventListener('click', () => {
            currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1);
            renderCalendar();
        });

        renderCalendar();