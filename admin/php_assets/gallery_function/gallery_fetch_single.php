<?php
include "../../connection.php";
include "functions.php";

if(isset($_POST["gallery_id"])){
    $output = array();
    $stmt = $db->prepare("
        SELECT * FROM gallery
        WHERE id = '".$_POST["gallery_id"]."'"
    );
    $stmt->execute();
    $result = $stmt->fetch();
    $output["title"] = $result["title"];
    $output["name"] = $result["name"];

    echo json_encode($output);
}

