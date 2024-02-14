<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $servername = "localhost:8080";
  $database = "cms";

  $conn = new mysqli($servername,'root','', $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $username = $_POST['username'];
  $email = $_POST['mail'];
  $password = $_POST['password1'];
  $confirm_password = $_POST['password2'];
  //validation done in this process
  if($_SERVER['REQUEST_METHOD']=='post')
  {
    if(empty($_POST['username'])){
      $username_error = "Please enter Username";
    }
  
    if(empty($_POST['email'])){
      $email_error = "Please enter Email";
    } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST['email'])) {
      $email_error = "Invalid email format";
    }
    if(empty($_POST['password1'])){
      $password1_error = "Please enter password";
    }
    if(empty($_POST['password2'])){
      $password2_error = "Please enter Password again";
  
    }
  }
    $sql = "INSERT INTO registration (name,email,password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
      echo "record inserted successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
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
        <h2>Register in</h2>
  </div>
        
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="input-group">
          <label>Username</label>
          <input type="text" name="username">
          <span> <?php if(isset($username_error)) echo $username_error; ?></span>
        </div>
        <div class="input-group">
          <label>Email</label>
          <input type="email" name="mail">
          <span> <?php if(isset($email_error)) echo $email_error; ?></span>
        </div>
        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password1">
          <span> <?php if(isset($password1_error)) echo $password1_error; ?></span>
        </div>
        <div class="input-group">
          <label>Confirm password</label>
          <input type="password" name="password2">
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