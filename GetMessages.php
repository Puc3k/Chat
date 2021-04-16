<?php
$host = "localhost";
$userName = "root";
$password = "";
$dbname = "chat";
$db = @new mysqli($host, $userName, $password, $dbname);
$db->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
$db->query("SET CHARSET utf8");
$query=mysqli_query($db,'SELECT * FROM messages');
while($row = mysqli_fetch_array($query)){
   $name = $row['name'];
   $message = $row['message'];
   $id = $row['id'];

   echo "<li id='$id' class='msg'><b>".ucwords($name).":</b> ".$message."</li>";
}

?>