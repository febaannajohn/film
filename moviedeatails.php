<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png" type="image/gif" sizes="16x16">
 


    <style>
        .rating {
  --dir: right;
  --fill: gold;
  --fillbg: rgba(100, 100, 100, 0.15);
  --heart: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 21.328l-1.453-1.313q-2.484-2.25-3.609-3.328t-2.508-2.672-1.898-2.883-0.516-2.648q0-2.297 1.57-3.891t3.914-1.594q2.719 0 4.5 2.109 1.781-2.109 4.5-2.109 2.344 0 3.914 1.594t1.57 3.891q0 1.828-1.219 3.797t-2.648 3.422-4.664 4.359z"/></svg>');
  --star: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.25l-6.188 3.75 1.641-7.031-5.438-4.734 7.172-0.609 2.813-6.609 2.813 6.609 7.172 0.609-5.438 4.734 1.641 7.031z"/></svg>');
  --stars: 5;
  --starsize: 3rem;
  --symbol: var(--star);
  --value: 1;
  --w: calc(var(--stars) * var(--starsize));
  --x: calc(100% * (var(--value) / var(--stars)));
  block-size: var(--starsize);
  inline-size: var(--w);
  position: relative;
  touch-action: manipulation;
  -webkit-appearance: none;
}

.rating::-webkit-slider-runnable-track {
  background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
  block-size: 100%;
  mask: repeat left center/var(--starsize) var(--symbol);
  -webkit-mask: repeat left center/var(--starsize) var(--symbol);
}

.rating::-webkit-slider-thumb {
  height: var(--starsize);
  opacity: 0;
  width: var(--starsize);
  -webkit-appearance: none;
}


/* NO JS */

.rating--nojs::-webkit-slider-thumb {
  background-color: var(--fill);
  box-shadow: calc(0rem - var(--w)) 0 0 var(--w) var(--fill);
  opacity: 1;
  width: 1px;
}
    </style>



</head>


<?php



$con = mysqli_connect('localhost','root','','dbmovies');
if(!$con){
    die('cannot established DB');
}
?>
<?php







if (isset($_GET['pid'])!=null) 
{
  $esel="SELECT * FROM movies WHERE movieid =".$_GET['pid'];
  $eres=mysqli_query($con,$esel);
  while($edata=mysqli_fetch_array($eres))
  {
  
   $eimage=$edata['image'];
   
  $etitle=$edata['title'];
   $edescription=$edata['description'];

   $ereleasedate=$edata['releasedate'];
  }
}





?>


<body>


    
<section class="gradient-custom pt-2 pl-1 bg-dark">
  <div class="container py-5">
  <?php


       $sel="SELECT * FROM movies";
       $res=mysqli_query($con,$sel);
         $data=mysqli_fetch_array($res);
           {
            
                ?>


    <div class="row">


      
    <div class="col-md-5 pl-1" >
 <img align="center" src="admin/uploads/<?php echo $eimage;?>" class="card-img-top"  alt="" width="30" height="300" ></a>
     
</div>
      
    <div class="col-md-7">
       
        
              <h3 align ="center"class="card-title pt-3">MOVIE : <b><?php  echo $etitle;?></b>  </h3>
           
          
         
              <h4 align ="left"class="card-title"> ABOUT MOVIE </h4> <?php echo $edescription;?> 
              
             
      
     
              
      
              
            </div>
</div>
  
    <?php
            
          
           }
      
       ?>

      
        </div>
     
       

        </section>

        </header> 


        
<section >
    <div class="row">
    <div class="col-md-3">

    <h1 class="text-center pt-3 pl-1">Top reviews</h1>
        </div>
  
        <div class="col-md-3 pt-3">

    
 
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              
              <?php
                  $sql = "SELECT count(id ) as 'category' FROM `tbl_rating`";
                  $res  = mysqli_query($con, $sql);
                  $catdata = mysqli_fetch_array($res);

              ?>
              <h6><?=$catdata['category']?> Total Reviews</h6>
            </div>
          </div>
        </div>
    </div>

    <div class="col-md-3 pt-3">
    <form action="rateaction.php" method="POST">
    <label>Name</label>
    <input type="text" name="name"></br>

<label for="">Rating</label>
<input type="range" name="rating" max="5" value="3" class="rating rating--nojs" step="1"></br>

     <label>Comments</label>
    <input type="text" name="comments"></br>

<input type="submit"></form>

                   </div>
                <div class="col-4 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                   
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          
                                </div>

                    </div>
                </div>
            </div>

 
   
       </div>
        </div>
        </form> 
        </div>



        <div class="row">

        <div class="container py-4">
    <h1 class="text-center pt-5">Voting  Rating System</h1>
    <div class="row mt-4">

                  
                        
                          
                            <?php
                       
                                    $sql2 = "SELECT * FROM `tbl_rating`";
                                    $res2 = mysqli_query($conn, $sql2);
                                    while($row2 = mysqli_fetch_array($res2)){
                            ?>
          <div class="col-md-3 mt-5 ml-5">
        <div class="card" p-3 style="width: 18rem;">
           <div class="card-body">
                                    
                                    <?php echo $row2['name'];?>
                                    <input type="range" name="rating" max="5" value="<?php echo $row2['rating'];?>" class="rating rating--nojs" disabled>
                                   <?php echo $row2['Comments'];?>
                                
                                   </div>
</div>
   </div>

   <?php
            
          }
        
      
       ?>
       </div>
        </div>
        </form>  
                        
        </section>


        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
 
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
</body>
</html>