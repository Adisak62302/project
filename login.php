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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <div class="header">
        <h1>Agricultural Planning</h1>
        <h3>Web Applicatiom</h3>
    </div>

    <div class="container ">

        <div class="header_copy">
            <h1>Agricultural Planning</h1>
            <h3>Web Applicatiom</h3>
        </div>

        <div class="forms">

            <div class="form login">
                <span class="title">เข้าสู่ระบบ</span>

                <form class="login" method="POST">
                    <div class="input-field">
                        <input type="username" name="username" placeholder="ชื่อผู้ใช้" required>
                        <i class="uil uil-user icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="รหัสผ่าน" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">จดจำฉัน</label>
                        </div>
                        <a href="#" class="text">ลืมรหัสผ่าน ?</a>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="login_user" value="เข้าสู่ระบบ">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">คุณยังไม่เป็นสมาชิก ?
                        <a href="#" class="text signup-link">สมัครสมาชิก</a>
                    </span>
                </div>
            </div>
            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">สมัครสมาชิก</span>

                <form class="register" method="POST">
                    <div class="input-field">
                        <input type="text" name="username" placeholder="กรอกชื่อผู้ใช้" required>
                        <i class="uil uil-user icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="กรอกอีเมล" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="กรอกรหัสผ่าน" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="Tel" placeholder="กรอกเบอร์โทรศัพท์" required>
                        <i class="uil uil-phone icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="IDline" placeholder="กรอกไอดีไลน์" required>
                        <i class="uil uil-line icon"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="reg_user" value="สมัครสมาชิก">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">เป็นสมาชิกอยู่แล้ว ?
                        <a href="#" class="text login-link">เข้าสู่ระบบ</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <?php
    // login
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
            if ($fRows[6] == 1) {
                echo "<script>";
                echo "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'เข้าสู่ระบบสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                    if (result) {
                        window.location.href = 'admin_index.php'; 
                      }
                    })";
                echo "</script>";
            }
            // go to user
            else {
                echo "<script>";
                echo "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'เข้าสู่ระบบสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                    if (result) {
                        window.location.href = 'index.php'; 
                      }
                    })";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบครั้ง',
                showConfirmButton: false,
                timer: 1500
                }).then((result) => {
                if (result) {
                    window.location.href = 'login.php'; 
                  }
                })";
            echo "</script>";
        }
    }


    // register
    if (isset($_POST['reg_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $Tel = $_POST['Tel'];
        $IDline = $_POST['IDline'];

        if (isset($_POST["username"]) != "" && isset($_POST["email"]) != "" && isset($_POST["password"]) != "" && isset($_POST["Tel"]) != "" && isset($_POST["IDline"]) != "") {
            $sqlCheck = "SELECT username FROM users WHERE username='$username' ";
            $rsCheck = mysqli_query($conn, $sqlCheck);
            $rowCheck = mysqli_num_rows($rsCheck);
            if ($rowCheck > 0) {
                echo "<script>alert('ชื่อผู้ใข้ซำ กรุณาเปลี่ยนชื่อผู้ใช้');</script>";
            } else {
                $sqlInsert = "INSERT INTO users (username, email, password, Tel, IDline, type_id) VALUES ('$username', '$email', '$password', '$Tel', '$IDline','2')";
                if (mysqli_query($conn, $sqlInsert)) {
                    echo "<script>window.location='login.php';</script>";
                } else {
                    echo "<script>alert('เกิดข้อผิดพลาดกรุณาลองอีกครั้ง');</script>";
                }
            }
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดกรุณาลองอีกครั้ง');</script>";
        }
    }


    ?>


</body>



<script>
    const container = document.querySelector(".container"),
        pwShowHide = document.querySelectorAll(".showHidePw"),
        pwFields = document.querySelectorAll(".password"),
        signUp = document.querySelector(".signup-link"),
        login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon => {
        eyeIcon.addEventListener("click", () => {
            pwFields.forEach(pwField => {
                if (pwField.type === "password") {
                    pwField.type = "text";

                    pwShowHide.forEach(icon => {
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                } else {
                    pwField.type = "password";

                    pwShowHide.forEach(icon => {
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            })
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", () => {
        container.classList.add("active");
    });
    login.addEventListener("click", () => {
        container.classList.remove("active");
    });
</script>

</html>