<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"])){
    header('Location: login.php');
}else{
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        require_once("conf.php");
        $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        mysqli_query($link, "SET NAMES UTF8");
        $result=mysqli_query($link, "SELECT * FROM ".$dbprefix."articles WHERE id=$id");
        if(mysqli_num_rows($result) != 1){
            header('Location: admin.php');
        }else{
            $row=mysqli_fetch_assoc($result);
            $id=$row["id"];
            $title=$row["title"];
            $content=$row["content"];
            $status=$row["status"];
        }    
    }else{
        header('Location: admin.php');
    }
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
            <?php
                echo "<label for='editTitle'>Title:</label><br>";
                echo "<input type='text' name='editTitle' class='editTitle' value='$title'><br>";
                echo "<label for='editContent'>Content:</label><br>";
                echo "<textarea name='editContent' class='editContent'>$content</textarea><br>";
                echo "<label for='editStatus'>Publish:</label>";
                echo "<input type='checkbox' name='editStatus' class='editStatus'><br>";
                echo "<input type='hidden' name='editID' value='$id'>";
            ?>
            <input type="submit" value="Save">
        </form>
    </body>
</html>
