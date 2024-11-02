
<?php include('connect.php')  ?>
<?php include('sidenav.php')  ?>


<!-- Delete -->

<?php



if (isset($_GET['Did'])!=null) 
{
  $dsel="DELETE FROM theater WHERE theaterid =".$_GET['Did'];
  $dres=mysqli_query($con,$dsel);
  // header("location:fruitpdt.php");
}


// Edit 


if (isset($_GET['Eid'])!=null) 
{
  $esel="SELECT * FROM theater WHERE theaterid=".$_GET['Eid'];
  $eres=mysqli_query($con,$esel);
  while($edata=mysqli_fetch_array($eres))
  {

    
   $ename=$edata['theater_name'];
   $etime=$edata['timing'];
   $edays=$edata['days'];
   $edate=$edata['date'];
   $etiming=$edata['timing'];
   $eamt=$edata['price'];


  }
}

?>
<!-- Insert -->
<?php
if(isset($_POST['submit'])){
 
  $movieid = $_POST['movieid'];
  $theater_name = $_POST['theater_name'];
  $days = $_POST['days'];

  $price = $_POST['price'];
  $date = $_POST['date'];
  // $location = $_POST['location'];

  if (isset($_GET['Eid'])!=null) 
  {
    $update="UPDATE theater SET theater_name='$theater_name',days='$days',date='$date',price='$price' WHERE theaterid =".$_GET['Eid'];
    mysqli_query($con,$update);
  }
  else
  {

  $sql = "INSERT INTO `theater`(`theater_name`,`timing`, `days`, `date`, `price`, `movieid`) VALUES ('$theater_name','$timing','$days','$date','$price','$movieid')";

  if(mysqli_query($con, $sql)){
    echo "<script> alert('theater added')</script>";
    echo "<script> window.location.href='theater.php' </script>";
  }else{
    echo "<script> alert('theater not added')</script>";
  }

}
}


?>
      <!-- form Design -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
          
                
         <div class="col-md-8 pl-5" style="margin-left :260px; margin-top: 100px;">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Movies</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">

                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Theature</label>
                        <input type="text" class="form-control" name="theater_name" value="<?php if(isset($ename)){ echo $ename;
      } ?>" >
                      </div>
                    </div>
                    
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <div class="form-group mb-4">

         <select name="movieid" class="form-control"  style="background-color:grey">
          <option value="">Select Movie</option>

          <?php
          $sql = "SELECT * FROM `movies` ";
          $res  = mysqli_query($con, $sql);
          if(mysqli_num_rows($res) > 0){
            while($data = mysqli_fetch_array($res)){

              ?> <option value="<?=$data['movieid']?>" > <?=$data['title']?> </option> <?php   

            }

          }else{
            ?> <option value="">No Category found</option>  <?php
          }  
          ?> 
          
          
              
         </select>
          
          
                    </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                      <label> Time</label>
                        <div class="form-group mb-4">

       
          
          


            
    <select name="timing">
						<option value="">Select Time</option>
						<option <?php if($data['timing']=="12 PM"){echo "selected";}?>>12 PM</option>
						<option <?php if($data['timing']=="3 PM"){echo "selected";}?>>3 PM</option>
						<option <?php if($data['timing']=="6 PM"){echo "selected";}?>>6 PM</option>
					
					</select>
				
          
          </div>
                      </div>
                    </div>
                   
                    


                    
                    <div class="col-md-6">
                      <div class="">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="date" value="<?php if(isset($edate)){ echo $edate;
      } ?>">
                      </div>
                    </div> 
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Days</label>
                        <input type="text" class="form-control" name="days" value="<?php if(isset($edays)){ echo $edays;
      } ?>">
            
                      </div>
                    </div>
                    

                  



                    <div class="col-md-6">
                      <div class="">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" value="<?php if(isset($eamt)){ echo $eamt;
      } ?>">
            
                      </div>
                    </div>
                 

                  
                  
                 
                 

                    <div class="form-group ">
      <input type="submit" class="btn btn-primary" name="submit" value="Submit" >
  
      </div>
      
                  </div>
                
              </div>
              
            </div>
          </div>
          
        </div>
      </div>
        </form>








<!-- Select Query-->
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
                    <tr><th>Theature</th><th>Movies</th><th>Category</th><th>Date</th><th>Day</th><th>Time</th><th>Ticket</th><th>Location</th><th>Action</th>
                   
                    <tbody>
                    <?php
      $sql = "SELECT theater.*, movies.title, categories.catname
      from theater
      inner join movies on movies.movieid = theater.movieid 
      inner join categories on categories.catid = movies.catid";
      $res  = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res)){

          ?>

          <tr>
          
            <td><?= $data['theater_name'] ?></td>
            <td><?= $data['title'] ?></td>
            <td><?= $data['catname'] ?></td>
            <td><?= $data['date'] ?></td>
            <td><?= $data['days'] ?> 
            <td> <?= $data['timing'] ?></td> 
            <td><?= $data['price'] ?></td>
             <td><?= $data['location'] ?></td>
           
            <td>
     
              <a href="theater.php?Eid=<?php echo $data["theaterid"]; ?>" class="btn btn-danger">Edit</a></td>
          <td><a href="theater.php?Did=<?php echo $data["theaterid"]; ?>" class="btn btn-danger">Delete</a>
          </td>
          </tr>


       <?php
        }
      }else{
        echo 'no category found';
      }
    

      ?>


     </table>

  </div>
</div>
  

</div>
</tbody>
</table>
 
    </form>

   




<!-- End SELECT QUERY -->

      <?php
include "footer.php";
?>