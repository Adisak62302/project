
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <?php include "./user_menu.php" ?>
</head>

<body>

    <div class="content">
        <img src="./img/user.jpg" width="60px" height="60px"><br>
        <p><?php echo $_SESSION['username']?> <br> </p>
        <div class="btn-content">
        <a type="button" class="btn btn-primary" style="width: 150px;">แก้ไขข้อมูลส่วนตัว</a></br><br>
        <a type="button" class="btn btn-primary" style="width: 150px;"> เปลี่ยนรหัสผ่าน</a></br><br>
        <a type="button" class="btn btn-primary" style="width: 150px;"> เปลี่ยนไอดีไลน์</a></br><br>
        <a type="button" class="btn btn-primary" href="login.php" style="width: 150px;">ออกจากระบบ</a>
    </div>


</body>




</html>