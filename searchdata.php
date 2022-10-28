<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veg</title>
    <?php include "./admin_menu.php" ?>
    <link rel="stylesheet" href="./style/admin_veg.css">
</head>

<?php include('server.php');
// ต้องlogin เอาใส่ทุกไฟล์ของadmin
if (isset($_SESSION['type_id' != 1])) {
    header('Location: login.php');
}


// tb banner query
$emp_data = $_POST["emp_data"];
$data = "SELECT vegetable. *, veg_type.Name AS type FROM vegetable JOIN veg_type ON (vegetable.Veg_Type_ID = veg_type.Veg_Type_ID) WHERE`vegetable`.`Name` LIKE '%$emp_data%' OR  `veg_type`.`Name` LIKE '%$emp_data%' ";
$result2 = mysqli_query($conn, $data);
$count = mysqli_num_rows($result2);
$count_n = 1;
?>

<body>
    <div class="container">
        <div class="header">
            จัดการข้อมูลผัก
        </div>

        <form action="searchdata.php" method="POST" class="d-flex m-4 p-4" role="search">
            <input class="form-control me-2" type="search" placeholder="กรอกชื่อผัก" aria-label="Search" name="emp_data">
            <button class="btn btn-outline-success" type="submit">ค้นหา</button>
        </form>

        <?php if ($count >0) {?>

            <div class="row bg-white m-4 p-4 shadow-sm rounded">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อผัก</th>
                            <th scope="col">ชนิดผัก</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result2->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><button type="button" class="btn btn-warning">แก้ไข</button></td>
                                <td><button type="button" class="btn btn-danger">ลบ </button></td>
                            </tr>
                        <?php $count_n++;
                        endwhile ?>
                    </tbody>
                </table>
            </div>
    </div>

<?php } else { ?>
    <div class="alert alert-danger">
    <b>ไม่พบข้อมูล</b>
    </div>
<?php  } ?>


</body>

</html>