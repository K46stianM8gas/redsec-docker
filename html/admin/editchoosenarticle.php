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

$sql = "SELECT ID, Label, Content FROM articles WHERE ID like " . $_GET['edit'] . ";";
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

<img src='../logo.png'>

<?php
foreach ($articles as $output)
{
echo '<p>Witaj ' . $_SESSION["name"] . ', edytujesz artykuł: '. $output['Label'] . ' </p>';
}
?>

<div id="tresc2">

<?php 
foreach ($articles as $output)
{
    ?><form action="edit.php?edit=<?=$output['ID']?>" method="post">
     <h2>Label:           <input type="text" name="LabelForm" style="height: 18px; width: 200px; padding-top:5px;" value="<?=$output['Label']?>"></h2>
     <h2>Content:</h2> <textarea type="text" name="ContentForm" style="height: 350px; width: 50%; border:solid; background-color:lightgray"><?=$output['Content']?></textarea>
    <p>

     <input type="submit" value="Zapisz" id="przycisk_log">

    </p>

    </form>

    <?php
}
?>
<p>
<a href="panel.php" ><input type="button" value="Panel główny" id="przycisk_log"></a>
    <a href="logout.php"><input type="button" value="Wyloguj" id="przycisk_log"></a>
</p>


</div>

</body>
</html>