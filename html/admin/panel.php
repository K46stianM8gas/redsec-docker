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
<h2><?='Witaj ' . $_SESSION["name"] . ' w naszym panelu administracyjnym. Skorzystaj z poniższych funkcji.'?></h2>


<a href="newarticle.php" ><input type="button" value="Dodaj artykuł" id="przycisk"></a>
<a href="editarticle.php"><input type="button" value="Edytuj artykuł" id="przycisk"></a>
<a href="deletearticle.php"><input type="button" value="Usuń artykuł" id="przycisk"></a>
<a href="logout.php"><input type="button" value="Wyloguj" id="przycisk"></a>

</div>

</body>
</html>