<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"])){
    header('Location: login.php');
    die();
}elseif(isset($_FILES['file'])){
    $currentDirectory = getcwd();
    $uploadDirectory = "/images/";

    $error = "";
    
    $fileExtensionsAllowed = ['jpeg','jpg','png'];

    $
    //https://blog.filestack.com/thoughts-and-knowledge/php-file-upload/
}
?>
