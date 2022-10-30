<?php

@include 'configure.php';


//function for adding a question

if(isset($_POST['add_audio'])){

   $Ques_Read = $_POST['Ques_Read'];
   $Question = $_FILES['Question']['name'];
   $Question_tmp_name = $_FILES['Question']['tmp_name'];
   $Question_folder = 'uploaded_img/'.$Question;

   if(empty($Ques_Read) || empty($Question)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO question(Question, Ques_Read) VALUES('$Question' ,'$Ques_Read')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($Question_tmp_name, $Question_folder);
         $message[] = 'new question added successfully';
      }else{
         $message[] = 'could not add the question';
      }
   }

};

// function for delete

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM question WHERE Ques_ID = $id");
   header('location:Admin_reading.php');
};

if(isset($_POST['add'])){
   $rating = $_POST["rating"];
   $type="reading";
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


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">   
<title>Reading Page</title>

</head>
<body>

<a href="Admin_reading.php">Reading</a>
<a href="Admin_Speaking.php">Speaking</a>
<a href="Admin_Listening.php">Listening</a>
<a href="Admin_Writing.php">Writing</a>
<a href="Admin_Grammar.php">Grammar</a>
<a href="skills.php">Skills</a>


 <?php 

if(isset($message)){
   foreach($message as $message){
      echo '<span class="text-center">'.$message.'</span>';
   }
}

?>

<!-- Adding a new question -->
   
<div class="row d-flex justify-content-center">
   <div class="col-md-6">
      <div class="form-group">
      <h1 class="text-center">Manage Reading Page</h1><br/>
         <div class="border border-primary">
            <div class="col px-md-5">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"><br/>
         <h3 class="text-center">Add a new Question</h3><br/>
    
         <input type="file" accept="image/mp3" name="Question" class="form-control"><br/>
         <textarea placeholder="Enter the paragraph to read" name="Ques_Read" class="form-control"></textarea><br/>
         <div class="text-center">
         <input type="submit" class="btn btn-primary" name="add_audio" value="Add Question">
         </div>
         <br/>
      </form>
 
   </div>
</div>

   </div>
</div>
<br/>
   <!-- Updating existing question -->

   

      <div class="modal" id="modal">

         <div class="modal-body">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM question WHERE Ques_ID = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

         <h3 class="text-center">Update the Question</h3>

         <input type="file" accept="image/mp3" name="Question" class="form-control" value="<?php echo $row['Question']; ?>" >
         <textarea placeholder="Enter the paragraph to read" name="Ques_Read" class="form-control" value="<?php echo $row['Ques_Read']; ?>" ></textarea>
         <div class="text-center">
         <input type="submit" class="btn btn-primary" name="update_question" value="Add Question">
         </div>
      </form>

      <?php }; ?>

         </div>
        
      </div>
      <div id="overlay"></div>

   <!-- Display using table -->

<br/>
   <?php

   $select = mysqli_query($conn, "SELECT * FROM question");
   // $select = mysqli_query($conn, "SELECT * FROM question ORDER BY RAND() LIMIT 1");
   
   ?>
   <div class="col-md-10">
      <table class="table table-striped table-hover">
         <thead>
         <tr>
            <th class="text-center">Question</th>
            <th class="text-center">Paragraph</th>
            <th class="text-center">Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><audio controls><source src="uploaded_img/<?php echo $row['Question']; ?>"></audio></td>
            <td><?php echo $row['Ques_Read']; ?></td>

            <td>
               <!-- <a href="Reading_Update.php?edit=<?php echo $row['Ques_ID']; ?>" class="btn btn-success">edit </a> -->
               <a href="Admin_reading.php?delete=<?php echo $row['Ques_ID']; ?>" class="btn btn-danger">delete </a>
            </td>
         </tr>
      <?php } 
      ?>
      </table>
         </div>

    

</body>
</html>