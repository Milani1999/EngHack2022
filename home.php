<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- External css file link  -->
   <link rel="stylesheet" href="css/styles.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

</head>
<body>
   
<div class="container-main1">

<?php 

@include 'configure.php';
@include 'header.php'; 

?>

<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/home-slide1.jpg) no-repeat">
            <div class="content">
               <h3>Learn English</h3>
               <p>Learn English online and improve your skills through our high-quality courses 
                  and resources – all designed for adult language learners. Everything you find here has 
                  been specially created by the world's English teaching experts.</p>
               <a href="about.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide2.jpg) no-repeat">
            <div class="content">
               <h3>Easy to Learn</h3>
               <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, obcaecati quos. Minima eius qui id quas atque corporis, quia nulla.</p>
               <a href="about.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide3.jpg) no-repeat">
            <div class="content">
               <h3>Self-study online</h3>
               <p>You can improve your English language level and your professional communication skills, 
                  and learn how to express yourself with confidence to boost your career.</p>
               <a href="about.php" class="btn">Learn more</a>
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="services">

   <h1 class="heading">our courses</h1>

   <div class="swiper service-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide home-course-slider">
            <img src="images/reading.jpg" alt="">
            <div class="content">
               <h3>reading</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, pariatur!</p>
               <a href="about.php" class="btn">View Full Course</a>
            </div>
         </div>

         <div class="swiper-slide slide home-course-slider">
            <img src="images/listening.jpg" alt="">
            <div class="content">
               <h3>listening</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, pariatur!</p>
               <a href="about.php" class="btn">View Full Course</a>
            </div>
         </div>

         <div class="swiper-slide slide home-course-slider">
            <img src="images/writing.png" alt="">
            <div class="content">
               <h3>writing</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, pariatur!</p>
               <a href="about.php" class="btn">View Full Course</a>
            </div>
         </div>

         <div class="swiper-slide slide home-course-slider">
            <img src="images/speaking.png" alt="">
            <div class="content">
               <h3>speaking</h3>
               <p>Speaking skills are defined as the skills which allow us to communicate effectively.</p>
               <a href="about.php" class="btn">View Full Course</a>
            </div>
         </div>

         <div class="swiper-slide slide home-course-slider">
            <img src="images/grammar.png" alt="">
            <div class="content">
               <h3>grammar</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, pariatur!</p>
               <a href="about.php" class="btn">View Full Course</a>
            </div>
         </div>

         <!-- <div class="swiper-slide slide">
            <img src="images/course6.png" alt="">
            <div class="content">
               <h3>fine dining</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, pariatur!</p>
               <a href="about.php" class="btn">View Full Course</a>
            </div>
         </div> -->

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>
<center>
   <div class="container">
            <div class="row">
               <?php
                  $sql=mysqli_query($conn,"SELECT * FROM `rating` ORDER BY rating DESC LIMIT 3");
                  while($fetch=mysqli_fetch_assoc($sql)){
                     $page=$fetch['type'];
                     ?>
                     <div class="col-sm border border-white">
                        <p><?php echo $page; ?></p>
                        <a href="<?php echo 'User_'.$page.'.php' ;?>">Read</a>
                        <div class="rateyo" id= "rate"
                              data-rateyo-rating="<?php echo $fetch['rating']; ?>"
                              data-rateyo-num-stars="5"
                              data-rateyo-score="3">
                        </div>
                     </div>
                     <?php
                  }
               ?>
               
               
            </div>
   </div>
</center>
<br>

<?php @include 'footer.php'; ?>

</div>



<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- External js file link  -->
<script src="js/script.js"></script>

<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating);
        });
    });

</script>

</body>
</html>