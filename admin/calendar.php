<?php
include("includes/db.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $eventName = mysqli_real_escape_string($con, $_POST["ename"]);
    $eventDatetime = mysqli_real_escape_string($con, $_POST["edatetime"]);
    $formattedDatetime = date("Y-m-d H:i:s", strtotime($eventDatetime));
    $eventDescription = mysqli_real_escape_string($con, $_POST["edesc"]);
    $eventColor = mysqli_real_escape_string($con, $_POST["ecolor"]);
    $eventIcon = mysqli_real_escape_string($con, $_POST["eicon"]);

    // Validate the form data (basic example)
    if (empty($eventName) || empty($formattedDatetime)) {
        header("Location: calendar.php?error=1"); // Missing required fields
        exit();
    }

    // Prepare and execute the SQL statement
    $stmt = mysqli_prepare($con, "INSERT INTO events (name, datetime_field, description, color, icon) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $eventName, $formattedDatetime, $eventDescription, $eventColor, $eventIcon);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: calendar.php?success=1");
        } else {
            header("Location: calendar.php?error=2"); // Insertion failed
        }
        mysqli_stmt_close($stmt);
    } else {
        header("Location: calendar.php?error=3"); // SQL preparation failed
    }
    exit();
}
?>





<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>

<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Calendar</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Calendar
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="calendar-wrap">
                    <div id="calendar"></div>
                </div>
                <!-- calendar modal -->
                <div id="modal-view-event" class="modal modal-top fade calendar-modal" tabindex="-1" role="dialog" aria-labelledby="modal-view-event-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="h4">
                                    <span class="event-icon weight-400 mr-3"></span>
                                    <span class="event-title"></span>
                                </h4>
                                <div class="event-body"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal-view-event-add" class="modal modal-top fade calendar-modal" tabindex="-1" role="dialog" aria-labelledby="modal-view-event-add-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form id="add-event" action="" method="post">
                                <div class="modal-body">
                                    <h4 class="text-blue h4 mb-10">Add Event Detail</h4>
                                    <div class="form-group">
                                        <label for="ename">Event name</label>
                                        <input type="text" class="form-control" name="ename" id="ename" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edatetime">Event Date</label>
                                        <input type="text" class="datetimepicker form-control" name="edatetime" id="edatetime" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edesc">Event Description</label>
                                        <textarea class="form-control" name="edesc" id="edesc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="ecolor">Event Color</label>
                                        <select class="form-control" name="ecolor" id="ecolor">
                                            <option value="fc-bg-default">Default</option>
                                            <option value="fc-bg-blue">Blue</option>
                                            <option value="fc-bg-lightgreen">Light Green</option>
                                            <option value="fc-bg-pinkred">Pink Red</option>
                                            <option value="fc-bg-deepskyblue">Deep Sky Blue</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="eicon">Event Icon</label>
                                        <select class="form-control" name="eicon" id="eicon">
                                            <option value="circle">Circle</option>
                                            <option value="cog">Cog</option>
                                            <option value="group">Group</option>
                                            <option value="suitcase">Suitcase</option>
                                            <option value="calendar">Calendar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript files -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="vendors/scripts/calendar-setting.js"></script>
