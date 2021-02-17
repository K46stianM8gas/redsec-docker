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

$sql = 'SELECT ID, img, extension from images;';
$result = $conn->query($sql);

$images = array();

if($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        $images[] = $row;
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
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>REDsec</title>
</head>
<body>


<div id="naglowek">
    
<a href="index.php"><img id="logo" src="logo.png"></a>
    
<a href="index.php"><input type="button" value="Strona główna" id="przycisk"></a>
<a href="testypenetracyjne.php"><input type="button" value="Testy penetracyjne" id="przycisk"></a>
<a href="audyty.php"><input type="button" value="Audyty bezpieczeństwa IT" id="przycisk"></a>
<a href="outsourcing.php"><input type="button" value="Outsourcing bezpieczeństwa" id="przycisk"></a>
<a href="cloud.php"><input type="button" value="Bezpieczeństwo chmury" id="przycisk"></a>
<a href="blog.php?id=1&x=0"><input type="button" value="Blog" id="przycisk"></a>
<a href="galeria.php?id=1&x=0"><input type="button" value="Galeria" id="przycisk"></a>
        
</div>

<div class="tresc">
    
<?php

$output = array_slice($images, $_GET["x"], 1);


foreach ($output as $output)
{
    echo '<a><img src="data:image/' . $output["extension"] . ';base64,' . base64_encode($output["img"]) . '"  "></a>' ;
}

$previousPage = $currentPage - 1;
$previousArray1 = $_GET["x"] - 1;

$nextPage = $currentPage + 1;
$nextArray1 = $_GET["x"] + 1;

if($currentPage <= 1)
{
    ?><span><a href='galeria.php?id=<?=$nextPage . '&x=' . $nextArray1 ?>'>Następne zdjęcie -></a></span><?php
}
else if ($currentPage >= $result->num_rows)
{
    ?><span><a href='galeria.php?id=<?=$previousPage . '&x=' . $previousArray1 ?>'><- Poprzednie zdjęcie </a></span><?php
}
else
{
    ?><div class='nawigacja'><span><a href='galeria.php?id=<?=$previousPage . '&x=' . $previousArray1 ?>'><- Poprzednie zdjęcie </a></span>
    <span><a href='galeria.php?id=<?=$nextPage . '&x=' . $nextArray1 ?>'>Następne zdjęcie-></a></span></div><?php
}

?>
    </div>
<div id="stopka"> <p> <span>&#174;</span>  REDSEC OFFENCIVE SECURITY</p> </div>

</body>
</html>