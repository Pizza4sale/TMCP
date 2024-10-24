<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="vendors/scripts/datatable-setting.js"></script>
<!-- fancybox Popup Js -->
<script src="src/plugins/fancybox/dist/jquery.fancybox.js"></script>
<script src="src/plugins/dropzone/src/dropzone.js"></script>
<!-- add sweet alert js & css in footer -->
<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>
<script src="src/plugins/cropperjs/dist/cropper.js"></script>
<script src="src/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="vendors/scripts/calendar-setting.js"></script>

<script>
    window.addEventListener("DOMContentLoaded", function() {
        var image = document.getElementById("image");
        var cropBoxData;
        var canvasData;
        var cropper;

        $("#modal")
            .on("shown.bs.modal", function() {
                cropper = new Cropper(image, {
                    autoCropArea: 0.5,
                    dragMode: "move",
                    aspectRatio: 3 / 3,
                    restore: false,
                    guides: false,
                    center: false,
                    highlight: false,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                    toggleDragModeOnDblclick: false,
                    ready: function() {
                        cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                    },
                });
            })
            .on("hidden.bs.modal", function() {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            });
    });
</script>
<script>
    $(document).ready(function() {
        $('#invoiceTable').DataTable({
            responsive: true, // Enable responsiveness
            "paging": false, // Disable pagination if not needed
            "searching": false, // Disable search box if not needed
            "info": false // Disable showing information
        });
    });
</script>

<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        // Manually initialize Dropzone on the specific form
        $(".dropzone").dropzone({
            url: "gallery.php", // Adjust this URL to match your server-side script
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;
                var _ref;
                return (_ref = file.previewElement) != null ?
                    _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            },

        });
    });
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inp_file").change(function() {
        readURL(this);
    });
</script>


<script>
    function fileChange(e) {
        document.getElementById('inp_img').value = '';

        var file = e.target.files[0];

        if (file.type == "image/jpeg" || file.type == "image/png") {

            var reader = new FileReader();
            reader.onload = function(readerEvent) {

                var image = new Image();
                image.onload = function(imageEvent) {
                    var max_size = 300;
                    var w = image.width;
                    var h = image.height;

                    if (w > h) {
                        if (w > max_size) {
                            h *= max_size / w;
                            w = max_size;
                        }
                    } else {
                        if (h > max_size) {
                            w *= max_size / h;
                            h = max_size;
                        }
                    }

                    var canvas = document.createElement('canvas');
                    canvas.width = w;
                    canvas.height = h;
                    canvas.getContext('2d').drawImage(image, 0, 0, w, h);

                    if (file.type == "image/jpeg") {
                        var dataURL = canvas.toDataURL("image/jpeg", 1.0);
                    } else {
                        var dataURL = canvas.toDataURL("image/png");
                    }
                    document.getElementById('inp_img').value = dataURL;
                }
                image.src = readerEvent.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('inp_file').value = '';
            alert('Please only select images in JPG- or PNG-format.');
        }
    }

    document.getElementById('inp_file').addEventListener('change', fileChange, false);
</script>
<script>
    $(document).ready(function() {
        $('.btn-primary').click(function() {
            console.log('Button Clicked!');
        });
    });
</script>

<script>
    // Function to update notifications
    function updateNotifications() {
        $.ajax({
            url: 'check_notification.php', // Update the path to your new PHP script
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Clear previous notifications
                $('#notification-badge').text('');
                $('#notification-list').empty();

                // Update user registration notifications
                if (data.newUserCount > 0) {
                    $.each(data.newUsers, function (index, user) {
                        var userNotificationHTML = '<a href="user.php">';
                        userNotificationHTML += '<p>New user registered: Name: ' + user.fname + ', Email: ' + user.email + '</p>';
                        userNotificationHTML += '</a>';
                        $('#notification-list').append(userNotificationHTML);
                    });
                } else {
                    $('#notification-list').append('<p>No new user registrations.</p>');
                }

                // Update order notifications
                if (data.newOrderCount > 0) {
                    $.each(data.newOrders, function (index, order) {
                        var orderNotificationHTML = '<a href="orderlist.php">';
                        orderNotificationHTML += '<p>New order: Receipt # ' + order.randidx + ', ProductID: ' + order.productID + ', Price: ' + order.price + ', Quantity ' + order.quantity + '</p>';
                        orderNotificationHTML += '</a>';
                        $('#notification-list').append(orderNotificationHTML);
                    });
                } else {
                    $('#notification-list').append('<p>No new orders.</p>');
                }

                // Update the badge after processing both types of notifications
                $('#notification-badge').text(data.newUserCount + data.newOrderCount);
            },
            error: function () {
                console.error('Error fetching new notifications');
            }
        });
    }

    // Update notifications every 1 second (adjust the interval as needed)
    setInterval(updateNotifications, 1000);

    // Initial update
    updateNotifications();
</script>

<script>
        $(document).ready(function() {
            $("#searchForm").on("submit", function(event) {
                event.preventDefault();
                let query = $("#searchInput").val();
                fetchSearchResults(query);
            });

            function fetchSearchResults(query) {
                $.ajax({
                    url: "search.php",
                    type: "GET",
                    data: { query: query },
                    success: function(data) {
                        displaySearchResults(data);
                    },
                    error: function() {
                        console.log("Error fetching search results.");
                    }
                });
            }

            function displaySearchResults(results) {
                $("#searchResults").html(results);
            }
        });
    </script>