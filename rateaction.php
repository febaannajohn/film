<?php
require 'connect.php';
$name = $_POST['name'];
$rating = $_POST['rating'];
$comments = $_POST['comments'];
$sql = "INSERT INTO `tbl_rating`(`name`,`rating`,`comments`)VALUES('$name','$rating','$comments')";
if (mysqli_query($con, $sql)) {
    // echo "<script>alert('Added to cart');window.location='view-rating.php'</script>";
header("location:allmovies.php");
} else {
    echo "<script>alert('Somthing went wrong')</script>";
}