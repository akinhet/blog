<?php
session_start();
if(isset($_SESSION["loggedin"]) && isset($_SESSION["login"])){
    header('Location: admin.php');
    die();
}
?>
<!doctype html>
<html lang=pl>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styl.css">
		<title>Zaloguj się</title>
	</head>
    <body>
        <button onclick="window.location.href='index.php';" class="button">Go back</button>
        <?php
            if(isset($_POST["login"]) && isset($_POST["password"])){
                require_once("conf.php");
                $login=$_POST["login"];
                $password=$_POST["password"];
                $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                if(!$link){
                    http_response_code(500);
                }
                mysqli_query($link, "SET NAMES UTF8");
                $result=mysqli_query($link, "SELECT * FROM ".$dbprefix."accounts WHERE login='$login'");
                if(!$result){
                    echo '<div class="notification">Unknown login</div>';
                }else{
                    $row=mysqli_fetch_assoc($result);
                    if(password_verify($password, $row["hash"])){
                        $_SESSION["loggedin"] = True;
                        $_SESSION["login"] = $row["id"];
                        header('Location: admin.php');
                    }else{
                        echo '<div class="notification">Wrong password</div>';
                    }        
                }
                mysqli_free_result($result);
                mysqli_close($link);
            }
        ?>
        <div class="previewBody">
            <form action="login.php" method="POST" class="loginForm">
                <input type="text" placeholder="Login" name="login" class="login" required><br>
                <input type="password" placeholder="Password" name="password" class="password" required><br>
                <input type="submit" value="Log in" class="button" style="margin: 15px 0;"><br>
            </form>
        </div>
    </body>
</html>
