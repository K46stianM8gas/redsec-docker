<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

echo $_POST["Label"];
echo $_POST["Content"];

$servername = 'mysql-server';
$username = 'root';
$password = 'secret';
$dbName = 'redsec';

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn -> connect_error)
{
    die("Connection failed: " . $conn -> connect_error);
}



$sql = "INSERT INTO articles (Label, Content) VALUES ('{$_POST["Label"]}', '{$_POST["Content"]}');";
$result = $conn->query($sql);




$conn -> close();
$newUrl = 'panel.php';
header('Location: '.$newUrl);



?>