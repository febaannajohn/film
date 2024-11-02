

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>


<?php include('connect.php')  ?>
<?php include('sidenav.php')  ?>

<div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <!-- <div class="col-md-8 pl-5" style="margin-left :260px; margin-top: 100px;">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Movies</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
      <div class="col-lg-3">
        <input type="date" name="start" class="form-control">
      </div>
      <div class="col-lg-3">
        <input type="date" name="end" class="form-control">
      </div>
      <div class="col-lg-3">
         <select name="status" id="" class="form-control">
          <option value="">Select Status</option>
          <option value="0">Pending</option>
          <option value="1">Approve</option>
         </select>
      </div>
      <div class="col-lg-3">
        <input type="submit" name="btnsearch" value="Search" class="btn btn-success">
      </div>
    </div>
  </form>
</div>
</div> -->

<div class="content" style="margin-left :250px; margin-top: 100px;">
        <div class="container-fluid">
        
        
         <div class="col-md-16">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Products List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                    <tr>
        <th>#</th>
        <th>Theature Name</th>
        <th>Movie</th>
        <th>User</th>
        <!-- <th>Days/Time</th> -->
        
        <th>Date</th> 
        <th>time</th>
        <th>Days</th>
        <th>Person</th>
        <th>Ticket Price</th>
       
        <th>Total Amount</th>
        <th>Location</th>
        
      
        <th>Status</th>
      </tr>
      
      <?php

      if(isset($_POST['btnsearch'])){

        $start  = $_POST['start'];
        $end    = $_POST['end'];
        $status = $_POST['status'];

        $total_sale = 0;

        $sql = "select booking.bookingid, booking.person,booking.totalamt, theater.theater_name, theater.timing, theater.days, theater.prices,theater.date, theater.locations, movies.title,  categories.catname, users.name as 'username',
        booking.status
        from booking
        inner join theater on theater.theaterid = booking.theaterid
        inner join users on users.userid = booking.userid
        inner join movies on movies.movieid = theater.movieid
        inner join categories on categories.catid = movies.catid
        where booking.bookingdate between '$start' AND '$end' and booking.status = '$status'";
        $res  = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0){
          while($data = mysqli_fetch_array($res)){

            $total_sale = $total_sale + $data['price'];
  
            ?>

<tr>
            <td><?= $data['bookingid'] ?></td>
            <td><?= $data['theater_name'] ?></td>
            <td><?= $data['title'] ?> - <?= $data['catname'] ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['date'] ?></td>
            <td><?= $data['timing'] ?></td>
            <td><?= $data['days'] ?></td>
            <td><?= $data['person'] ?></td>
            <!-- <td><?= $data['days'] ?> - <?= $data['timing'] ?></td>        -->
            <td><?= $data['prices'] ?></td>
      
           
            <td><?= $data['totalamt'] ?></td>
            
            <td><?= $data['locations'] ?></td>
            
            
            <td>

              <?php

              if($data['status'] == 0){
                echo "<a href='#' class='btn btn-warning' > Pending </a>";
              }else{
                echo "<a href='#' class='btn btn-success' > Approved </a>";
              }

              ?>


            </td>
           
            <td>
              <?php

                if($data['status'] == 1){
                  echo "<button type='button' class='btn btn-light' disabled> Completed </button>";
                }else{
                  echo "<a href='viewallbooking.php?bookingid=".$data['bookingid']."' class='btn btn-primary'> Approve</a>";
                }
              ?>
              
          </td>
          </tr>

            <?php
          }
            echo "<tr> <td>Total Sale: <strong> Rs.".$total_sale." </strong></td> </tr>";
        }

      }else{


      $sql = "select booking.bookingid, booking.person,booking.totalamt, theater.theater_name, theater.timing, theater.days, theater.prices,theater.date, theater.locations, movies.title,  categories.catname, users.name as 'username',
      booking.status
      from booking
      inner join theater on theater.theaterid = booking.theaterid
      inner join users on users.userid = booking.userid
      inner join movies on movies.movieid = theater.movieid
      inner join categories on categories.catid = movies.catid 
      ";
      $res  = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res)){

          ?>

        
<tr>
            <td><?= $data['bookingid'] ?></td>
            <td><?= $data['theater_name'] ?></td>
            <td><?= $data['title'] ?> - <?= $data['catname'] ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['date'] ?></td>
            <td><?= $data['timing'] ?></td>
            <td><?= $data['days'] ?></td>
            <td><?= $data['person'] ?></td>
            <!-- <td><?= $data['days'] ?> - <?= $data['timing'] ?></td>        -->
            <td><?= $data['prices'] ?></td>
      
           
            <td><?= $data['totalamt'] ?></td>
            
            <td><?= $data['locations'] ?></td>
            
            
            <td>

              <?php

              if($data['status'] == 0){
                echo "<a href='#' class='btn btn-warning' > Pending </a>";
              }else{
                echo "<a href='#' class='btn btn-success' > Approved </a>";
              }

              ?>

            </td>
           
            <td>
            <?php

              if($data['status'] == 1){
                echo "<button type='button' class='btn btn-light' disabled> Completed </button>";
              }else{
                echo "<a href='viewallbooking.php?bookingid=".$data['bookingid']."' class='btn btn-primary'> Approve</a>";
              }
              ?>
          </td>
          </tr>


       <?php
        }
      }else{
        echo 'no booking found';
      }

    }
   

      ?>


     </table>

  </div>
</div>
  

</div>


<?php include('footer.php')  ?>

</body>
</html>

<?php

if(isset($_GET['bookingid'])){

  $bookingid  = $_GET['bookingid'];
  $sql = "UPDATE `booking` SET `status`= 1 WHERE bookingid = '$bookingid'";

  if(mysqli_query($con,$sql)){
    echo "<script> alert('booking approved successfully!!') </script>";
    echo "<script> window.location.href='viewallbooking.php';  </script>";
  }else{
    echo "<script> alert('not approved successfully!!') </script>";
  }
}
?>


