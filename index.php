<!DOCTYPE html>
<html>
<head>
   <title>Document</title>
   <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
   <div class="bg-image">
   </div>

<div class="login">
<?php
require('db.php');
session_start();

if (isset($_POST['username'])) {
   $username = $_REQUEST['username'];
   $password = $_REQUEST['password'];
   $query = "SELECT * FROM `users` WHERE `username`='$username' and `password`= '$password'";
   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   $rows = mysqli_num_rows($result);
   if ($rows == 1) {
       $_SESSION['username'] = $username;
       header("Location: start.php");
   } else {
       echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='index.php'>Login</a></div>";
   }
} else {
?>

<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Don't have an account? <a href='registration.php'>Sign Up!</a></p>
</div>
<?php }
?>
</body>
</html>