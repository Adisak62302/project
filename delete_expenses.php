<?php include('server.php'); ?>
<?php
    if ($_GET) {
        $id = $_GET['id'];
        $sql_del = "DELETE FROM `category_expenses` WHERE `id_category_expenses` = $id";
        $rs = mysqli_query($conn,$sql_del);
        if ($rs) {
            echo "<script>alert('ลบข้อมูลเสร็จสิ้น');window.location = 'Expenses_category.php';</script>";
        } else {
            echo "<script>alert ('ผิดพลาด ไม่สามารถลบข้อมูลผักได้');window.location = 'Expense_category.php';</script>";
        }
    }
?>