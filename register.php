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
    $result=mysqli_query($link, "SELECT * FROM ".$dbprefix."accounts WHERE login='$login'");
    if(mysqli_num_rows($result)==0){
        mysqli_query($link, "INSERT INTO ".$dbprefix."accounts VALUES(NULL,'$login','$hash')");
        mysqli_free_result($result);
        mysqli_close($link);
        header('Location: admin.php');
    }else{
        $error="This login was already taken.";
        mysqli_free_result($result);
        mysqli_close($link);
    }
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
        <button onclick="window.location.href='admin.php';" class="button">Go back</button>
        <?php
        if(isset($error)){
            echo "<p class='notification'>".$error."</p>";
        }
        ?>
        <div class="previewBody">
            <form action="register.php" method="post">
                <label for="registerLogin">Login: </label>
                <input type="text" name="login" id="registerLogin"><br>
                <label for="registerPassword">Password: </label>
                <input type="password" name="password" id="registerPassword"><br>
                <button type="submit" class="button" style="margin: 15px 0;">Register</button>
            </form>
        </div>
    </body>
</html>
