<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$servername = 'mysql-server';
$username = 'root';
$password = 'secret';
$dbName = 'redsec';

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn -> connect_error)
{
    die("Connection failed: " . $conn -> connect_error);
}

#Uncomment following line to check connection
#echo "Connected successfully";


$sql = "DELETE FROM articles WHERE ID like ". $_GET['delete'] . ";";
$result = $conn->query($sql);

$newUrl = 'panel.php';
header('Location: '.$newUrl);

?>