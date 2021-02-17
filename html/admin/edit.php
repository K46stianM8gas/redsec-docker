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



$sql = "UPDATE articles SET Label='{$_POST['LabelForm']}', Content='{$_POST['ContentForm']}' WHERE ID like {$_GET['edit']};";
$result = $conn->query($sql);




$conn -> close();
$newUrl = 'panel.php';
header('Location: '.$newUrl);



?>