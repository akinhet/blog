<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !isset($_SESSION["login"])){
    header('Location: login.php');
    die();
}elseif(isset($_FILES['file'])){
    $currentDirectory = getcwd();
    $uploadDirectory = "/images/";

    $fileExtensionsAllowed = ['jpeg','jpg','png'];

    $fileName = $_FILES['file']['name'];
    echo $fileName;
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $_SESSION["error"] = "test1";

    if(isset($_POST["submit"])){
        $_SESSION["error"] = "test";

        if(!in_array($fileExtension, $fileExtensionsAllowed)){
            $_SESSION["error"] = "Forbidden file extension. Please choose a JPG or PNG file.";

        }elseif($_FILES['file']['size'] > 4000000){
            $_SESSION["error"] = "File is too big. Max file size is 4MB.";

        }else{

            $uploaded = move_uploaded_file($_FILES['file']['tmp_name'], $currentDirectory.$uploadDirectory.basename($_FILES['file']['name']));
            
            if($uploaded){
                header('Location: admin.php');
                die();

            }else{
                $_SESSION["error"] = "An error occurred.";
            }
        }
    }
    header('Location: upload.php');
    //nie dziala :c
}
?>
