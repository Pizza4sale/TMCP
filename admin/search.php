<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>

<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>SearchResults</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                        SearchResults
										</li>
									</ol>
								</nav>
							</div>
                        </div>

					</div>
                    
                    <div class="card-box mb-30">
						<div class="pd-20">
<?php


// Extract search parameters
$keyword = isset($_GET['query']) ? $_GET['query'] : '';

// Perform search across tables
$searchResults = array();

// Define an array of tables to search
$tablesToSearch = array(
    'categories' => array('p_cat_name', 'p_cat_desc'),
    'chatbot' => array('queries', 'replies'),
    'contact_us_message' => array('name', 'email', 'phone', 'ordernumber', 'client_message', 'status'),
    'orderitem' => array('randidx', 'cake_message'),
    'products' => array('p_name', 'p_desc', 'p_price', 'p_cat'),
    'product_category' => array('productID', 'categoryID'),
    'product_type' => array('productID', 'typeID'),
    'rc_number' => array('rc_number', 'user_id'),
    'table_cart_info' => array('t_name', 'rc_number', 'status'),
    'transaction' => array('randidx', 'cake_message', 'paymentMethod'),
    'types' => array('p_type_name', 'p_type_desc'),
    'user' => array('uname', 'fname', 'lname', 'email', 'phone', 'description'),
    'userorder' => array('rc_num', 'total', 'address', 'phone', 'status', 'orderstatus'),
    'events' => array('name', 'description', 'color', 'icon')
    // Add more tables as needed
);

// Loop through each table and perform the search
foreach ($tablesToSearch as $tableName => $columns) {
    $query = "SELECT * FROM $tableName WHERE ";
    
    // Add search conditions for each column in the table
    $conditions = array();
    foreach ($columns as $column) {
        $conditions[] = "$column LIKE ?";
    }

    $query .= implode(' OR ', $conditions);

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare($query);
    $keywordWithWildcards = "%$keyword%";
    $types = str_repeat('s', count($columns));
    $stmt->bind_param($types, ...array_fill(0, count($columns), $keywordWithWildcards));
    $stmt->execute();

    // Fetch and append results to the search results array along with the table name
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = ['table' => $tableName, 'data' => $row];
    }

    // Close the result set
    $result->close();

    // Close the statement
    $stmt->close();
}



$resultHTML = "<h4 class='text-blue'>Search Results</h4>";

if (!empty($searchResults)) {
    $resultHTML .= "<div class='table-responsive'>";
    $resultHTML .= "<table class='data-table table-striped '>";
    
    // Display table header with column names
    $resultHTML .= "<thead class='thead-dark'><tr>";
    foreach ($searchResults[0]['data'] as $columnName => $columnValue) {
        $resultHTML .= "<th>" . htmlspecialchars($columnName) . "</th>";
    }
    $resultHTML .= "<th>Action</th></tr></thead>";

    // Display each row of data
    $resultHTML .= "<tbody>";
    foreach ($searchResults as $result) {
        $tableName = $result['table'];
        $rowData = $result['data'];

        $resultHTML .= "<tr>";

        // Display each column value dynamically with HTML escaping
        foreach ($rowData as $columnValue) {
            $resultHTML .= "<td>" . htmlspecialchars($columnValue) . "</td>";
        }

        // Dynamically generate the link based on the result type
        $resultHTML .= "<td>";
        $resultHTML .= "<a href='" . generateLink($tableName) . "' class='btn btn-info btn-sm'>View Details</a>";
        $resultHTML .= "</td>";

        $resultHTML .= "</tr>";
    }
    $resultHTML .= "</tbody>";

    $resultHTML .= "</table>";
    $resultHTML .= "</div>";
} else {
    $resultHTML .= "<p>No results found.</p>";
}

// Return the search results as HTML
echo $resultHTML;


// Close the database connection
$con->close();

function generateLink($tableName) {
    switch ($tableName) {
        case 'products':
            return "products.php";
        case 'user':
            return "user.php";
        case 'userorder':
            return "orderlist.php";
        case 'categories':
            return "categories.php";
        case 'chatbot':
            return "chatbot.php";
        case 'contact_us_message':
            return "feedback.php";
        case 'orderitem':
            return "orderlist.php";
        case 'transaction':
            return "view_order.php";
        case 'events':
            return "calendar.php";
        // Add more cases for other result types as needed
        case 'custom_type':
            return "custom_type.php";
        default:
            return "generic.php";
    }
}

include("includes/script.php");





?>

