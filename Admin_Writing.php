<?php

@include 'configure.php';

if(isset($_POST['add_audio'])){

   $Question = $_FILES['Question']['name'];
   $Question_tmp_name = $_FILES['Question']['tmp_name'];
   $Question_folder = 'uploaded_img/'.$Question;
   $ans = $_POST['ans'];

   if(empty($Question) || empty($ans)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO table_writing(que,ans) 
      VALUES('$Question', '$ans'
      )";
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
   mysqli_query($conn, "DELETE FROM table_writing WHERE id = $id");
   header('location:Admin_Writing.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
  
   <title>Writing Page</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
<div class="row d-flex justify-content-center">
   <div class="col-md-6">
        <div class="form-group">
            <h1 class="text-center">Manage Writing Page</h1>
            <div class="border border-primary">
                <div class="col px-md-5">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"><br/>
         <h3 class="text-center">Add a new question</h3><br/>
         
         <input type="file" accept="image/mp3" name="Question" class="form-control"><br/>
         <input type="text" placeholder="enter the correct answer" name="ans" class="form-control"><br/>
         <div class="text-center">
            <input type="submit" class="btn btn-primary" name="add_audio" value="add question">
         </div>
         <br/>
      </form>
 
      </div>
</div>

   </div>
</div>


   <?php

   $select = mysqli_query($conn, "SELECT * FROM table_writing");
   
   ?>

   <div class="col-md-10">
   <br/>
      <table class="table table-striped table-hover">
         <thead>
         <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><audio controls><source src="uploaded_img/<?php echo $row['que']; ?>"></audio></td>
            <td><?php echo $row['ans']; ?></td>


            <td>
               <!-- <a href="" class="btn"> <i class="fas fa-edit"></i> edit </a> -->
               <a href="Admin_Writing.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>
         </div>
         </div>

</body>
</html>