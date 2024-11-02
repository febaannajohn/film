<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png" type="image/gif" sizes="16x16">
 


   
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


<?php


    $theaterid = $_GET['pid'];

    


?>

<?php include('connect.php')  ?>

<?php



$con = mysqli_connect('localhost','root','','dbmovies');
if(!$con){
    die('cannot established DB');
}
?>
<?php







if (isset($_GET['pid'])!=null) 
{
  $esel="SELECT * FROM theater WHERE theaterid  =".$_GET['pid'];
  $eres=mysqli_query($con,$esel);
  while($edata=mysqli_fetch_array($eres))
  {
  
   $ename=$edata['theater_name'];
   
  $eprices=$edata['prices'];
  
}


}


?>


<body>


    


<form action = "#" method = "post" name = "myform">  
    
<div class="row">
<div class="col-md-8">

<div class="card mt-5 , ml-5">
<div class="card-header"><h6>1. Book Your Seat  2/. Enter Correct Ticket Price, Price is Mention in the theather. Correct Amount Only to be Approved 3./ Calculate and Check Your Amount</h6></div>
   
<div class="card-body">


        
<div class="col-mb-3">

<input type="hidden" name="theaterid" value="<?=$theaterid?>">
<label class="small mb-1" for="inputUsername"><h5>Number Of Seat :  <input type = "text" name = "qty" onkeyup="calculate(this.value)"></h5> <br/> </label>

</div>

<div class="col-mb-3">

<?php


$sel="SELECT * FROM theater";
$res=mysqli_query($con,$sel);
  $data=mysqli_fetch_array($res);
    {
     
         ?>
<label class="small mb-1" for="inputFirstName"><h5>Enter Price :  <input type="text" value="<?php  echo $eprices;?>" name="Cost" ></h5> <br/>  </label>

<!-- <h2 align ="center"class="card-title pt-3">MOVIE : <?php  echo $etitle;?> </h2> -->
</div>
<?php
    }
    ?>
</div>
<div class="col-mb-3 pl-3">


<label class="small mb-1" for="inputFirstName"><h5>Total Price : <input type="text" name="textbox5"/></label>

</div>





<div class="mb-3 pl-3">


<!-- <?php
    //    $sel="SELECT * FROM booking";
    //    $res=mysqli_query($con,$sel);
    //       while($data=mysqli_fetch_array($res))
    //        {
                ?> -->

<a href="checkout.php?"><div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div></a>


            </div>

           
</div>
                                    

</div>
<!--  -->

<!-- <a href="checkout.php?"><div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div></a>
 -->


</form>
</div>
</div>
</div>
</div>
</div>

          




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



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
</body>
</html>