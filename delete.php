<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"])){
    header('Location: login.php');
    die();
}elseif(isset($_GET["id"])){
    require_once("conf.php");
    $id=$_GET["id"];
    $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_query($link, "SET NAMES UTF8");
    mysqli_query($link, "DELETE FROM ".$dbprefix."articles WHERE id=$id");
}
header('Location: admin.php');
?>
