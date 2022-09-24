<?php include('server.php'); ?>
<?php
if ($_GET) {
    $id_category_income = $_GET['id_category_income'];
    $all_veg = "SELECT * FROM  category_income WHERE (id_category_income = $id_category_income) ";
    $result = mysqli_query($conn, $all_veg);
    $row = mysqli_fetch_array($result);
    extract($row);
}
?>
<?php
if (isset($_POST['seve'])) {
    $Name_category_income = $_POST['Name_category_income'];
    if (isset($_POST["Name_category_income"]) != "") {
        $sqlupdate = "UPDATE vegetable SET Name='$name_veg', distance='$distance', sow_seeds='$sow_seeds', old='$sow_seeds', Planing_period='$Planing_period', Fertilize='$Planing_period', soil='$soil' WHERE id_Vegetable = '$id_Vegetable' ";
        mysqli_query($conn, $sqlupdate);
        if ($idfiletmp != "") {
            $udimg = "UPDATE category_income ( Name_category_income) VALUES ('$Name_category_income')";
            mysqli_query($conn, $udimg);
            echo "<script>window.location='Income_category.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดกรุณาลองอีกครั้ง);</script>";
        }
    }
}
?>
<!-- <?php
    if ($_GET) {
        $id_category_income = $_GET['id_category_income'];

        $sqlDelUsers = "UPDATE FROM category_income WHERE id_category_income = '$id_category_income'";
        if ($rsDelUsers = mysqli_query($conn, $sqlDelUsers)) {
            echo "<script>alert('ลบข้อมูลเสร็จสิ้น');window.location = 'Income_category.php';</script>";
        } else {
            echo "<script>alert ('ผิดพลาด ไม่สามารถลบข้อมูลผักได้');window.location = 'Income_category.php';</script>";
        }
    }
?> -->
