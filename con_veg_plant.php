<?php 
include('server.php');
if(isset($_POST['function']) && $_POST['function'] == 'veg_type'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM vegetable WHERE Veg_Type_ID = '$id' ";
    $result = mysqli_query($conn, $sql);
    echo ' <option selected disabled>ผัก</option> ';
    foreach($result as $row){
        echo ' <option value="'.$row['id_Vegetable'].'">'.$row['Name'].'</option> ';
    }
    exit();
}

?>