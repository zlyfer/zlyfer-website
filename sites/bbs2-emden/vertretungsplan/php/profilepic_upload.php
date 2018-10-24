<?php
$target_dir = "/var/www/html/de.zlyfer/vertretungsplan/uploads/profile_pictures/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$sql_file = "./uploads/profile_pictures/" . basename($_SESSION['chatid'].".".$imageFileType);
$sql_chatid = $_SESSION['chatid'];
$uploadOk = 1;
$target_file = $target_dir . basename($_SESSION['chatid'].".".$imageFileType);
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
//if (file_exists($target_file)) {
////    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql->query("UPDATE TelegramBot SET profile_pic = '$sql_file' WHERE ChatID = '$sql_chatid'");
    } else {
//        echo "Sorry, there was an error uploading your file.";
    }
}
