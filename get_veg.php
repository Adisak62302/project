<?php
include('server.php');

$sql = "SELECT * FROM vegetable WHERE Veg_Type_ID = {$_GET['veg_type_Id']}";
$query = mysqli_query($conn, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json);

