<!DOCTYPE>
<html>
<?php require 'configure.php';
session_start(); 

$type="Listening";

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
   <br/><h1>Listen the audio carefully and spot out the answers</h1><br/>
    
<div class="bump"><br><form><?php if($_SESSION['clicks']==0){ ?> <button class="button" name="start" float="left"><span>START QUIZ</span></button> <?php } ?></form></div>
<form action="" method="post">            
<table><?php if(isset($c)) {   $fetchqry = "SELECT * FROM `table_listening` where id='$c'"; 
            $result=mysqli_query($conn,$fetchqry);
            $num=mysqli_num_rows($result);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
         
         
         }
        ?>
         
   <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){ ?>
      <tr><td><audio controls><source src='uploaded_img/<?php echo $row['que']; ?>'></audio><br><br></td></tr>
         <tr><td><?php echo $row['Ques_Read']; ?><br><br></td></tr>  
      <tr><td><input required type="radio" name="userans" value="<?php echo $row['option_1'];?>">&nbsp;<?php echo $row['option_1']; ?><br>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option_2'];?>">&nbsp;<?php echo $row['option_2'];?></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option_3'];?>">&nbsp;<?php echo $row['option_3']; ?></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option_4'];?>">&nbsp;<?php echo $row['option_4']; ?><br><br><br></td></tr>

  <tr><td><button class="btn btn-secondary" name="click" >Next</button></td></tr></table> <?php }  
                                                   ?> 
  </form>
 <?php if($_SESSION['clicks']>5){ 
   $qry3 = "SELECT `ans`, `userans` FROM `table_listening`;";
   $result3 = mysqli_query($conn,$qry3);
   $storeArray = Array();
   $x=0;
   ?>
     <div class="col-md-6">
      <?php
   while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
      $x++;
     if($row3['ans']==$row3['userans']){
       @$_SESSION['score'] += 1 ;
       ?>
       <div class="p-3 mb-2 bg-success text-white">
         <?php
       echo $x." Correct Answer <br>";
       ?>
       </div>
       <?php
    }else{
      ?>
<div class="p-3 mb-2 bg-danger text-white">
   <?php
      echo $x."  Wrong Answer <br>";
      ?>
      </div>
   
   <?php
    }
}
 
 ?> 
  </div>
 
 <h2>Result</h2>
 <span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score']; 
 session_unset(); ?></span><br>
 <span>Your Score:&nbsp<?php echo $no*2; ?></span>
<?php } ?>
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

