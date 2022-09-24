<?php include('server.php'); ?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./style/login.css">
</head>

<body>
    <div class="header">
        <img src="img/logo.jpg" alt="logo"/>
        <h1>Agricultural Planning</h1>
        <h3>Web Applicatiom</h3>
    </div>

    <form class="login" method="POST">
        
        <h1>Login</h1>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="uaername" name="username" placeholder="Username">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <a href="register.php">สมัครสมาชิก </a> 
        <a href="#">ลืมรหัสผ่าน</a>

    </form>
    <?php
    if (isset($_POST['login_user'])) {
        $username = $_POST['username'];
        $password = MD5($_POST['password']);

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $rs = mysqli_query($conn, $sql);
        $fRows = mysqli_fetch_row($rs);
        $numRows = mysqli_num_rows($rs);
        if ($numRows > 0) {
            $_SESSION['id_user'] = $fRows[0];
            $_SESSION['username'] = $username;
            // go to admin page
            if ($fRows[6]==1){
                echo "<script>window.location='admin_index.php';</script>";
            }
            // go to user
            else {
                echo "<script>window.location='index.php';</script>";
            }
        } else {
            echo "<script>alert('บัญชีผู้ใช้งาน หรือ รหัสผ่านของคุณไม่ถูกต้อง กรุณาตรวจสอบครั้ง'),window.location='login.php';</script>";
        }
    }
    ?>
</body>

</html>