<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

<?php include('connect.php')  ?>
<?php include('header.php')  ?>


 <?php


    // $theaterid = $_GET['id'];

?>








<section id="team" class="team section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h3>Our <span>Theater</span></h3>
        </div>

        <div class="row mt-5">
          <?php

                                $sql = "select theater.*, movies.*, categories.catname
                                from theater
                                inner join movies on movies.movieid = theater.movieid
                                inner join categories on categories.catid = movies.catid
                                order by theater.theaterid DESC";
                                $res  = mysqli_query($con, $sql);
                                if(mysqli_num_rows($res) > 0){
                                  while($data = mysqli_fetch_array($res)){

                                ?>

                              <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <div class="member">
                                  <div class="member-img">
                                <img src="admin/uploads/<?= $data['image'] ?>"  style="height:250px !important; width:250px !important;" alt="">
                                    <div class="social">
                                      <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank"  class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                                    
                                    </div>
                                  </div>
                                  <div class="member-info">
                                    <h4><?= $data['theater_name'] ?></h4></br>
                                    <h6><?= $data['title'] ?> <span><?= $data['catname'] ?></span></h6>
                                    <span><h6>Time/Day: <?= $data['timing'] ?> <span><?= $data['days'] ?></h6> </span></span>
                                    <span><h6>Date: <?= $data['date']?></h6></span>
                                    <span><h6>Location :  <?= $data['locations']?></h6></span> 
                                    <span><h6>Ticket Amount : <?= $data['prices']?></h6></span>
                                    

                                    <a href="price.php?id=<?=$data['theaterid'];?>" target="_blank" class="btn btn-primary"> Book Now </a>
                                    
                                     
                                     <!-- <a href="price.php?pid=<?php echo $data["theaterid"];?>id=<?php echo $data["theaterid"];?>"><div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div></a>
           -->
             <!-- <a href="checkout.php"><div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div></a>
                         
                 <a class="btn btn-success" href="booking.php?pid=<?php echo $data["theaterid"];?>" role="button">Continue to checkout</a>
                                   
                                    -->
                                    <!-- <a href="alltheater.php?id=<?=$data['theaterid']?>" target="_blank" class="btn btn-primary"><div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div></a>
               -->

                                  </div>
                                </div>
                    </div>

          <?php
            }
          }

          ?>

        </div>



      </div>
</section>

<?php include('footer.php')  ?>


</body>
</html>