import "./bootstrap";
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.formatDateTime = function (datetime) {
    let year = String(datetime.getFullYear()).padStart(4, 0);
    let month = String(datetime.getMonth() + 1).padStart(2, 0);
    let day = String(datetime.getDate()).padStart(2, 0);

    let hour = String(datetime.getHours()).padStart(2, 0);
    let min = String(datetime.getMinutes()).padStart(2, 0);
    // let sec = String(datetime.getSeconds()).padStart(2, 0);

    return `${year}-${month}-${day} ${hour}:${min}`;
};
document.addEventListener("DOMContentLoaded", async function() {
    const response = await axios.get("/tasks/all/{{ $team->id }}");
    const events = response.data?.events ?? [];

    const myCalendar = document.getElementById("calendar");
    const calendar = new FullCalendar.Calendar(myCalendar, {
        initialView: window.innerWidth > 640 ? "dayGridMonth" : "timeGridDay",
        nowIndicator: true,
        selectable: true,
        selectMirror: true,
        events: events,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
        },
        eventClick: function(info) {
            const task = info.event.extendedProps;
            const taskName = task.name || task.title;

            updateTaskModal(task.id, taskName);
            updateTaskDate(task.start_date);
        }
    });
    calendar.render();
});

function updateTaskModal(taskId, taskName) {
    const taskModal = document.getElementById('taskModal');
    const taskTitle = document.getElementById('taskTitle');
    taskTitle.textContent = taskName;
    taskModal.showModal();
}

function updateTaskDate(startDate) {
    const taskStart = document.getElementById('taskStart');
    taskStart.value = formatDateTime(new Date(startDate));
}

function formatDateTime(date) {
    return date.toISOString().slice(0, 16); // Example: "2024-11-19T10:00"
}

