<?php
include "../../connection.php";
include "functions.php";

if(isset($_POST["id"])){
    $output = array();
    $stmt = $db->prepare("
        SELECT * FROM gallery
        WHERE id = '".$_POST["id"]."'"
    );
    $stmt->execute();
    $result = $stmt->fetch();
    $output["name"] = $result["title"];

    echo json_encode($output);
}

