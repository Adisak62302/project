<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="./style/register.css">
</head>
<body>

    <div class="header">
        <img src="img/logo.jpg" alt="logo"/>
        <h1>Agricultural Planning</h1>
        <h3>Web Applicatiom</h3>
    </div>

    
    <form class="register" method="POST">
        <h1>Register</h1>
        <div class="input-group">
            <label for="username">Uaername</label>
            <input type="usaername" name="username" placeholder="Username">
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="email">
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="input-group">
            <label for="Tel">Tel</label>
            <input type="number" name="Tel" placeholder="Tel">
        </div>
        <div class="input-group">
            <label for="IDline">IDline</label>
            <input type="text" name="IDline" placeholder="IDline">
        </div>


        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">สมัครสมาชิก</button>
        </div>
        <p>คุณเป็นสมาชิกอยู่แล้วใช่ไหม ?<a href="login.php">  เข้าสู่ระบบ</a></p>
        

    </form>
    <?php 
        if (isset($_POST['reg_user'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $Tel = $_POST['Tel'];
            $IDline = $_POST['IDline'];

            if(isset($_POST["username"])!=""&&isset($_POST["email"])!=""&&isset($_POST["password"])!=""&&isset($_POST["Tel"])!=""&&isset($_POST["IDline"])!=""){
                $sqlCheck = "SELECT username FROM users WHERE username='$username' ";
                $rsCheck = mysqli_query($conn, $sqlCheck);
                $rowCheck = mysqli_num_rows($rsCheck);
                if($rowCheck > 0){
                    echo "<script>alert('ชื่อผู้ใข้ซำ กรุณาเปลี่ยนชื่อผู้ใช้');</script>";
                }else{
                    $sqlInsert = "INSERT INTO users (username, email, password, Tel, IDline, type_id) VALUES ('$username', '$email', '$password', '$Tel', '$IDline','2')";
                    if(mysqli_query($conn, $sqlInsert)){
                        echo "<script>window.location='login.php';</script>";

                    }else{
                        echo "<script>alert('เกิดข้อผิดพลาดกรุณาลองอีกครั้ง');</script>";

                    }
                }
            }else{
                echo "<script>alert('เกิดข้อผิดพลาดกรุณาลองอีกครั้ง');</script>";
            }


        }    
    ?>

</body>
</html>