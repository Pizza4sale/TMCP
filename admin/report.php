<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>
<?php include("includes/dashboard.php") ?>
<div class="mobile-menu-overlay"></div>

<?php
// Function to get the start and end dates for different time periods
function getTimePeriodDates($timePeriod) {
    switch ($timePeriod) {
        case 'today':
            $startDate = date('Y-m-d 00:00:00');
            $endDate = date('Y-m-d 23:59:59');
            break;
        case 'this_week':
            $startDate = date('Y-m-d', strtotime('last monday'));
            $endDate = date('Y-m-d', strtotime('next sunday'));
            break;
        case 'this_month':
            $startDate = date('Y-m-01');
            $endDate = date('Y-m-t');
            break;
        case 'this_year':
            $startDate = date('Y-01-01');
            $endDate = date('Y-12-31');
            break;
        case 'lifetime':
        default:
            $startDate = '1970-01-01'; // Assuming the system has records from the beginning
            $endDate = date('2099-12-31');
            break;
    }
    return array($startDate, $endDate);
}


// Calculate total price and total orders based on the selected display option
if(isset($_POST['display_by'])) {
    $display_by = $_POST['display_by'];
    list($startDate, $endDate) = getTimePeriodDates($display_by);

    // SQL query to calculate total price and total orders based on the selected display option
    $sql_total = "SELECT COUNT(t.orderID) AS totalOrders,
                        SUM(oi.price * oi.quantity) AS totalPaidPrice
                        FROM transaction t
                        INNER JOIN orderitem oi ON t.orderID = oi.orderID
                        WHERE t.status = 'Approved' AND t.createDate BETWEEN '$startDate' AND '$endDate'";
    $result_total = mysqli_query($con, $sql_total);
    $row_total = mysqli_fetch_assoc($result_total);
}
?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Generate Report</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Generate Report</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-8">
                        <div class="card-box mb-30">
                            <div class="pd-20">
            <!-- Dropdown menu to select display by different time periods -->
            <div class="row mb-20">
                <div class="col-md-6">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="display_by">Display By:</label>
                            <select class="custom-select" id="display_by" name="display_by">
                                <option value="today" <?php if(isset($_POST['display_by']) && $_POST['display_by'] == 'today') echo 'selected'; ?>>Today</option>
                                <option value="this_week" <?php if(isset($_POST['display_by']) && $_POST['display_by'] == 'this_week') echo 'selected'; ?>>This Week</option>
                                <option value="this_month" <?php if(isset($_POST['display_by']) && $_POST['display_by'] == 'this_month') echo 'selected'; ?>>This Month</option>
                                <option value="this_year" <?php if(isset($_POST['display_by']) && $_POST['display_by'] == 'this_year') echo 'selected'; ?>>This Year</option>
                                <option value="lifetime" <?php if(isset($_POST['display_by']) && $_POST['display_by'] == 'lifetime') echo 'selected'; ?>>Lifetime</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Display</button>
                    </form>
                </div>
            </div>

            <!-- Display the total price and total orders based on the selected option -->
            <?php if(isset($result_total) && mysqli_num_rows($result_total) > 0): ?>
              
              
                                <h4 class="text-blue h4">Summary Report:</h4>
                            </div>
                                <div class="pb-20">
                                <table class="table hover  data-table-export nowrap">
                                        <thead>
                                            <tr>
                                                <th>Time Period</th>
                                                <th>Total Orders</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo ucfirst($display_by); ?></td>
                                                <td><?php echo $row_total['totalOrders']; ?></td>
                                                <td><?php echo $row_total['totalPaidPrice']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
          
        </div>
    </div>
</div>


<?php include("includes/script.php"); ?>
