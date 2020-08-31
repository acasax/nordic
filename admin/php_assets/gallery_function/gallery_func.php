<?php

include "../../connection.php";
include "functions.php";
require_once '../class/class.user.php';
$user_class = new USER();
if (isset($_POST["operation"])) {
    if ($_POST["operation"] === "Dodaj") {

        $title = $_POST['txt_title'];

        $db->exec("set names utf8");
        $sql = "SELECT * FROM gallery WHERE title = '$title'";
        $get_title = $db->prepare($sql);
        $get_title->execute();


        $stmt = $db->prepare("
            INSERT INTO `gallery`(`title`) 
            VALUES (:title)
            ");
        $result = $stmt->execute(
            array(
                ':title' => $_POST["txt_title"],
            )
        );
        $user_class->returnJSON("OK", "Uspesno dodali firmu.");
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
