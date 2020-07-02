<?php
include('user_validation.php');

$errors=[];
  if(isset($_POST['submit'])){
$validation= new UserValidation($_POST);
$errors=$validation->validationForm();

// echo$errors['username']."<br>".$errors['email'];
  }


 ?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>PHP OOP Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./master.css">
  </head>
  <body>
 <div class="new-user">

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <label for="username">username: </label>
      <!-- error username -->
      <div class="errors" role="alert">
  <?php echo $errors['username'] ?? '' ?>
</div>
      <input type="text" id="username" name="username"value="<?php echo htmlspecialchars($_POST['username'] ?? '') ?>">
      <label for="email">email: </label>
      <!-- error email-->
             <div class="errors" role="alert">
  <?php echo $errors['email']??''?>
</div>
      <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>" >
      <input type="submit" class="btn btn-primary" value="submit" name='submit'>
    </form>
 </div>



  </body>
</html>
