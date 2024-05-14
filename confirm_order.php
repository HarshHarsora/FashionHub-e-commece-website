<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ecommerceweb');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['pname'], $_POST['psize'], $_POST['pcolour'], $_POST['pqty'], $_POST['pcprice'], $_POST['grandtotal'], $_POST['razorpay_payment_id'])) {
    
    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO tbl_order (product_name, size, color, quantity, unit_price, payment_id, grandtotal) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        // Bind parameters and execute statement
        mysqli_stmt_bind_param($stmt, "sssiisi", $_POST['pname'], $_POST['psize'], $_POST['pcolour'], $_POST['pqty'], $_POST['pcprice'], $_POST['razorpay_payment_id'], $_POST['grandtotal']);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            header("Location: payment_success.php");
            exit;
        } else {
            echo "Insertion failed: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "SQL statement preparation failed: " . mysqli_error($con);
    }
}

?>
