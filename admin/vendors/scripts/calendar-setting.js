jQuery(document).ready(function () {
    jQuery("#add-event").submit(function () {
        alert("Submitted");
        var values = {};
        $.each($("#add-event").serializeArray(), function (i, field) {
            values[field.name] = field.value;
        });

        // Add the new event to the calendar
        jQuery("#calendar").fullCalendar('renderEvent', {
            title: values.ename,
            start: values.edate,
            description: values.edesc,
            className: values.ecolor,
            icon: values.eicon
        });

        // Close the modal or perform other actions as needed
        jQuery("#modal-view-event-add").modal('hide');
    });

    // Initialize FullCalendar
    jQuery("#calendar").fullCalendar({
        themeSystem: "bootstrap4",
        // emphasizes business hours
        businessHours: false,
        defaultView: "month",
        // event dragging & resizing
        editable: true,
        // header
        header: {
            left: "title",
            center: "month,agendaWeek,agendaDay",
            right: "today prev,next",
        },
        events: {
            url: 'events.php',
            method: 'GET',
            failure: function () {
                alert('There was an error fetching events!');
            }
        },
        dayClick: function () {
            jQuery("#modal-view-event-add").modal();
        },
        eventClick: function (event, jsEvent, view) {
            var orderLink = '<a href="http://localhost/Cake-Shop-Website-master/admin/approvedorder.php">View Order</a>';

            
            jQuery(".event-icon").html("<i class='fa fa-" + event.icon + "'></i>");
            jQuery(".event-title").html(event.name);
            
            // Combine the order link with other details in the event body
            var eventBody = orderLink + '<br>' + event.description;
        
            jQuery(".event-body").html(eventBody);
            jQuery(".eventUrl").attr("href", event.url);
            jQuery("#modal-view-event").modal();
        },
        
    });
});
