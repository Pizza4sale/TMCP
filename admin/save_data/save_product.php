<?php
include(__DIR__ . '/../includes/db.php');

if (isset($_POST['submit'])) {
    $p_name = $_POST['p_name'];
    $p_desc = $_POST['p_desc'];
    $orig_price = $_POST['orig_price'];
    $s_price = $_POST['s_price'];
    $categoryid = $_POST['CATNAME'];
    $img = $_POST['img'];
    $typeid = $_POST['typeid'];
    $p_cat = $_POST['CATNAME'];
    $p_stat = $_POST['typeid'];

    // Process image data
    if (strpos($img, 'data:image/jpeg;base64,') === 0) {
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $ext = '.jpg';
    }
    if (strpos($img, 'data:image/png;base64,') === 0) {
        $img = str_replace('data:image/png;base64,', '', $img);
        $ext = '.png';
    }

    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = '../../Assets/images/products/img' . date("YmdHis") . $ext;
    $nameimg = 'Assets/images/products/img' . date("YmdHis") . $ext;

    // Save image file
    if (file_put_contents($file, $data)) {
        // Insert into product_category table
        $query1 = "INSERT INTO product_category(categoryID) VALUES ('$categoryid')";
        $query_run1 = mysqli_query($con, $query1);

        // Insert into product_type table
        $query2 = "INSERT INTO product_type(typeID) VALUES ('$typeid')";
        $query_run2 = mysqli_query($con, $query2);

        // Insert into products table using prepared statement
        $query3 = "INSERT INTO products(p_name, p_desc, p_price, p_orig, p_img, p_cat, p_stat) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query3);
        mysqli_stmt_bind_param($stmt, "sssssss", $p_name, $p_desc, $s_price, $orig_price, $nameimg, $p_cat, $p_stat);

        // Execute prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Success
            header('Location: ../products.php');
            exit;
        } else {
            // Failure
            echo "Error: " . mysqli_error($con);
            // or log the error
        }
    } else {
        // Image file saving failed
        echo "Error: Unable to save image file.";
    }
} else {
    // The form was not submitted
    echo "Error: Form not submitted.";
}
?>
