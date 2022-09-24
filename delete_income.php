<?php include('server.php'); ?>
<?php
    if ($_GET) {
        $id_category_income = $_GET['id_category_income'];
        $sqlDelUsers = "DELETE FROM category_income WHERE id_category_income = '$id_category_income'";
        if ($rsDelUsers = mysqli_query($conn, $sqlDelUsers)) {
            echo "<script>alert('ลบข้อมูลเสร็จสิ้น');window.location = 'Income_category.php';</script>";
        } else {
            echo "<script>alert ('ผิดพลาด ไม่สามารถลบข้อมูลผักได้');window.location = 'Income_category.php';</script>";
        }
    }
?>