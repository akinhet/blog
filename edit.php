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
        <button onclick="window.location.href='admin.php';" class="button">Go back</button>
        <div class='previewBody'>
            <form action="save.php" method="post">
                <?php
                    echo "<label>Title:</label><br>";
                    echo "<input type='text' name='editTitle' class='editTitle' value='$title'><br>";
                    echo "<label>Content:</label><br>";
                    echo "<textarea name='editContent' class='editContent'>$content</textarea><br>";
                    echo "<label>Publish:</label>";
                    echo "<input type='checkbox' name='editStatus' class='editStatus' value='ready'><br>";
                    echo "<input type='hidden' name='editID' value='$id'>";
                ?>
                <input type="submit" class="button" style="margin: 10px 0;" value="Save">
            </form>
        </div>
    </body>
</html>
