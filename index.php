<!doctype html>
<html lang=pl>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styl.css">
		<title>Mój blog</title>
	</head>
	<body>
        <?php
            session_start();
            if(isset($_SESSION["loggedin"]) && isset($_SESSION["login"])){
                echo "<button onclick="."window.location.href='admin.php';".">Admin Panel</button>";
                echo "<button onclick="."window.location.href='logout.php';".">Log out</button>";
            }else{
                echo "<button onclick="."window.location.href='login.php';".">Log in</button>";
            }
        ?>
        <form action="index.php" method="get">
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

            $result=mysqli_query($link, "SELECT ".$dbprefix."articles.*, login FROM ".$dbprefix."articles, ".$dbprefix."accounts WHERE status='ready' AND author=".$dbprefix."accounts.id ORDER BY readCount DESC, date DESC LIMIT 1");
            $row=mysqli_fetch_assoc($result);

            $id=$row["id"];
            $title=$row["title"];
            $author=$row["login"];
            $content=substrwords($row["content"], 100);
            $date=date("H:i d m Y", $row["date"]);
            echo "<h1 class='indexPopular'>Our most popular article</h1>";
            echo "<article class='articleBody' onclick="."window.location.href='article.php?id=$id';".">";
            echo "<h1 class='articleTitle'>$title</h1>";
            echo "<h3 class='articleDate'>$date</h3>";
            echo "<h3 class='articleAuthor'>$author</h3>";
            echo "<p class='articleContent'>$content</p>";
            echo "</article>";

            if(isset($search)){
                $result=mysqli_query($link, "SELECT ".$dbprefix."articles.*, login FROM ".$dbprefix."articles, ".$dbprefix."accounts WHERE status='ready' AND author=".$dbprefix."accounts.id AND (content LIKE '%$search%' OR title LIKE '%$search%') ORDER BY date DESC");
            }else{
                $result=mysqli_query($link, "SELECT ".$dbprefix."articles.*, login FROM ".$dbprefix."articles, ".$dbprefix."accounts WHERE status='ready' AND author=".$dbprefix."accounts.id ORDER BY date DESC");
            }

            while($row=mysqli_fetch_assoc($result)){
                $id=$row["id"];
                $title=$row["title"];
                $author=$row["login"];
                $content=substrwords($row["content"], 100);
                $date=date("H:i d m Y", $row["date"]);
                echo "<article class='articleBody' onclick="."window.location.href='article.php?id=$id';".">";
                echo "<h1 class='articleTitle'>$title</h1>";
                echo "<h3 class='articleDate'>$date</h3>";
                echo "<h3 class='articleAuthor'>$author</h3>";
                echo "<p class='articleContent'>$content</p>";
                echo "</article>";
            }
            mysqli_free_result($result);
            mysqli_close($link);
        ?>
	</body>
</html>
