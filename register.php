<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"]) || $_SESSION["login"]!="1"){
    header('Location: login.php');
    die();
}elseif(isset($_POST["login"]) && isset($_POST["password"])){
    $login=$_POST["login"];
    $hash=password_hash($_POST["password"], PASSWORD_DEFAULT);
    require_once("conf.php");
    $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_query($link, "SET NAMES UTF8");
    $result=mysqli_query($link, "INSERT INTO ".$dbprefix."accounts VALUES(NULL,'$login','$hash')");
    mysqli_free_result($result);
    mysqli_close($link);
    header('Location: admin.php');
}
?>
<!doctype html>
<html lang=pl>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styl.css">
		<title>Admin Panel</title>
	</head>
    <body>
        <form action="register.php" method="post">
            <label for="registerLogin">Login: </label>
            <input type="text" name="login" id="registerLogin"><br>
            <label for="registerPassword">Password: </label>
            <input type="password" name="password" id="registerPassword"><br>
            <button type="submit" class="registerButton">Register</button>
        </form>
    </body>
</html>
