<?php 
if($_SERVER['REQUEST_METHOD']=='post')
{
  if(empty($_POST['username'])){
    $username_error = "Please enter Username";
  }

  if(empty($_POST['email'])){
    $email_error = "Please enter Username";
  }
  if(empty($_POST['password1'])){
    $password1_error = "Please enter password";
  }
  if(empty($_POST['password22'])){
    $password2_error = "Please enter Password again";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration </title>
  <link rel="stylesheet"href="style.css">
</head>
<body>
  <div class="header">
        <h2>Register</h2>
  </div>
        
  <form method="post" action="">
        <div class="input-group">
          <label>Username</label>
          <input type="text" name="username">
          <span> <?php if(isset($username_error)) echo $username_error; ?></span>
        </div>
        <div class="input-group">
          <label>Email</label>
          <input type="email" name="email">
          <span> <?php if(isset($email_error)) echo $email_error; ?></span>
        </div>
        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password1">
          <span> <?php if(isset($password1_error)) echo $password1_error; ?></span>
        </div>
        <div class="input-group">
          <label>Confirm password</label>
          <input type="password" name="password_2">
          <span><?php if(isset($password2_error)) echo $password2_error;?></span>
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
                Already a member? <a href="login.php">Sign in</a>
        </p>
  </form>
</body>
</html>