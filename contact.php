<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>
   
<div class="container-main1">

<?php @include 'header.php'; ?>

<section class="contact">

   <h1 class="heading">contact us</h1>

   <form action="" method="post">

      <div class="flex">

         <div class="inputBox">
            <span>Your name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>

         <div class="inputBox">
            <span>Your email</span>
            <input type="email" placeholder="Enter your email" name="email" required>
         </div>

         <div class="inputBox">
            <span>Mobile number</span>
            <input type="number" placeholder="Enter your mobile number" name="number" required>
         </div>

         <div class="inputBox">
            <span>Choose Skill</span>
            <select name="plan">
               <option value="reading">Reading</option>
               <option value="listening">Listening</option>
               <option value="writing">Writing</option>
               <option value="speaking">Speaking</option>
               <option value="grammar">Grammar</option>
               <option value="other">Other</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Your message</span>            
            <textarea name="message" placeholder="Enter your message" required cols="30" rows="10"></textarea>
         </div>

      </div>

      <input type="submit" value="send message" name="send" class="btn submit-btn">

   </form>

</section>

<?php @include 'footer.php'; ?>

</div>















<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>