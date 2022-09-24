<?php include('server.php');
// ต้องlogin เอาใส่ทุกไฟล์ของadmin
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
    <title>หน้าแรก</title>
    <?php include "./admin_menu.php" ?>
    <link rel="stylesheet" href="./style/admin_index.css">


</head>

<?php $sql = "SELECT * FROM edit_admin_index ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<body>

<div class="container">
        <div class="title">จัดการหน้าหลัก</div>
        <div class="content">
            <form id="edit" method="POST" enctype="multipart/form-data" >
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">รูปรายการผักกินใบ</span>
                        <input type="file" placeholder="Enter your file" name="logoleaf">
                    </div>
                    <div class="input-box">
                        <span class="details">รูปรายการผักกินหัว</span>
                        <input type="file" placeholder="Confirm your file" name="logohead">
                    </div>
                    <div class="input-box">
                        <span class="details">รูปรายการผักกินผล</span>
                        <input type="file" placeholder="Confirm your file" name="logofruit">
                    </div>
                    <div class="input-box">
                        <span class="details">รูปรายการผักกินฝัก</span>
                        <input type="file" placeholder="Confirm your file" name="logopod">
                    </div>
                </div>
               
                <div class="button">
                    <input type="submit" value="บันทึก" name="submit">
                </div>
            </form>
        </div>
    </div>


    <?php
    if (isset($_POST['submit'])) {
        // ภาพ
        $logoleaftmp = $_FILES['logoleaf']['tmp_name'];
        $logoleafname = $_FILES['logoleaf']['name'];
        $logoleaftype = $_FILES['logoleaf']['type'];
        $logoleaf = './img/' . $logoleafname;
        // ภาพผักกินหัว
        $logoheadtmp = $_FILES['logohead']['tmp_name'];
        $logoheadname = $_FILES['logohead']['name'];
        $logoheadtype = $_FILES['logohead']['type'];
        $logohead = './img/' . $logoheadname;
        // ภาพ
        $logofruittmp = $_FILES['logofruit']['tmp_name'];
        $logofruitname = $_FILES['logofruit']['name'];
        $logofruittype = $_FILES['logofruit']['type'];
        $logofruit = './img/' . $logofruitname;
        // ภาพ
        $logopodtmp = $_FILES['logopod']['tmp_name'];
        $logopodname = $_FILES['logopod']['name'];
        $logopodtype = $_FILES['logopod']['type'];
        $logopod = './img/' . $logopodname;

           
            if ($logoleaftmp != "") {
                $udpic2 = "UPDATE edit_admin_index  SET logoleaf ='$logoleaf'";
                mysqli_query($conn, $udpic2);
            }
            if ($logoheadtmp != "") {
                $udpic2 = "UPDATE edit_admin_index  SET logohead ='$logohead'";
                mysqli_query($conn, $udpic2);
            }
            if ($logofruittmp != "") {
                $udpic2 = "UPDATE edit_admin_index  SET logofruit ='$logofruit'";
                mysqli_query($conn, $udpic2);
            }
            if ($logopodtmp != "") {
                $udpic2 = "UPDATE edit_admin_index  SET logopod ='$logopod'";
                mysqli_query($conn, $udpic2);
            }

            move_uploaded_file($logoleaftmp, $logoleaf);
            move_uploaded_file($logoheadtmp, $logohead);
            move_uploaded_file($logofruittmp, $logofruit);
            move_uploaded_file($logopodtmp, $logopod);

            echo "<script>alert('แก้ไขสำเร็จ');</script>";
       
     }


    ?> 

    




</body>

</html>