<?php include('server.php'); ?>
<?php
    if ($_GET) {
        $id_Vegetable = $_GET['id_Vegetable'];

        $sqlDelUsers = "DELETE FROM vegetable WHERE id_Vegetable = '$id_Vegetable'";
        if ($rsDelUsers = mysqli_query($conn, $sqlDelUsers)) {
            echo "<script>alert('ลบข้อมูลเสร็จสิ้น');window.location = 'All_Vegetables.php';</script>";
        } else {
            echo "<script>alert ('ผิดพลาด ไม่สามารถลบข้อมูลผักได้');window.location = 'edit_vegetables.php';</script>";
        }
    }
?>