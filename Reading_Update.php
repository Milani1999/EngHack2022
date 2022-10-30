<?php

@include 'configure.php';

 //function for updating a question

 $id = $_GET['edit'];

 if(isset($_POST['update_question'])){
 
    $Ques_Read = $_POST['Ques_Read'];
    $Question = $_FILES['Question']['name'];
    $Question_tmp_name = $_FILES['Question']['tmp_name'];
    $Question_folder = 'uploaded_img/'.$Question;
 
 
    if(empty($Ques_Read) || empty($Question)){
       $message[] = 'please fill out all';
    }else{
 
       $update_data = "UPDATE question SET id='$id', Question='$Question', Ques_read='$Ques_read'  WHERE Ques_ID = '$id'";
       $upload = mysqli_query($conn, $update_data);
 
       if($upload){
          move_uploaded_file($Question_tmp_name, $Question_folder);
          header('location:Admin_Reading.php');
       }else{
          $$message[] = 'please fill out all!'; 
       }
 
    }
 };

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   

</head>
<body>
<a href="User/User_Reading.php">Reading</a>
<a href="User/User_Speaking.php">Speaking</a>
<a href="User/Admin_Listening.php">Listening</a>
<a href="User/Admin_Writing.php">Writing</a>
<a href="User/User_Grammar.php">Grammar</a>
 <?php 



if(isset($message)){
   foreach($message as $message){
      echo '<span class="text-center">'.$message.'</span>';
   }
}

?>


   <!-- Updating existing question -->

   

      <!-- <div class="modal" id="modal"> -->

         <!-- <div class="modal-body"> -->

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM question WHERE Ques_ID = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

         <h3 class="text-center">Update the Question</h3>

         <input type="file" accept="image/mp3" name="Question" class="form-control" value="uploaded_img/<?php echo $row['Question']; ?>" >
         <textarea placeholder="Enter the paragraph to read" name="Ques_Read" class="form-control"><?php echo $row['Ques_Read']; ?></textarea>
         <div class="text-center">
         <input type="submit" class="btn btn-primary" name="update_question" value="Add Question">
         </div>
      </form>

      <?php }; ?>

         </div>
        
      <!-- </div>
      <div id="overlay"></div>
   
  
         </div> -->


</body>
</html>