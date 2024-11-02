

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>


<?php include('connect.php')  ?>
<?php include('sidenav.php')  ?>


<div class="content" style="margin-left :260px; margin-top: 100px;">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
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
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role Type</th>      
       
      </tr>
      
      <?php
      $sql = "SELECT * FROM `users`";
      $res  = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res)){

          ?>

          <tr>
            <td><?= $data['userid'] ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['email'] ?> </td>
            <td><?= $data['password'] ?> </td>       
            <td>

             <?php

               if($data['roteype'] == 1){
                echo "ADMIN";
               }else{
                echo "USER";
               }

             ?>

            </td>
     
          
           
           
          </tr>


       <?php
        }
      }else{
        echo 'no user found';
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

// if(isset($_GET['userid'])){

//   $userid = $_GET['userid'];

//   $sql = "delete from users WHERE userid ='$userid'";

//   if(mysqli_query($con, $sql)){
//     echo "<script> alert('user deleted successfully')</script>";
//     echo "<script> window.location.href='viewallusers.php' </script>";
//   }else{
//     echo "<script> alert('user not deleted')</script>";
//   }

// }

if (isset($_GET['userid'])!=null) 
{
  $dsel="DELETE FROM users WHERE userid=".$_GET['userid'];
  $dres=mysqli_query($con,$dsel);
  echo "<script> window.location.href='viewallusers.php' </script>";
}


?>
