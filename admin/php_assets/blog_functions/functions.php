<?php

function get_total_all_records($db)
{
    $stmt = $db->prepare("
        SELECT * FROM blog
    ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $stmt->rowCount();
}
