<?php
include "../../connection.php";
include "functions.php";

$query = '';
$output = array();
$query .= "SELECT * FROM `gallery`";

if(isset($_POST["search"]["value"])){
    $query .= 'WHERE title LIKE "%' .$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"])){
    $query .= 'ORDER BY ' .$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}else{
    $query .= 'ORDER BY gallery.id DESC ';
}

if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' .$_POST['start'] . ', ' . $_POST['length'];
}


$stmt = $db->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll();

$data = array();

$filtered_rows = $stmt->rowCount();

foreach($result as $row){

    $sub_array = array();
    $img = "php_assets/gallery_function/image/" . $row["name"];
    $sub_array[] = $row["id"];
    $sub_array[] = $row["title"];
    $sub_array[] =  '<img src="' .$img. '" class="custom_img">';
    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="w-100 h-100 update" style="background: none; border: none; margin: auto; text-align: center;" title="Change" ><i class="fas fa-user-edit"></i></button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="w-100 h-100 delete" style="background: none; border: none; margin: auto; text-align: center;" title="Delete" ><i class="fas fa-trash"></i></button>';

    $data[] = $sub_array;
}

$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_total_all_records($db),
    "data"              => $data
);

echo json_encode($output);