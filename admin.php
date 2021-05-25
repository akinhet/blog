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
		<title>Admin Panel</title>
	</head>
	<body>
        <button onclick="window.location.href='logout.php';">Log out</button>
        <form action="admin.php" method="get">
            <?php
            if(isset($_GET["searchQuery"])){
                $search=$_GET["searchQuery"];
                echo "<input type='text' name='searchQuery' class='searchQuery' value='$search'>";
            }else{
                echo "<input type='text' name='searchQuery' class='searchQuery'>";
            }
            ?>
            <button type="submit" class="searchButton">
                <img src="searchicon.png">
            </button>
        </form>
        <?php
            require_once("conf.php");
            require_once("functions.php");
            date_default_timezone_set('Europe/Warsaw');
            // articles(id, status, date, title, content);
            $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            mysqli_query($link, "SET NAMES UTF8");

            if(isset($search)){
                $result=mysqli_query($link, "SELECT * FROM ".$dbprefix."articles WHERE status='ready' AND content LIKE '%$search%' OR title LIKE '%$search%' ORDER BY date");
            }else{
                $result=mysqli_query($link, "SELECT * FROM ".$dbprefix."articles WHERE status='ready' ORDER BY date");
            }

            if($result){
                echo "<table class='adminTable' border=1><thead><tr>";
                echo "<th>Staus</th>";
                echo "<th>Title</th>";
                echo "<th>Content</th>";
                echo "<th>Date</th>";
                echo "<th>Actions</th>";
                echo "</tr></thead><tbody>";
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row["id"];
                    $title=$row["title"];
                    $content=substrwords($row["content"], 100);
                    $date=date("H:i d-m-Y", $row["date"]);
                    $status=$row["status"];
                    echo "<tr>";
                    echo "<td>$status</td>";
                    echo "<td>$title</td>";
                    echo "<td>$content</td>";
                    echo "<td>$date</td>";
                    echo "<td><button onclick="."window.location.href='edit.php?id=$id'".";>Edit</button>";
                    echo "<button onclick="."window.location.href='article.php?id=$id'".";>Preview</button>";
                    echo "<button onclick="."window.location.href='delete.php?id=$id'".";>Delete</button></td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
                mysqli_free_result($result);
            }
            mysqli_close($link);
        ?>
	</body>
</html>
