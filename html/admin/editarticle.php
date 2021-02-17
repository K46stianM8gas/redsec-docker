<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<?php

$servername = 'mysql-server';
$username = 'root';
$password = 'secret';
$dbName = 'redsec';

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn -> connect_error)
{
    die("Connection failed: " . $conn -> connect_error);
}

$sql = 'SELECT ID, Label, Content FROM articles;';
$result = $conn->query($sql);

$articles = array();

if($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        $articles[] = $row;
    }
}
else
{
    echo "0 results";
}



$conn -> close();

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
<h2><?='Witaj ' . $_SESSION["name"] . ', wybierz artykuł, który chcesz edytować:';?></h2>




<?php

foreach ($articles as $output)
{
    $output = "<h3>" . $output["Label"] . " - <a href='editchoosenarticle.php?edit=" . $output["ID"] . "'> Edytuj </a>";
    echo $output;
}

?>

<p>
    <a href="logout.php"><input type="button" value="Wyloguj" id="przycisk_log"></a>
</p>
<div>
</body>
</html>