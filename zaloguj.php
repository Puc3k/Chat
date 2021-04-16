<?php
session_start();
    require_once "connect.php";
    $login = $_POST['email'];
    $haslo = $_POST['psw'];
    $conn = @new mysqli($host, $userName, $password, $dbname);
    if($conn->connect_errno!=0)
    {
        echo "'Error:'.$conn->connect_errno.'Opis:'.$conn->connect_error";
    }else{
      $sql = "SELECT * FROM login WHERE login='$login' AND password='$haslo'";
      if ($result = $conn->query($sql))
      {
        $ile = $result->num_rows;
          if($ile>0){
              $_SESSION['zalogowany'] = true;
            $row = $result->fetch_assoc();
              $_SESSION['user'] = $row['login'];
              $_SESSION['id'] = $row['id'];
              
              
              
              unset($_SESSION['blad']);
              $result->close();
              header('Location: zalogowany.php');
              
          }else{
              $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy email lub hasło</span>';
              header('Location: index.php');
          }
          
          
      }
        
        
        
        $conn->close();
    }
?>