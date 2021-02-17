<?php
session_start();
$login = $_POST["users_login"];
$pass = $_POST["users_pass"];

#var_dump($login, $pass);

$servername = 'mysql-server';
$username = 'root';
$password = 'secret';
$dbName = 'redsec';

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn -> connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT username, password FROM users WHERE username like '{$login}';";
$result = $conn->query($sql);
#var_dump($result);
#var_dump($sql);
$users = array();

if($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        $users[] = $row;
    }
}
else
{
    echo "<script>
    alert('Błędne dane logowania!');
    window.location.href='login.php';
    </script>";
}

foreach ($users as $user)
{
    if($user["username"]==$login && $user["password"]==$pass)
    {
        echo 'Witaj ' . $user["username"] . '! Link do panelu: <a href="panel.php"> kliknij tutaj </a>';
        $_SESSION["loggedin"] = true;
        $_SESSION["name"] = $user["username"];
        #header("location: panel.php");

    }
    else
    {
        echo "<script>
        alert('Błędne dane logowania!');
        window.location.href='login.php';
        </script>";
    }
}
?>