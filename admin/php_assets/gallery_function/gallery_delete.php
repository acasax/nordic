<?php
include "../../connection.php";
include "functions.php";
require_once '../class/class.user.php';
$user_class = new USER();
if (isset($_POST["gallery_id"])) {
    $stmt = $db->prepare(
        "DELETE FROM gallery WHERE id = :id"
    );
    $result = $stmt->execute(
        array(
            ':id' => $_POST["gallery_id"]
        )
    );

    if (!empty($result)) {
        $user_class->returnJSON("OK", 'Successfully deleted image.');
        return;
    }
}
