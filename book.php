<?php
 
 include('connect.php');
 
// if(!isset($_SESSION['uid'])){
//    echo "<script> window.location.href='login.php';  </script>";
//  }
 
 ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>


<?php


    $theaterid = $_GET['id'];

?>
    <div class="container" style="margin-left :60px; margin-top: 100px;">
      
      
       <img class="img-responsive" src="book.png" style="width:100%; height:180px;">      
        

      <div class="well">
            <h2>Book Now:</h2>
            <hr>
            <form action="book.php" method="post" >
              
              
               <!-- <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker" name="checkin">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="text" class="datepicker" name="checkout">
                </div> -->
                <div class="row">
                <div class="form-group">
                    <!-- <label for="name">Enter Your Full Name:</label> -->
                    <input type="hidden" name="theaterid" value="<?=$theaterid?>">
                </div>
                <div class="form-group">
                    <label for="phone">Enter Person </label>
                    <input type="text" class="form-control" name="person"  placeholder="Enter no of People" required="">
                </div>
                 
                <div class="form-group">
                    <label for="checkin">Select Date :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker" name="date">

                </div>
               
                <div class="form-group">
                    <label for="checkin">Select Time :</label>&nbsp;&nbsp;&nbsp;
                   
                      <select id="inputState" name="sel1" class="form-control">
        <option selected>Choose...</option>
        <option>8 AM</option>
        <option>12 PM</option>
        <option>3 PM</option>
        <option>6 PM </option>
        <option>8 PM</option>
       

              </select>

                </div>

                <div class="form-group">
                    <label for="checkin">Select City :</label>&nbsp;&nbsp;&nbsp;
                   
                    <select id="inputState" name="sel2" class="form-control">
        <option selected>Choose...</option>
        <option>Kochi</option>
        <option>Thriruvanthapuram</option>
        <option>Kollam</option>
        <option>Thrisur</option>
        <option>Pathanamthitta</option>
        <option>Kanur</option>
        <option>Allapuzha</option>
        <option>Palakad</option>
        <option>Thrisur</option>
        <option>Kasargod</option>
        <option>Waynad</option>
      </select>

                </div>
                <button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Book Now</button>
             
               <br>
                <div id="click_here">
                    <a href="index.php">Back to Home</a>
                </div>


            </form>
        </div>
        
        



    </div>
    
    
    
    <?php

if(isset($_POST['ticketbook'])){

  $person     = $_POST['person'];
  $date       = $_POST['date'];

  $sel1     = $_POST['sel1'];
  $sel2       = $_POST['sel2'];
  $theaterid  = $_POST['theaterid'];

  $uid = $_SESSION['uid'];

  //print_r($_POST);

  $sql = "INSERT INTO `booking`(`theaterid`, `bookingdate`, `person`,`time`,`city`, `userid`) VALUES ('$theaterid','$date','$person','$sel1','$sel2','$uid')";

  if(mysqli_query($con, $sql)){
     echo "<script> alert('Ticket book successfully!!') </script>";
     echo "<script> window.location.href='index55.php';  </script>";

  }else{
    echo "<script> alert('ticket not book')";
  }

}

?>
    






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>