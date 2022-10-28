<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการข้อมูลผู้ใช้</title>
  <?php include "./admin_menu.php" ?>
  <link rel="stylesheet" href="./style/admin_manage.css">
</head>

<?php include('server.php');
// ต้องใส่กันlogin เอาใส่ทุกไฟล์ของadmin
if (isset($_SESSION['type_id' != 1])) {
  header('Location: login.php');
}
// tb banner query
$emp_data = $_POST["emp_data"];

$data = "SELECT  users.*, user_type.type FROM users JOIN user_type ON (users.type_id = user_type.type_id) WHERE username LIKE '%$emp_data%' OR `user_type`.`type` LIKE '%$emp_data%' ";

$result2 = mysqli_query($conn, $data);
$count = mysqli_num_rows($result2);
$count_n = 1;
?>

<body>
  <div class="container">
    <div class="header">
      จัดการข้อมูลผู้ใช้
    </div>

    <form action="searchdata_namage.php" method="POST" class="d-flex m-4 p-4" role="search">
      <input class="form-control me-2" type="search" placeholder="กรอกชื่อผู้ใช้" aria-label="Search" name="emp_data">
      <button class="btn btn-outline-success" type="submit">ค้นหา</button>
    </form>

    <?php if ($count >0) {?>

    <div class="row bg-white m-4 p-4 shadow-sm rounded">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">สถานะ</th>
            <th scope="col">ชื่อผู้ใช้</th>
            <th scope="col">อีเมล</th>
            <th scope="col">เบอร์โทร</th>
            <th scope="col">ไอดีไลน์</th>
            <th scope="col">จัดการ</th>
            <th scope="col">การใช้งาน</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result2->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $count_n; ?></td>
              <td><?php echo $row['type']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['Tel']; ?></td>
              <td><?php echo $row['IDline']; ?></td>
              <td> <a href="admin_delete_user.php?id_user=<?php echo $row['id_user']; ?>" onclick="return confirm('คุณต้องการลบแบบเนอร์นี้หรือไม่')" class=" btn btn-danger">ลบ</a></td>
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