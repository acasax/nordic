<?php

include "../../connection.php";
include "functions.php";
require_once '../class/class.user.php';
$user_class = new USER();
if (isset($_POST["operation"])) {
    if ($_POST["operation"] === "Dodaj") {

        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt');
        $title = $_POST['txt_title'];
        $img = $_FILES['image']['name'];

        $db->exec("set names utf8");
        $sql = "SELECT * FROM gallery WHERE title = '$title'";
        $get_title = $db->prepare($sql);
        $get_title->execute();

        if(is_array($_FILES)) {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $sourcePath = $_FILES['image']['tmp_name'];
                $targetPath = "image/".$_FILES['image']['name'];
                if (move_uploaded_file($sourcePath, $targetPath)) {
                    $stmt = $db->prepare("
                    INSERT INTO `gallery`(`title`, `name`) 
                    VALUES (:title, :name)
                 ");
                    $result = $stmt->execute(
                        array(
                            ':title' => $_POST["txt_title"],
                            ':name' => $img
                        )
                    );
                    $user_class->returnJSON("OK", "Uspesno dodali firmu.");
                    return;
                }
            }
        }

        } else {
            $user_class->returnJSON("inavalid", "Poruka.");
            return;
        }


    if ($_POST["operation"] === "Promeni") {
        $title = $_POST['txt_title'];

        $sql1 = "SELECT * FROM gallery WHERE title = '$title'";
        $get_title = $db->prepare($sql1);
        $get_title->execute();

        $stmt = $db->prepare("
            UPDATE gallery 
            SET title = :title
            WHERE id = :id
        ");

        $stmt->execute(
            array(
                ':id' => $_POST["id"],
                ':title' => $_POST["txt_title"],
            )
        );
        $user_class->returnJSON("OK", "Uspešno ste izmenili podatke o firmi");
        return;
    }
}
