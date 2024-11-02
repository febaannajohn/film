<?php
include "connect.php";

include "header.php";


                         
?>

<style>

.row-checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container-checkout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.checkout-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout-btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row-checkout {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<body>

<?php
if (isset($_GET['pid'])!=null) 
{
  $esel="SELECT * FROM booking WHERE bookingid=".$_GET['pid'];
  $eres=mysqli_query($con,$esel);
  while($edata=mysqli_fetch_array($eres))
  {
   
   $eamt=$edata['totalamt'];


  }
}



// $pid=$_GET['pid'];
// $sql="SELECT * FROM `booking` WHERE bookingid='$pid'";
// $res=mysqli_query($con,$sql);
// if($row=mysqli_fetch_array($res))
// {
?> 


       



					
<section class="section">       
	<div class="container-fluid">
		<div class="row-checkout">
		
	
		
	
			<div class="col-75">
				<div class="container-checkout">
				<form id="checkout_form" action="checkout_process.php" method="POST" class="was-validated">

					<div class="row-checkout">
					<?php
                 
                 $uid = $_SESSION['uid'];
                    $sql1="SELECT * FROM `users` WHERE userid ='$uid'";
                    $res1=mysqli_query($con,$sql1);
                    while($row1=mysqli_fetch_array($res1))
                    {
                    ?>
                    
                    <input type="number" value="<?php  echo $row1['userid'];?>" name="userid" class="form-control form-control-lg form-control-a" placeholder="Full Name" hidden>
                      
					<div class="col-50">
						<h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user" ></i> Full Name</label>
            <input type="text" value="<?php  echo $row1['name'];?>" name="b_name" class="form-control form-control-lg form-control-a" placeholder="Full Name" disabled>
                  
						<!-- <label for="fname"><i class="fa fa-user" ></i> Full Name</label>
						<input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$" > -->

						<label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input value="<?php  echo $row1['email'];?>" name="b_email" type="email" class="form-control form-control-lg form-control-a" placeholder="Email" hidden>  
                  
            <input value="<?php  echo $row1['email'];?>" name="b_email" type="email" class="form-control form-control-lg form-control-a" placeholder="Email" disabled>
            <input value="<?php  echo $row1['email'];?>" name="b_email" type="email" class="form-control form-control-lg form-control-a" placeholder="Email" hidden>  
                    <?php
                    }
                    ?>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
						<input type="text" id="adr" name="address" class="form-control" required>
						<label for="city"><i class="fa fa-institution"></i> City</label>
						<input type="text" id="city" name="city" class="form-control"  pattern="^[a-zA-Z ]+$" required>

						<div class="row">
						<div class="col-50">
							<label for="state">State</label>
							<input type="text" id="state" name="state" class="form-control" pattern="^[a-zA-Z ]+$" required>
						</div>
						<div class="col-50">
							<label for="zip">Zip</label>
							<input type="text" id="zip" name="zip" class="form-control" pattern="^[0-9]{6}(?:-[0-9]{4})?$" required>
						</div>
						</div>
					</div>
					
					
					<div class="col-50">
						<h3>Payment</h3>
						<label for="fname">Accepted Cards</label>
						<div class="icon-container">
						<i class="fa fa-cc-visa" style="color:navy;"></i>
						<i class="fa fa-cc-amex" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:red;"></i>
						<i class="fa fa-cc-discover" style="color:orange;"></i>
						</div>
						
						<div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="b_gpayid" type="email" class="form-control form-control-lg form-control-a" placeholder="Gpay Id" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                      
                  </div>
                  </div>
						<!-- <label for="cname">GPay</label>
						<input type="text" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$" required>
						 -->
						<!-- <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
                    </div>
						<label for="expdate">Exp Date</label>
						<input type="text" id="expdate" name="expdate" class="form-control" pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" placeholder="12/22"required>
						

						<div class="row">
						
						<div class="col-50">
							<div class="form-group CVV">
								<label for="cvv">CVV</label>
								<input type="text" class="form-control" name="cvv" id="cvv" required>
						</div>
						</div> -->
					</div>
					</div>
					</div>
					<label><input type="CHECKBOX" name="q" class="roomselect" value="conform" required> Shipping address same as billing
					</label>

	<a href="checkout_process.php?"><input type="submit" id="submit" value="Continue to checkout" name="submit" class="checkout-btn"></a>
					
</div>
</div>

<?php

?>         
		
<?php
include "footer.php";
?>

