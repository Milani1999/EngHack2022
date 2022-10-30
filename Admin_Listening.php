<?php

@include 'configure.php';

if(isset($_POST['add_audio'])){

   $Question = $_FILES['Question']['name'];
   $Question_tmp_name = $_FILES['Question']['tmp_name'];
   $Question_folder = 'uploaded_img/'.$Question;
   $Ques_Read = $_POST['Ques_Read'];
   $Ques_opt1 = $_POST['Ques_opt1'];
   $Ques_opt2 = $_POST['Ques_opt2'];
   $Ques_opt3 = $_POST['Ques_opt3'];
   $Ques_opt4 = $_POST['Ques_opt4'];
   $ans = $_POST['ans'];

   if(empty($Question) || empty($Ques_Read) || empty($Ques_opt1) || empty($Ques_opt2) || empty($Ques_opt3) || empty($Ques_opt4) || empty($ans)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO table_listening(que,Ques_Read,option_1, option_2, option_3, option_4,ans) 
      VALUES('$Question','$Ques_Read','$Ques_opt1',  '$Ques_opt2',  '$Ques_opt3',  '$Ques_opt4', '$ans'
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
   mysqli_query($conn, "DELETE FROM table_listening WHERE id = $id");
   header('location:Admin_Listening.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
  
   <title>admin page</title>

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
            <h1 class="text-center">Manage Listening Page</h1>
            <div class="border border-primary">
                <div class="col px-md-5">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"><br/>
         <h3 class="text-center">Add a new question</h3><br/>
         
         <input type="file" accept="image/mp3" name="Question" class="form-control"><br/>
         <input type="text" placeholder="Enter the question" name="Ques_Read" class="form-control"><br/>
         <input type="text" placeholder="Enter option 1" name="Ques_opt1" class="form-control"><br/>
         <input type="text" placeholder="Enter option 2" name="Ques_opt2" class="form-control"><br/>
         <input type="text" placeholder="Enter option 3" name="Ques_opt3" class="form-control"><br/>
         <input type="text" placeholder="Enter option 4" name="Ques_opt4" class="form-control"><br/>
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

   $select = mysqli_query($conn, "SELECT * FROM table_listening");
   
   ?>

   <div class="col-md-10">
   <br/>
      <table class="table table-striped table-hover">
         <thead>
         <tr>
            <th>Question</th>
            <th>Ques</th>
            <th>Option 01</th>
            <th>Option 02</th>
            <th>Option 03</th>
            <th>Option 04</th>
            <th>Answer</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><audio controls><source src="uploaded_img/<?php echo $row['que']; ?>"></audio></td> 
            <td><?php echo $row['Ques_Read']; ?></td>
            <td><?php echo $row['option_1']; ?></td>
            <td><?php echo $row['option_2']; ?></td>
            <td><?php echo $row['option_3']; ?></td>
            <td><?php echo $row['option_4']; ?></td>
            <td><?php echo $row['ans']; ?></td>


            <td>
               <!-- <a href="Admin_Listening.php?edit=<?php echo $row['id']; ?>" class="btn btn-success">edit </a> -->
               <a href="Admin_Listening.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete </a>
               
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