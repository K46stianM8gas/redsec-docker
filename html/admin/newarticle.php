<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="../stylesheet.css">
    <meta charset="UTF-8">
</head>
<body>
    <div id="tresc2">
<img src='../logo.png'>
<h2><?='Witaj ' . $_SESSION["name"] . ', znajdujesz się w sekcji DODAJ  ARTYKUŁ';?></h2>


<form action="addnewarticle.php" method="post">
   <h2>Label:           <input type="text" name="Label" style="height: 18px; width: 200px; padding-top:5px;"></h2>
    <h2>Content:</h2> <textarea type="text" name="Content" style="height: 350px; width: 50%; border:solid; background-color:lightgray">Tekst artykułu...</textarea> 
    
<p>
  <input type="submit" value="Dodaj" id="przycisk_log"> 
  <input type="reset"  id="przycisk_log"> 
</p>

</form>

<p>
    <a href="logout.php"><input type="button" value="Wyloguj" id="przycisk_log"></a>
</p>

    <div>

</body>
</html>