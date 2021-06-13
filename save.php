<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"])){
    header('Location: login.php');
    die();
}elseif(isset($_POST["addTitle"]) && isset($_POST["addContent"])){
    // articles(id, status, date, title, content);
    $title=$_POST["addTitle"];
    $time=time();
    if(isset($_POST["addStatus"])){
        $status=$_POST["addStatus"];
    }else{
        $status="draft";
    }
    $content=$_POST["addContent"];
    $author=$_SESSION["login"];
    require_once("conf.php");
    $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_query($link, "SET NAMES UTF8");
    mysqli_query($link, "INSERT INTO ".$dbprefix."articles VALUES (NULL,'$status','$time','$title','$content','$author','0')");
    header('Location: admin.php');
}elseif(isset($_POST["editTitle"]) && isset($_POST["editContent"]) && isset($_POST["editID"])){
    // articles(id, status, date, title, content);
    $title=$_POST["editTitle"];
    $time=time();
    if(isset($_POST["editStatus"])){
        $status=$_POST["editStatus"];
    }else{
        $status="draft";
    }
    $content=$_POST["editContent"];
    $id=$_POST["editID"];
    $author=$_SESSION["login"];
    require_once("conf.php");
    $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_query($link, "SET NAMES UTF8");
    mysqli_query($link, "UPDATE ".$dbprefix."articles SET status='$status', date='$time', title='$title', content='$content', author='$author' WHERE id=$id");
    header('Location: admin.php');
}
?>
