
<?php include('connect.php')  ?>
<?php include('sidenav.php')  ?>



<?php
if (isset($_GET['Did'])!=null) 
{
  $dsel="DELETE FROM movies WHERE movieid =".$_GET['Did'];
  $dres=mysqli_query($con,$dsel);
  // header("location:fruitpdt.php");
}


if (isset($_GET['Eid'])!=null) 
{
  $esel="SELECT * FROM movies WHERE movieid=".$_GET['Eid'];
  $eres=mysqli_query($con,$esel);
  while($edata=mysqli_fetch_array($eres))
  {
   $ename=$edata['title'];

   $emage=$edata['image'];
   $edesc=$edata['description'];
  


  }
}
?>


<?php
if(isset($_POST['add'])){
 $catid = $_POST['catid'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $releasedate = $_POST['releasedate'];

  $image = $_FILES['image']['name'];
  $tmp_image = $_FILES['image']['tmp_name'];

  $trailer = $_FILES['trailer']['name'];
  $tmp_trailer = $_FILES['trailer']['tmp_name'];

  // $movie = $_FILES['movie']['name'];
  // $tmp_movie = $_FILES['movie']['tmp_name'];


  move_uploaded_file($tmp_image , "uploads/$image");

  move_uploaded_file($tmp_trailer , "uploads/$trailer");

  // move_uploaded_file($tmp_movie , "uploads/$movie");

  if (isset($_GET['Eid'])!=null) 
  {
    $update="UPDATE movies SET title='$title',description='$description', image='$image' WHERE movieid=".$_GET['Eid'];
    mysqli_query($con,$update);
  }
  else
  {
  
  $sql = "INSERT INTO `movies`(`title`, `description`, `releasedate`, `image`, `trailer`, `movie`,  `catid`) 
  VALUES ('$title','$description','$releasedate','$image','$trailer','$movie','$catid')";

  if(mysqli_query($con, $sql)){
    echo "<script> alert('movies added')</script>";
    echo "<script> window.location.href='movies.php' </script>";
  }else{
    echo "<script> alert('movies not added')</script>";
  }

}
}
?>


      <!-- End Navbar -->
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
                    
                  <div class="col-md-8">
                      <div class="form-group">
                        <label>Category</label>
                        <div class="form-group mb-4" >
            
         <select name="catid" class="form-control" style="background-color:grey ">
          <option value="">Select Category</option>
          <h2>
         <?php
       
          $sql = "SELECT * FROM `categories`";
          $res  = mysqli_query($con, $sql);
          if(mysqli_num_rows($res) > 0){
            while($data = mysqli_fetch_array($res)){

              ?> <option value="<?=$data['catid']?>"> <?=$data['catname']?> </option> <?php   

            }

          }else{
            ?> <option value="">No Category found</option>  <?php
          }  
          ?> 
        </select>
        </h2>
      </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                 <label>Product Title</label>
                        <h3><input type="text" class="form-control" name="title" value="<?php if(isset($ename)){ echo $ename;
      } ?>" ></h3>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                     <label>Product Description</label>   
                       

          <h3><input type="text" class="form-control" name="description" value="<?php if(isset($edesc)){ echo $edesc;
      } ?>" ></h3>
                      </div>
                    </div>
                    

                  


                    <div class="col-md-6">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="image" required class="btn btn-fill btn-success" id="image" value="<?php if(isset($eimage)){ echo $eimage;
      } ?>" >
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="">
                        <label for="">Relesed Date</label>
                       <h2> <input type="date" class="form-control" name="releasedate" ></h2>
                      </div>
                    </div>
                 

                  
                  
                    <div class="col-md-12">
                      <div class="">
                        <label>Trailer</label>

                        <input type="file" name="trailer" required class="btn btn-fill btn-success" id="image" >
                      </div>
                    </div>
                  </div>
                 
                  <!-- <div class="col-md-12">
                      <div class="form-group">
                        <label>Video</label>
                        <input type="file" class="form-control" name="movie" value="" >
                      </div>
                    </div> -->

                    <div class="form-group ">
      <input type="submit" class="btn btn-primary" name="add" value="Submit" name="add">
  
      </div>
      
                  </div>
                
              </div>
              
            </div>
          </div>
          
        </div>
      </div>
        </form>

     


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
                    <tr><th>#ID</th><th>Cateogry</th><th>Movie</th><th>Image</th><th>Descrption</th><th>Edit</th><th>Delete</th><th>
                    <!-- <a class=" btn btn-primary" href="addproduct.php">Add New</a></th></tr></thead> -->
                    <tbody>
                    <?php
      $sql = "SELECT movies.*, categories.catname
      from movies
      inner join categories on categories.catid = movies.catid";
      $res  = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res)){

          ?>

          <tr>
          <td><?= $data['movieid'] ?></td>
          <td><?= $data['catname'] ?></td>
            
            <td><?= $data['title'] ?></td>
            <td> <img src="uploads/<?= $data['image'] ?>" heigt="50" width="50" alt=""> </td>
            <td><?= $data['description'] ?></td>
            
        
          
            <td>
              <!-- <a href="movies.php?Eid=<?= $data['movieid'] ?>" class="btn btn-primary"> Edit</a> -->
              <!-- <a href="movies.php?deleteid=<?php echo $data['movieid'] ;?>" class="btn btn-danger"> Delete</a> -->
              <!-- <a href="movies.php?Eid=<?php echo $data["movieid"]; ?>">Edit</a></td> -->
                  
                 <a href="movies.php?Eid=<?php echo $data["movieid"]; ?>" class="btn btn-danger">Edit</a></td>
                  <td><a href="movies.php?Did=<?php echo $data["movieid"]; ?>" class="btn btn-danger">Delete</a>

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