<?php

include("connect.php");

?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>REDsec Outsourcing bezpieczeństwa</title>
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
        $servername = 'mysql-server';
        $username = 'root';
        $password = 'secret';
        $dbName = 'redsec';

        $conn = new mysqli($servername, $username, $password, $dbName);

        if ($conn -> connect_error)
        {
            die("Connection failed: " . $conn -> connect_error);
        }

        $sql = 'SELECT tresc FROM content WHERE ID = 4;';
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

        foreach($articles as $output)
        {
            echo '<a>' . $output["tresc"] . '</a>';
        }

        ?>    

    <img src="logo.png">
    
</div>
    
     <div id="stopka"> <p> <span>&#174;</span>  REDSEC OFFENCIVE SECURITY</p> </div>

</body>
</html>