<?php
session_start();
?>
<?php
if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
}
?>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Source+Sans+Pro&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="style_chatu.css">
</head>
<body>
<div class="chContainer col-md-10 offset-md-1">
<div class="chHeader">
<img src="profile.png" width="50px" height="50px" class="profil">
<?php
echo "Witaj"." " .'<strong>'.$_SESSION['user'].'</strong>'."!";

?>
</div>
<div class="row mess_cont overflow-auto">
<div class="chMessages"></div></div>
<div class="row justify-content chBottom">
<form action="Chatposter.php" onSubmit='return false;' id="chatForm" method="post" class="col-10">
         <input type="hidden" id="name" value="<?php echo $_SESSION['user']; ?>"/>
         <input type="text" class="float-left col-10" name="text" id="text" value="" placeholder="Wpisz wiadomość"/>
         <input type="submit" name="submit" class="btn btn-succes guzik offset-7" value="Wyślij" />
</form>
  <button class="btn btn-danger przycisk col-2 align-right" ><a href="logout.php">Wyloguj się</a></button>
</div>
</div>
</div> 
    
<script>
$(document).on('submit', '#chatForm', function(){
   var text = $.trim($("#text").val());
   var name = $.trim($("#name").val());

   if(text != "" && name != "") {
      $.post('Chatposter.php', {text: text, name: name}, function(data){
         $(".chMessages").append(data);				
         $(".chMessages").scrollTop($(".chMessages")[0].scrollHeight);
         $("#text").val('');
      });
   } else {
        alert("Musisz wpisac wiadomość!");
     }
});
    function getMessages() {
   $.get('GetMessages.php', function(data){
      var amountMsg = $(".chMessages li:last-child").attr('id');
      $(".chMessages").html(data);
      var countMsg = data.split('<li').length - 1;
      array = [countMsg, amountMsg];
   });
   return array;
}

setInterval(function(){
   var num = getMessages();
   if(num[0] > num[1]) {
   $(".chMessages").scrollTop($(".chMessages")[0].scrollHeight);
   }
},1000);
</script>
    </body>
</html>
