<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"])){
    header('Location: login.php');
    die();
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
        if(isset($_SESSION["error"])){
            echo "<p class='notification'>".$_SESSION['error']."</p>";
            unset($_SESSION["error"]);
        }
        ?>
        <form action="upload2.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" class="button" required>
            <input type="submit" value="Upload" class="button" name="submit">
        </form>
    </body>
</html>
