<?php

$currentPage = $_GET['id'] ?? 1;

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