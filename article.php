<!doctype html>
<html lang=pl>
	<head>
		<meta charset="utf-8">
        <link href='https://fonts.googleapis.com/css?family=Anonymous Pro' rel='stylesheet'>
		<link rel="stylesheet" href="styl.css">
		<title>Article</title>
	</head>
	<body>
        <button onclick="window.location.href='index.php';" class="button">Go back</button>
        <div class='previewBody'>
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
            echo "<h3 class='previewDate'>$date</h3>";
            echo "<h1 class='previewTitle'>$title</h2>";
            echo "<h3 class='previewAuthor'>$author</h3>";
            echo "<div class='previewContent'>$content</div>";
            mysqli_free_result($result);
            mysqli_close($link);
        ?>
        </div>
        <footer>
            <div class="footer-selection">Facebook</div>
            <div class="footer-selection">Instagram</div>
            <div class="footer-selection">Discord</div>
            <div class="copyright">Copyright © 2020 Piotr Zieniewicz</div>
        </footer>
    </body>
</html>
