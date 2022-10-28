<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    session_destroy();

        echo "<script>";
        echo "Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'ออกจากระบบสำเร็จ',
        showConfirmButton: false,
        timer: 1500
        }).then((result) => {
        if (result) {
            window.location.href = 'login.php'; 
          }
        })";
        echo "</script>";
        ?>

</body>

</html>