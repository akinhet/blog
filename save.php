<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"])){
    header('Location: login.php');
    die();
}elseif(isset($_POST["addTitle"]) && isset($_POST["addStatus"]) && isset($_POST["addContent"])){
    // articles(id, status, date, title, content);
    $title=$_POST["addTitle"];
    $time=time();
    $status=$_POST["addStatus"];
    $content=$_POST["addContent"];
    require_once("conf.php");
    $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_query($link, "SET NAMES UTF8");
    mysqli_query($link, "INSERT INTO ".$dbprefix."articles VALUES (NULL,'$id','$status','$time','$title','$content')");
    header('Location: admin.php');
}elseif(isset($_POST["editTitle"]) && isset($_POST["editStatus"]) && isset($_POST["editContent"]) && isset($_POST["editID"])){
    // articles(id, status, date, title, content);
    $title=$_POST["editTitle"];
    $time=time();
    $status=$_POST["editStatus"];
    $content=$_POST["editContent"];
    $id=$_POST["editID"];
    require_once("conf.php");
    $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_query($link, "SET NAMES UTF8");
    mysqli_query($link, "UPDATE ".$dbprefix."articles SET status='$status', date='$time', title='$title', content='$content' WHERE id=$id");
    header('Location: admin.php');
?>
