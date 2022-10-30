<?php
@include 'configure.php';
   $select = mysqli_query($conn, "SELECT * FROM question ORDER BY RAND()");
?>

<!DOCTYPE>
<html>
<?php require 'configure.php';
session_start(); 

$type="Reading";

if(isset($_POST['add'])){
   $rating = $_POST["rating"];

   $rate=mysqli_query($conn, "SELECT * FROM `rating` WHERE type='$type'") or die('query failed'); 
   if(mysqli_num_rows($rate)>0){
      while($select=mysqli_fetch_assoc($rate)){
         $value=$select['rating'];
         $res=$select['response'];
         $total=($value * $res)+$rating;
         $r=$res+1;
         $avg=$total/$r;
      }
   }
   
   mysqli_query($conn,"UPDATE rating SET rating='$avg', response='$r' WHERE type='$type'");
}
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">  
</head>
<body>
<a href="User_Reading.php">Reading</a>
<a href="User_Speaking.php">Speaking</a>
<a href="User_Listening.php">Listening</a>
<a href="User_Writing.php">Writing</a>
<a href="User_Grammar.php">Grammar</a>
<a href="AdminDash.php">Admin</a>   

<center>

<?php 														

    if (isset($_POST['click']) || isset($_GET['start'])) {
	    @$_SESSION['clicks'] += 1 ;
	    $c = $_SESSION['clicks'];
			if(isset($_POST['userans'])) { $userselected = $_POST['userans'];
																
				$fetchqry2 = "UPDATE `table_listening` SET `userans`='$userselected' WHERE `id`=$c-1"; 
			    $result2 = mysqli_query($conn,$fetchqry2);
		    }
		  
																	
 	} else {
		$_SESSION['clicks'] = 0;
	}
																
	//echo($_SESSION['clicks']);
	?>
    
    <div class="col-md-6">
      <h1>Listen the audio carefully and read the sentences in your own</h1><br/>
      <div class="slideshow-container">
         <?php while($row = mysqli_fetch_assoc($select)){ ?>

            <div class="mySlides">
               <q><audio controls><source src="uploaded_img/<?php echo $row['Question']; ?>"></audio></q><br/>
               <p class="author"><?php echo $row['Ques_Read']; ?></p><br/>
            </div>

               <?php
               }
               ?>

      <button class="btn btn-secondary" onclick="plusSlides(1)">Next</button><br/><br/>

   </div>


   <script>
   var slideIndex = 1;
   showSlides(slideIndex);

   function plusSlides(n) {
      showSlides(slideIndex += n);
   }

   function currentSlide(n) {
      showSlides(slideIndex = n);
   }

   function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
   
      for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";  
      }
  
   slides[slideIndex-1].style.display = "block";  
   }

</script>
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

   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>
</center>



	<div class="container">
            <div class="row">
               <div class="col-sm">
                 
               </div>
               <div class="col-sm">
               <form action =""  method="post">
                  <center>
                     <div class="rateyo" id= "rate"
                        data-rateyo-rating="4"
                        data-rateyo-num-stars="5"
                        data-rateyo-score="3">
                     </div>                  

                     <span class='result'>0</span>
                     <input type="hidden" name="rating">
                     <div class="inputBox"><input type="submit" name="add" value="Rating<?php echo ' '.$type; ?>" class="btn btn-primary"> </div>
                  </center>
                  </form>
               </div>
            <div class="col-sm">
         </div>
      </div>
   </div>
<!-- </section> -->
         


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

   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>
</body>
</html>