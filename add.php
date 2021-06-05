<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"])){
    header('Location: login.php');
}
?>
<!doctype html>
<html lang=pl>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styl.css">
		<title>Edit Article</title>
	</head>
	<body>
        <form action="save.php">
            <label for='addTitle'>Title:</label><br>
            <input type='text' name='addTitle' class='addTitle'><br>
            <label for='addContent'>Content:</label><br>
            <textarea name='addContent' class='addContent'></textarea><br>
            <label for='addStatus'>Publish:</label>
            <input type='checkbox' name='addStatus' class='addStatus'><br>
            <input type="submit" value="Save">
        </form>
    </body>
</html>
