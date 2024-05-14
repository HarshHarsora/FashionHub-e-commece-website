<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>FashionHub || 2023-24</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.vertical-tabs.css">

	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>

</head>

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91 9016 770561</a></li>
								<li><a href="mailto:info@staytrip.in " target="_top"><i class="fa fa-envelope"></i> info@staytrip.in</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="image/logo.png" alt="" width="200px" height="50px" /></a>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">My Account<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">

										<?php
										// session_start();
										if (isset($_SESSION['user_id'])) { ?>
											<li><a href="logout.php">Logout</a></li>
										<?php } else {
										?>

											<li><a href="login.php">Login</a></li>
										<?php
										} ?>

										<?php
										if (isset($_SESSION['user_id'])) { ?>
											<li><a href="myprofile_view.php">My Profile</a></li>
										<?php } else {
										?>
											<li><a href="myprofile.php">My Profile</a></li>
										<?php
										} ?>



									</ul>
								</li>

								<li><a href="hotel_compare.php">Compare Hotels</a></li>
								<li><a href="contact_us.php">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="">
							<?php
							include("dataconnection/config.php");
							if (isset($_POST['razorpay_payment_id'])) {
								$PNR = $_POST['pnr'];
								// echo $_POST['razorpay_payment_id'];
								$s1 = "select booking_PNR from customer_booking where booking_PNR='$PNR'";
								// print_r($s1);
								$ch = mysqli_query($con, $s1) or die("PNR IS NOT DEFINED");
								$check = mysqli_num_rows($ch);
								if ($check == false) {
									$payment_id = $_POST['razorpay_payment_id'];
									$hotel_id = $_POST['hotel_id'];
									$hotel_room_id = $_POST['hotel_room_id'];
									$user_id = $_SESSION['user_id'];
									// $digits = 6;
									// $PNR = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
									$no_of_room = $_SESSION['r_id'];
									$no_of_member = $_POST['tp'];
									$first_name = $_POST['first_name'];
									$last_name = $_POST['last_name'];
									$email = $_SESSION['email'];
									$contact_no = $_SESSION['contact_no'];
									$aadhar_no = $_POST['aadhar'];
									$checkin = $_POST['newcheckin'];
									$checkout = $_POST["newcheckout"];
									$booking_date = date("d - M - Y");
									$booking_status = "Active";
									$tprice = $_POST["tprice"];
									// echo $_POST["tprice"];
									if (!isset($_POST["disprice"])) {
										$disprice = 0;
									} else {
										$disprice = $_POST["disprice"];
									}
									$tax = $_POST["tax"];
									$grandtotal = $_POST['grandtotal'];

									// $_SESSION['pnr'] = $PNR;
									// echo $PNR;
									$q = "insert into customer_booking(hotel_id,room_id,user_id,booking_PNR,no_of_room,no_of_member,first_name,last_name,email,contact_no,aadhar_no,checkin_date,checkout_date,total_charge,booking_date,booking_status,payment_id,discount,tax,total_paid_amount)values('$hotel_id','$hotel_room_id','$user_id','$PNR','$no_of_room','$no_of_member','$first_name','$last_name','$email','$contact_no','$aadhar_no','$checkin','$checkout','$tprice','$booking_date','$booking_status','$payment_id','$disprice','$tax','$grandtotal')";
									// print_r($q);
									mysqli_query($con, $q) or die(mysqli_error($con));
									// header("location:http://localhost/staytrip/payscript.php");
							?>
									<h4><?php echo $_SESSION['first_name']; ?>&nbsp;<?php echo $_SESSION['last_name']; ?>&nbsp;your Booking Confirmed !!</h4>
							<?php
								} else {
									echo "<div class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Your Bookng Already Done ! </div>";
								}
							}

							?>

							<!-- <h4><?php echo $_SESSION['first_name']; ?>&nbsp;<?php echo $_SESSION['last_name']; ?>&nbsp;your Booking Confirmed !!</h4> -->

						</div>

					</div>
				</div>
			</div><!--/header-bottom-->
	</header><!--/header-->


	<section>
		<div class="container">
			<div class="row">


				<!-----page--content----->
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<?php
						include("dataconnection/config.php");
						if (isset($_SESSION['pnr'])) {
							$pnr = $_SESSION['pnr'];

							$query = "select cb.*,hm.hotel_name,hm.hotel_address,ht.room_type_name from customer_booking cb,hotel_master hm,hotel_room_type ht,hotel_room  hr where cb.hotel_id=hm.hotel_id and cb.room_id=hr.hotel_room_id and hr.hotel_room_type_id=ht.room_type_id and booking_PNR='$pnr'";
							// print_r($query);
							$result = mysqli_query($con, $query);

							while ($row = mysqli_fetch_array($result)) {


						?>

								<table border="0" cellpadding="7" width="1140" class="table table-hover" style="background-color:#f5f5f5">
									<tr>
										<td width="20%">Booking ID</td>
										<td><?php echo $row['customer_booking_id']; ?></td>
										<td>&nbsp;</td>
										<td>Hotel Name</td>
										<td><?php echo $row['hotel_name']; ?></td>
									<tr>

									<tr>
										<td>Booking PNR</td>
										<td><?php echo $row['booking_PNR']; ?></td>
										<td>&nbsp;</td>
										<td>Hotel Address</td>
										<td width="30%"><?php echo $row['hotel_address']; ?></td>

									<tr>

									<tr>
										<td>Traveller Name</td>
										<td colspan="4"><?php echo $row['first_name']; ?>&nbsp;<?php echo $row['last_name']; ?></td>
									<tr>

									<tr>
										<td>Email ID</td>
										<td><?php echo $row['email']; ?></td>
										<td>&nbsp;</td>
										<td>Checkin</td>
										<td><?php echo $row['checkin_date']; ?></td>
									<tr>


									<tr>
										<td>Contact Number</td>
										<td><?php echo $row['contact_no']; ?></td>
										<td>&nbsp;</td>
										<td>Checkout</td>
										<td><?php echo $row['checkout_date']; ?></td>
									<tr>

									<tr>
										<td>Aadhar Number</td>
										<td colspan="4"><?php echo $row['aadhar_no']; ?></td>
									<tr>

								</table>
								<br><br>


								<table border="0" cellpadding="10" width="1140" class="table table-hover" style="background-color:#f5f5f5">
									<tr>
										<td align="center">ROOM TYPE</td>
										<td align="center">ROOM </td>
										<td align="center">GUEST</td>
										<td align="center">EXTRAS</td>
										<td align="center">NIGHT(S)</td>
										<td align="center">PAYMENT ID</td>
										<td align="right">TOTAL PRICE</td>
									</tr>

									<tr>
										<td align="center"><?php echo $row['room_type_name']; ?></td>
										<td align="center"><?php echo $row['no_of_room']; ?></td>
										<td align="center"><?php echo $row['no_of_member']; ?></td>
										<td align="center">-</td>
										<td align="center"><?php echo $_SESSION['night']; ?></td>
										<td align="center"><?php echo $row['payment_id']; ?></td>
										<td align="right">
											<font size="3">Rs.<?php echo $row['total_charge']; ?></font>
										</td>
									</tr>


									<!-- <tr><td colspan="7"></td></tr> -->

									<tr>
										<td colspan="6" align="center">DISCOUNT</td>
										<td align="right">
											<font size="3">- Rs.<?php echo $row['discount']; ?></font>
										</td>
									</tr>

									<tr>
										<td colspan="6" align="center">TAXES & SERVICE FEE INCLUDED</td>
										<td align="right">
											<font size="3">Rs.<?php echo $row['tax']; ?></font>
										</td>
									</tr>

									<tr>
										<td colspan="6" align="center">
											<font size="4">Grand Total:</font>
										</td>
										<td align="right">
											<font size="4">Rs.<?php echo $row['total_paid_amount']; ?></font>
										</td>
									</tr>

								</table>

						<?php
							}
						}
						?>
						<br><br>
						<div style="float:right;display:inline">
							<iframe src="print.php" name="frame1" style="display:none;"></iframe>
							<a href="#" class="btn btn-default" onclick="frames['frame1'].print()" style="padding:10px 10px"><span class="glyphicon glyphicon-print"></span>
								Print Hotel Voucher
							</a>
						</div>


						<br><br><br><br><br>

					</div><!--features_items-->

				</div>



				<?php
				include "footer.php";
				?>
</body>

</html>