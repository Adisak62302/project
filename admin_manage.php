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
$count_n = 1;
$data = "SELECT users.*, user_type.type FROM users JOIN user_type ON (users.type_id = user_type.type_id)";
$result2 = mysqli_query($conn, $data);
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

</body>


<script>
  const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

</script>

</html>