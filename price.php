


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>bs5 edit profile account details - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}


    </style>
</head>
<body>


<?php


    $theaterid  = $_GET['id'];

    


 


    include('connect.php');

?>


<?php include('header.php')  ?>




<form action = "#" method = "post" name = "myform">  
<div class="col-xl-8">

<div class="card mt-5 , ml-5">
<div class="card-header"><h6>1. Book Your Seat  2/. Enter Correct Ticket Price, Price is Mention in the theather. Correct Amount Only to be Approved 3./ Calculate and Check Your Amount</h6></div>
<div class="card-body">
<form>

<div class="mb-3">

<input type="hidden" name="theaterid" value="<?=$theaterid?>">
<label class="small mb-1" for="inputUsername"><h5>Number Of Seat :  <input type = "text" name = "qty"> <br/> </label>

</div>

<div class="row mt-2 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputFirstName"><h5>Enter Price :    <input type="text" name="Cost" onkeyup="calculate(this.value)"> <br/>  </label>

</div>

<div class="row mt-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputFirstName"><h5>Total Price :    <input type="text" name="textbox5"/></label>

</div>



<div class="col-md-6">
<a href="checkout.php?"><div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div></a>
</div>
<?php
       $sel="SELECT * FROM booking" ;
       $res=mysqli_query($con,$sel);
        if($data=mysqli_fetch_array($res))
           {
                ?>

<!-- <a href="checkout.php?"><div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div></a>
 -->

</div>
</form>
</div>
</div>
</div>
</div>
</div>

           <?php
           }
           ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>  
<script type = "text/javascript">  
function calculate() {   
 if(isNaN(document.forms["myform"]["qty"].value) || document.forms["myform"]["qty"].value=="") {   
 var text1 = 0;   
 } else {   
 var text1 = parseInt(document.forms["myform"]["qty"].value);   
 }   
 if(isNaN(document.forms["myform"]["Cost"].value) || document.forms["myform"]["Cost"].value=="") {   
 var text2 = 0;   
 } else {   
 var text2 = parseFloat(document.forms["myform"]["Cost"].value);   
 }   
 document.forms["myform"]["textbox5"].value = (text1*text2);   
 }  
</script> 

<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	 -->
</script>



<?php

if(isset($_POST['ticketbook'])){

  $person     = $_POST['qty'];


  $sel1     = $_POST['Cost'];
  $sel2       = $_POST['textbox5'];
  $theaterid  = $_POST['theaterid'];

   $uid = $_SESSION['uid'];

  //print_r($_POST);

  $sql = "INSERT INTO `booking`(`theaterid`,`person`,`amt`,`totalamt`, `userid`) VALUES ('$theaterid','$person','$sel1','$sel2','$uid')";

  if(mysqli_query($con, $sql)){
     echo "<script> alert('Ticket book successfully!!') </script>";
     echo "<script> window.location.href='checkout.php';  </script>";

  }else{
    echo "<script> alert('ticket not book')";
  }

}

?>
</body>
</html>



