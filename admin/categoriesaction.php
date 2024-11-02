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





