<?php
include(__DIR__ . '/../includes/db.php');

if (isset($_POST['submit'])) {

    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $p_desc = $_POST['p_desc'];
    $orig_price = $_POST['orig_price'];
    $s_price = $_POST['s_price'];
    $categoryid = $_POST['CATNAME'];
    $img = $_POST['img'];
    $typeid = $_POST['typeid'];
    $p_cat = $_POST['CATNAME'];
    $p_stat = $_POST['typeid'];

    // Escape values to prevent SQL injection and handle special characters
    $p_name = mysqli_real_escape_string($con, $p_name);
    $p_desc = mysqli_real_escape_string($con, $p_desc);
    $p_price = mysqli_real_escape_string($con, $s_price);
    $p_orig = mysqli_real_escape_string($con, $orig_price);
    $p_cat = mysqli_real_escape_string($con, $p_cat);
    $p_stat = mysqli_real_escape_string($con, $p_stat);

    if (empty($img)) {

        if ($p_stat == 0) {
            $sql = "UPDATE products SET p_name = '$p_name', p_desc = '$p_desc', p_price = '$s_price', p_orig = '$orig_price', p_cat = '$p_cat', p_stat = '$p_stat', status = '0' WHERE productID = $p_id";
        } else {
            $sql = "UPDATE products SET p_name = '$p_name', p_desc = '$p_desc', p_price = '$s_price', p_orig = '$orig_price', p_cat = '$p_cat', p_stat = '$p_stat', status = '1' WHERE productID = $p_id";
        }

        $retval = mysqli_query($con, $sql);

        if (!$retval) {
            echo "Error: " . mysqli_error($con);
        } else {
            ?>
            <script>
                alert('Successfully Saved');
                window.location.href='../products.php';
            </script>
            <?php
        }

    } else {

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

        if (file_put_contents($file, $data)) {

            if ($p_stat == 0) {
                $sql = "UPDATE products SET p_name = '$p_name', p_desc = '$p_desc', p_price = '$s_price', p_orig = '$orig_price', p_img = '$nameimg', p_cat = '$p_cat', p_stat = '$p_stat', status = '0' WHERE productID = $p_id";
            } else {
                $sql = "UPDATE products SET p_name = '$p_name', p_desc = '$p_desc', p_price = '$s_price', p_orig = '$orig_price', p_img = '$nameimg', p_cat = '$p_cat', p_stat = '$p_stat', status = '1' WHERE productID = $p_id";
            }

            echo "SQL Query: $sql"; // Add this line to print the SQL query

            $retval = mysqli_query($con, $sql);

            if (!$retval) {
                echo "Error: " . mysqli_error($con);
            } else {
                ?>
                <script>
                    alert('Successfully Update');
                    window.location.href='../?view=table_products';
                </script>
                <?php
            }
        }
    }
}
?>