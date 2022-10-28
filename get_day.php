<?php
include('server.php');

$sql = "SELECT * FROM vegetable WHERE id_Vegetable = {$_GET['id_Vegetable']}";
$query = mysqli_query($conn, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json);

