<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking</title>
    <!-- Favicons -->


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>


<?php
include("header.php");

?>

<?php



$con = mysqli_connect('localhost','root','','dbmovies');
if(!$con){
    die('cannot established DB');
}
?>

<main id="main">

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Scan To Pay</h1>
          <span class="color-text-a">UPI Transaction</span>
        </div>
      </div>
      
</section><!-- End Intro Single -->

<!-- ======= Agent Single ======= -->
<section class="agent-single">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-6">
            <div class="agent-avatar-box">
              <img src="admin/uploads/pay.jpg" alt="" class="agent-avatar img-fluid">
            </div>
          </div>
          <div class="col-md-5 section-md-t3">
            <div class="agent-info-box">
              <div class="agent-title">
                <div class="title-box-d">
                  <h3 class="title-d">Thanks For Choosing
                    <br> 
                  </h3>
                </div>
              </div>
              <div class="agent-content mb-3">
                <p class="content-d color-text-a">
                  Our Agents Will Call You Soon!
                  <br>
                  After Your Payment Confirmation
                </p>
                <div class="info-agents color-a">
                <div class="col-md-12 text-center">
                    <a href="viewuserbooking.php" class="btn btn-a">View Status</a>
                </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section><!-- End Agent Single -->

</main><!-- End #main -->




<?php
include("footer.php");
?>





<?php


if(isset($_POST['submit'])){

	$f_name = $_POST["firstname"];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip= $_POST['zip'];
    $cardname= $_POST['cardname'];
    $cardnumber= $_POST['cardNumber'];
    $expdate= $_POST['expdate'];
    $cvv= $_POST['cvv'];
   
    

	$sql = "INSERT INTO `orders_info` 
	(`user_id`,`f_name`, `email`,`address`, 
	`city`, `state`, `zip`, `cardname`,`cardnumber`,`expdate`,`cvv`) 
	VALUES ('$user_id','$f_name','$email', 
    '$address', '$city', '$state', '$zip','$cardname','$cardnumberstr','$expdate','$cvv')";

if(mysqli_query($con, $sql)){
    echo "<script> alert('Please Scan For QR Code Payment')</script>";
    echo "<script> window.location.href='checkout_process.php' </script>";
  }else{
    echo "<script> alert('Payment not added')</script>";
  }

}

?>

</body>
</html>

