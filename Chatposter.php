<?php
$host = "localhost";
$userName = "root";
$password = "";
$dbname = "chat";
$db = @new mysqli($host, $userName, $password, $dbname);
   if(isset($_POST['text']) && isset($_POST['name'])) {
$db->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
$db->query("SET CHARSET utf8");
      $text = strip_tags(stripslashes($_POST['text']));
      $name = strip_tags(stripslashes($_POST['name']));
      if(!empty($text) && !empty($name)) {
         $query = mysqli_query($db,"INSERT INTO messages (name,message) VALUES( '".$name."', '".$text."')");
         echo "<li class='msg'><b>".ucwords($name).":</b> ".$text."</li>";
      }
   }

 ?>