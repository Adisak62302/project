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
    <title>Add vegetable</title>
    <?php include "./admin_menu.php" ?>
    <link rel="stylesheet" href="./style/admin_add_veg.css">

</head>

<?php
$query = "SELECT * FROM veg_type ORDER BY Name ASC";
$result = mysqli_query($conn, $query);
$q = "SELECT * FROM vegetable";
$r = mysqli_query($conn, $q);
?>

<body>
    <div class="header">เพิ่มข้อมูลผัก</div>
    <div class="container">
        <div class="row bg-white m-4 p-4 shadow-sm rounded">
            <div class="col-6">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 px-4">
                        <label for="name_veg" class="form-label">ชนิดผัก</label>
                        <select class="form-select " aria-label="Default select example" name="sel" require>
                            <option selected>โปรดเลือก</option>
                            <option value="1" name="1">ผักกินใบ</option>
                            <option value="2" name="2">ผักกินหัว</option>
                            <option value="3" name="3">ผักกินผล</option>
                            <option value="4" name="4">ผักกินฝัก</option>
                        </select>
                    </div>
                    <div class="mb-3 px-4">
                        <label for="name_veg" class="form-label">ชื่อผัก</label>
                        <input type="text" class="form-control " id="name_veg" name="name_veg" required>
                    </div>
                    <div class="mb-3 px-4">
                        <label for="old" class="form-label">ระยะเวลาในการเพาะเมล็ด(วัน)</label>
                        <input type="number" class="form-control " id="old" name="old" placeholder="วัน" required>
                    </div>
                    <div class="mb-3 px-4">
                        <label for="old" class="form-label">อายุผัก(วัน)</label>
                        <input type="number" class="form-control" id="old" name="old" placeholder="วัน" required>
                    </div>
                    <div class="mb-3 px-4">
                        <label for="img" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" id="img" name="img" required>
                    </div>
            </div>
            <div class="col-6">
                <div class="mb-3 px-4">
                    <label for="Fertilize" class="form-label">ระยะเวลาในการให้ปุ๋ย(น้ำ)</label>
                    <input type="number" class="form-control" id="Fertilize" name="Fertilize" placeholder="วัน" required>
                </div>
                <div class="mb-3 px-4">
                    <label for="soil" class="form-label">ระยะเวลาในการให้ปุ๋ย(ดิน)</label>
                    <input type="number" class="form-control" id="soil" name="soil" placeholder="วัน" required>
                </div>
                <div class="mb-3 px-4">
                    <label for="Planing_period" class="form-label">ระยะเวลาในการปลูก(วัน)</label>
                    <input type="number" class="form-control" id="Planing_period" name="Planing_period" placeholder="วัน" required>
                </div>
                <div class="mb-3 px-4">
                    <label for="distance" class="form-label">ระยะห่างระหว่างต้น</label>
                    <input type="number" class="form-control" id="distance" name="distance" placeholder="เซนติเมตร" required>
                </div>
            </div>
            <div class="row">
                <div class="col text-center mt-4">
                    <button type="reset" class="btn btn-secondary px-5 m-1" name="">รีเซ็ต</button>
                    <button type="submit" class="btn btn-success px-5 m-1" name="seve">บันทึก</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <?php
    $username = $_SESSION['username'];
    $data = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $data);
    $userdata = mysqli_fetch_array($result);
    extract($userdata);
    $user_id = $userdata['id_user'];
    if (isset($_POST['seve'])) {
        $name_veg = $_POST['name_veg'];
        $distance = $_POST['distance'];
        $sow_seeds = $_POST['sow_seeds'];
        $old = $_POST['old'];
        $Planing_period = $_POST['Planing_period'];
        $Fertilize = $_POST['Fertilize'];
        $soil = $_POST['soil'];
        $idfiletmp = $_FILES['img']['tmp_name'];
        $idfilename = $_FILES['img']['name'];
        $idfiletype = $_FILES['img']['type'];
        $idfilepath = 'img/' . $idfilename;
        // 
        $sel = $_POST['sel'];
        // 
        if (isset($_POST["name_veg"]) != "" && isset($_POST["distance"]) != "" && isset($_POST["sow_seeds"]) != "" && isset($_POST["old"]) != "" && isset($_POST["Planing_period"]) != "" && isset($_POST["Fertilize"]) != "" && isset($_POST["soil"]) != "" && isset($idfilepath)) {
            move_uploaded_file($idfiletmp, $idfilepath);
            $sqlCheck = "SELECT Name FROM vegetable WHERE Name = '$name_veg' ";
            $rsCheck = mysqli_query($conn, $sqlCheck);
            $rowCheck = mysqli_num_rows($rsCheck);
        }
        if ($rowCheck > 0) {
            echo "<script>alert('มีผักชนิดนี้แล้ว กรุณากรอกใหม่อีกครั้ง');</script>";
        } else {
            $sqlInsert = "INSERT INTO vegetable (Name, distance, sow_seeds, old, Planing_period, Fertilize, soil, img , Veg_Type_ID, id_user) VALUES ('$name_veg', '$distance', '$sow_seeds', '$old', '$Planing_period', '$Fertilize', '$soil', '$idfilepath' , '$sel','$user_id')";
            if (mysqli_query($conn, $sqlInsert)) {
                echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาดกรุณาลองอีกครั้ง');</script>";
            }
        }
    }
    ?>

</body>

</html>