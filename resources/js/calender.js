document.addEventListener("DOMContentLoaded", async function () {
    const response = await axios.get("/tasks");
    const events = response.task;
    const width = window.innerWidth;

    const myCalendar = document.getElementById("calendar");
    const calendar = new FullCalendar.Calendar(myCalendar, {
        initialView: width > 640 ? "timeGridWeek" : "timeGridDay",
        nowIndicator: true,
        headerToolbar:
            width > 640
                ? null
                : {
                      left: "prev,next",
                      right: "today",
                  },
        selectable: true,
        selectMirror: true,
        selectAllow: (info) => {
            let instant = new Date();
            return info.start >= instant;
        },
        select: (info) => {
            taskName.value = "";
            taskDescription.value = "";
            taskStart.value = formatDateTime(info.start);
            taskEnd.value = formatDateTime(info.end);

            addTaskModal.show();
        },

        events: events,
        eventClick: (info) => {
            updateTaskId.value = id;
            updateTaskName.value = title;
            updateTaskDescription.value = description;
            updateTaskStart.value = formatDateTime(start);
            updateTaskEnd.value = formatDateTime(end);

            updateTaskModal.show();
        },
    });
    calendar.render();
})
