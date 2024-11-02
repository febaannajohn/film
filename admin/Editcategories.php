
<?php include('connect.php')  ?>
<?php include('sidenav.php')  ?>

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