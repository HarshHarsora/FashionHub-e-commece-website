<?php
session_start();
$apiKey = "rzp_test_EWaZMSDevOnSB7";

// echo $_SESSION['grandtotal'];
?>



<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<!-- <form action="https://www.example.com/payment/success/" method="POST"> -->
<form action="http://localhost/fashionhub/confirm_order.php" method="POST">
    <script 
    src="https://checkout.razorpay.com/v1/checkout.js" 
    data-key="<?php echo $apiKey; ?>" 
    data-amount="<?php echo $_SESSION['grandtotal'] * 100; ?>" 
    data-currency="INR" 
    data-id="<?php echo "ORD".rand(10,1000)."END"; ?>" 
    data-buttontext="Pay with Razorpay" 
    data-name="FashionHub" 
    data-description="Book Your Hotel And Enjoy Your Holidays" 
    data-image="https://shop.blueburb.com/wp-content/uploads/2020/06/fashion-hub-logo.jpg" 
    data-prefill.name="<?php echo $_POST['fullname']; ?>" 
    data-prefill.email="<?php echo $_POST['email']; ?>" 
    data-theme.color="#F37254">
    // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    </script>

    <input type="hidden" name="pname" value="<?=$_SESSION['pname']?>">
    <input type="hidden" name="psize" value="<?=$_SESSION['psize']?>">
    <input type="hidden" name="pcolour" value="<?=$_SESSION['pcolour']?>">
    <input type="hidden" name="pcprice" value="<?=$_SESSION['pcprice']?>">
    <input type="hidden" name="pqty" value="<?=$_SESSION['pqty']?>">
    <input type="hidden" name="ptotprice" value="<?=$_SESSION['ptotprice']?>">
    <input type="hidden" name="shipping_cost" value="<?=$_SESSION['shipping_cost']?>">
    <input type="hidden" name="grandtotal" value="<?=$_SESSION['grandtotal']?>">

    <!-- <input type="hidden" name="pnr" value="<?=$_SESSION['pnr']?>">
    <input type="hidden" name="r_id" value="<?=$_SESSION['r_id']?>">
    <input type="hidden" name="hotel_id" value="<?=$_SESSION['hotel_id']?>">
    <input type="hidden" name="hotel_room_id" value="<?=$_SESSION['hotel_room_id']?>">
    <input type="hidden" name="tp" value="<?=$_SESSION['tp']?>">
    <input type="hidden" name="last_name" value="<?=$_SESSION['last_name']?>">
    <input type="hidden" name="contact" value="<?=$_POST['contact']?>">
    <input type="hidden" name="aadhar" value="<?=$_POST['aadhar']?>">
    <input type="hidden" name="newcheckin" value="<?=$_SESSION['newcheckin']?>">
    <input type="hidden" name="newcheckout" value="<?=$_SESSION['newcheckout']?>">
    <input type="hidden" name="tprice" value="<?=$_SESSION['tprice']?>">
    <input type="hidden" name="disprice" value="<?=$_SESSION['disprice']?>">
    <input type="hidden" name="tax" value="<?=$_SESSION['tax']?>">
    <input type="hidden" name="bdate" value="<?=date("d - M - Y")?>">
    <input type="hidden" name="status" value="Active"> -->
    <!-- <input type="hidden" custom="Hidden Element" name="hidden" /> -->
</form>