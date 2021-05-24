<!doctype html>
<html lang=pl>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styl.css">
		<title>Admin Panel</title>
	</head>
	<body>
        <button onclick="window.location.href='index.php';">Log out</button>
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

            while($row=mysqli_fetch_assoc($result)){
                $title=$row["title"];
                $content=substrwords($row["content"], 100);
                $date=date("H:i d-m-Y", $row["date"]);
                echo "<article class='articleBody'>";
                echo "<h2 class='articleTitle'>$title</h2>";
                echo "<h3 class='articleDate'>$date</h3>";
                echo "<p class='articleContent'>$content</p>";
                echo "</article>";
            }
            mysqli_free_result($result);
            mysqli_close($link);
        ?>
	</body>
</html>
