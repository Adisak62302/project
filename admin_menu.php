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
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <nav>
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name"> Agricultural Planning </span>
        </div>
        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name"> <?php echo $_SESSION['username'] ?> </span>
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="./admin_index.php" class="nav-link">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="link">จัดการหน้าหลัก</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./admin_manage.php" class="nav-link">
                            <i class="bx bxs-user icon"></i>
                            <span class="link">จัดการข้อมูลผู้ใช้</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./admin_add_veg.php" class="nav-link">
                            <i class="bx bxs-message-square-add icon"></i>
                            <span class="link">เพิ่มผัก</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="admin_veg.php" class="nav-link">
                            <i class="bx bxs-report icon"></i>
                            <span class="link">ข้อมูลผัก</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-wallet icon"></i>
                            <span class="link">จัดการหน้ารายรับรายจ่าย</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-pie-chart-alt icon"></i>
                            <span class="link">ข้อมูลการปลูกของผู้ใช้</span>
                        </a>
                    </li>
                </ul>
                <div class="bottom-cotent">
                    <li class="list">
                        <a href="logout.php" class="nav-link" >
                            <i class="bx bx-log-out icon"></i>
                            <span class="link">ออกจากระบบ</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>



    <section class="overlay"></section>
    <script>
        const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

        menuBtns.forEach((menuBtn) => {
            menuBtn.addEventListener("click", () => {
                navBar.classList.toggle("open");
            });
        });

        overlay.addEventListener("click", () => {
            navBar.classList.remove("open");
        });
    </script>




</body>

</html>