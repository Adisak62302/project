<?php include('server.php');
// ต้องlogin เอาใส่ทุกไฟล์ของadmin
if (isset($_SESSION['type_id' != 1])) {
    header('Location: login.php');
}

// tb banner query
$count_n = 1;
$data = "SELECT vegetable. *, veg_type.Name AS type FROM vegetable JOIN veg_type ON (vegetable.Veg_Type_ID = veg_type.Veg_Type_ID)";
$result2 = mysqli_query($conn, $data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit veg</title>

    <?php include "./admin_menu.php" ?>
    <link rel="stylesheet" href="./style/admin_add_veg.css">

</head>
<body>
    



</body>
</html>