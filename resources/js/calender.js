document.addEventListener("DOMContentLoaded", async function () {
    const response = await axios.get("/tasks");
    const events = response.data.events;
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
                  initialView: "timeGridWeek", // initial view  =   l view li kayban  mni kan7ol l  calendar
                  slotMinTime: "09:00:00", // min  time  appear in the calendar
                  slotMaxTime: "19:00:00", // max  time  appear in the calendar
                  nowIndicator: true, 
          
                  selectOverlap: false, //  nkhali ktar mn event f  nfs  l wa9t  = e.g:   5 nas i reserviw nfs lblasa  f nfs l wa9t
                  weekends: true, 
                  editable: true,
                  droppable: true,
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
            updateTaskId.value = info.events.id;
            updateTaskName.value = info.events.title;
            updateTaskDescription.value = info.events.extendedProps.description;
            updateTaskStart.value = info.events.formatDateTime(info.event.start);
            updateTaskEnd.value = info.events.formatDateTime(info.event.end);

            updateTaskModal.show();
        },
        
    });
    calendar.render();
})
