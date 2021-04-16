<?php
session_start();
if((isset($_SESSION['zalogowany'])) &&($_SESSION['zalogowany']==true))
{
    header('Location: zalogowany.php');
        exit();
}
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Source+Sans+Pro&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="bg-img">
  <div class="row ">
  <form action="zaloguj.php" method="post" class="container justify-content-center">
    <h1 class="form-tittle">LOGIN</h1>

      <label for="email"><b>Email</b></label></br>
      <i class="fa fa-envelope icon icon2"></i>
    <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label></br>
      <i class="fa fa-key icon"></i><input type="password" placeholder="Enter Password" name="psw" required>
      <?php
         if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
      ?>

    <button type="submit" class="btn">Login</button>
  </form>
  </div>
</div>
</div>
</body>
</html>