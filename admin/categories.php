
<?php include('connect.php')  ?>
<?php include('sidenav.php')  ?>


<?php
if(isset($_POST['add'])){
 
  $name = $_POST['catname'];


  if (isset($_GET['Eid'])!=null) 
  {
    $update="UPDATE categories SET catname='$name' WHERE catid=".$_GET['Eid'];
    mysqli_query($con,$update);
  }
  else
  {
  $sql = "INSERT INTO `categories`( `catname`) VALUES ('$name')";

  if(mysqli_query($con, $sql)){
    echo "<script> alert('cateogry added')</script>";
    echo "<script> window.location.href='categories.php' </script>";
  }else{
    echo "<script> alert('cateogry not added')</script>";
  }

}

}

?>


<?php

if (isset($_GET['Eid'])!=null) 
{
  $esel="SELECT * FROM categories WHERE catid=".$_GET['Eid'];
  $eres=mysqli_query($con,$esel);
  while($edata=mysqli_fetch_array($eres))
  {
   $ename=$edata['catid'];
   $ecat=$edata['catname'];
   

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
                    
                  
    
                   <div class="col-md-12">
                      <div class="form-group">
                        <label></label>
                        <input type="hidden" class="form-control"  name="catid" value="<?php if(isset($ename)){ echo $ename;
      } ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" name="catname" value="<?php if(isset($ename)){ echo $ecat;
      } ?>">
                      </div>
                    </div>
                   

                    <div class="form-group ">
      <input type="submit" class="btn btn-primary" name="add" value="submit" >
  
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
        
        
         <div class="col-md-8">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Products List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                    <tr><th>#ID</th><th>Name</th><th>Action</th><th>
                    
                    <tbody>
                    <?php
      $sql = "SELECT * FROM `categories`";
      $res  = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res)){

          ?>

          <tr>
            <td><?= $data['catid'] ?></td>
            <td><?= $data['catname'] ?></td>
            <td>
              <a href="categories.php?Eid=<?= $data['catid'] ?>" class="btn btn-primary"> Edit</a>
              <!-- <a href="categories.php?Did=<?php $data['catid'] ?>" class="btn btn-danger"> Delete</a> -->
              <a href="categoriesdelete.php?Did=<?php echo $data["catid"]; ?>" class="btn btn-danger">Delete</a>

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