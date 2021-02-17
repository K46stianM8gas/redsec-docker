<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="../stylesheet.css">
    <meta charset="UTF-8">
</head>
<body>

    <div id="logo2"><img src="../logo.png"></div>
    <div id="login">
    <form method="post" action="validate.php" >
        <table>
            <tr>
                <td><label for="users_login"><h3>Login</h3></label></td>
                <td><input type="text" 

                  name="users_login" id="users_login"></td>
            </tr>
            <tr>
                <td><label for="users_pass"><h3 style>Password</h3></label></td>
                <td><input name="users_pass" type="password" id="users_pass"></input></td>
            </tr>
            <tr>
                <div id="login"><td><a href="logout.php"><input type="submit" value="Zaloguj" id="przycisk_log"></a>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>