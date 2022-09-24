<?php include('server.php');
session_start();
if (isset($_SESSION['type_id' != 1])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/admin-menu.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

    <div class="name_user">@ <?php echo $_SESSION['username'] ?> </div>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="./img/logo.jpg" alt="logo">
                </span>

                <div class="text logo-text">
                    <span class="name">Agricultural Planning</span>
                    <span class="profession">Admin</span>
                </div>
            </div>


        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li>
                        <a href="./admin_index.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">จัดการหน้าหลัก</span>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_manage.php">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">จัดการข้อมูลผู้ใช้</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class='bx bx-notepad icon'></i>
                            <span class="text nav-text">จัดการหน้ารายรับรายจ่าย</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">



                <li>
                    <a href="login.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">ออกจากระบบ</span>
                    </a>

                </li>

            </div>
        </div>

    </nav>


</body>

</html>