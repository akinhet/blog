<!doctype html>
<html lang=pl>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styl.css">
		<title>Article</title>
	</head>
	<body>
        <button onclick="window.location.href='index.php';">Go back</button>
        <?php
            require_once("conf.php");
            require_once("parsedown.php");
            date_default_timezone_set('Europe/Warsaw');
            $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            mysqli_query($link, "SET NAMES UTF8");
            $id=$_GET["id"];
            $result=mysqli_query($link, "SELECT ".$dbprefix."articles.*, login FROM ".$dbprefix."articles, ".$dbprefix."accounts WHERE author=".$dbprefix."accounts.id AND ".$dbprefix."articles.id=$id");
            $row=mysqli_fetch_assoc($result);
            $date=date("H:i d-m-Y", $row["date"]);
            $author=$row["login"];
            $title=$row["title"];
            $reads=$row["readCount"];
            $reads+=1;
            mysqli_query($link, "UPDATE ".$dbprefix."articles SET readCount=$reads WHERE id=$id");
            $content=Parsedown::instance()->text($row["content"]);
            echo "<h1 class='previewTitle'>$title</h2>";
            echo "<h3 class='previewDate'>$date</h3>";
            echo "<h3 class='previewAuthor'>$author</h3>";
            echo "<div class='previewBody'>$content</div>";
            mysqli_free_result($result);
            mysqli_close($link);
        ?>
    </body>
</html>
