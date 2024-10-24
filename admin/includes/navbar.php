<?php

include("includes/db.php");

if (isset($_SESSION['uname'])) {
    $stmt = mysqli_prepare($con, "SELECT * FROM user WHERE uname=? AND isAdmin = 1");
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['uname']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Fetch details for admin user
        $uname = $row['uname'];
        $password = $row['pass'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $address = $row['address'];
        $phone = $row['phone'];
        $description = $row['description'];
        $photoFilename = $row['profile_photo'];

        $fullname = $row["fname"] . " " . $row["lname"];
        $titleName = strtoupper($fname);

        // Your further processing for admin user details
    } else {
        // User is not an admin, automatically log out
        session_destroy();
        header("Location: login.php"); // Redirect to the login page or any other appropriate location
        exit(); // Make sure to exit to prevent further code execution
    }

    mysqli_stmt_close($stmt); // Close the prepared statement
}

?>


<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
				<form action="search.php" method="GET">
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								
								name="query" 
                    placeholder="Search Here"
					id="searchInput"
                />
							
							
							</div>
							<div id="searchResults"></div>
					</form>
				</div>
			</div>
			<div class="header-right">
			
			<div class="user-notification">
    <div class="dropdown">
        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
            <i class="icon-copy dw dw-notification"></i>
            <span id="notification-badge" class="badge notification-active"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div id="notification-list" class="notification-list mx-h-350 standard-scrollbar">
                <!-- Notification list will be populated dynamically -->
            </div>
        </div>
    </div>
</div>
               
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="profile/<?php echo $photoFilename; ?>" alt="" />
							</span>
							<span class="user-name"><?php echo $uname; ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="account.php"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="account.php"
								><i class="dw dw-settings2"></i> Setting</a
							>
							
							<a class="dropdown-item" href="logout.php"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Inside your HTML file -->
<!-- Inside your HTML file -->




<style>
/* CSS for standard scrollbar and additional styles */
.standard-scrollbar {
    overflow-y: auto;
    max-height: 350px; /* Adjust the maximum height as needed */
    padding: 10px; /* Add padding for a cleaner look */
}
/* Style for individual notifications */
#notification-list p {
    margin: 0 0 15px; /* Add spacing between notifications */
    padding: 15px;
    background-color: #fff; /* Background color for notifications */
    border-radius: 8px; /* Rounded corners for notifications */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    transition: background-color 0.3s ease; /* Smooth background color transition */

    /* Text styles */
    font-size: 14px;
    color: #333;
}

#notification-list a {
    text-decoration: none;
    color: #007bff; /* Link color */
    font-weight: bold;
}

#notification-list a:hover {
    background-color: #f5f5f5; /* Background color on hover */
}

#notification-list p.no-notifications {
    text-align: center;
    font-style: italic;
    color: #888;
}


</style>