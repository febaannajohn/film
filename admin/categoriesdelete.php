<?php include('connect.php')  ?>
<?php include('sidenav.php')  ?>


<?php



if (isset($_GET['Did'])!=null) 
{
  $dsel="DELETE FROM categories WHERE catid =".$_GET['Did'];
  $dres=mysqli_query($con,$dsel);
  // header("location:fruitpdt.php");
}
?>