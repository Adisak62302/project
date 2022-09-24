<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผักกินใบ</title>
    <link rel="stylesheet" href="./style/All_Vegetables_leafy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include "./user_menu.php" ?>


</head>
<?php
$all_veg = "SELECT * FROM  vegetable WHERE (Veg_Type_ID = '1') ";
$result = mysqli_query($conn, $all_veg);
?>

<body>

    <div class="container mt-3">
        <h3>ผักกินใบ</h3>
        <p>กดปุ่มบวก หากต้องการเพิ่มผักชนิดใหม่</p>
        <div class="row">
            <div class="wrapper col-2">
                <div class="card">
                    <li class="add-box" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        <div class="icon"><i class="uil uil-plus"></i></div>
                        <p>เพิ่มผัก</p>
                </div>
            </div>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="wrapper col-2">
                    <a type="submit" name="cancel" class="btn" href="infor_Vegetables_leafy.php ?id_Vegetable=<?php echo $row['id_Vegetable']; ?>" >
                        <div class="card">
                            <img src="<?php echo $row['img']; ?>" style="width:235px;height:160px">
                            <div class="card-body">
                                <p class="btn"><?php echo $row['Name']; ?></p><br>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile ?>
        </div>
        <!-- เพิ่มผัก -->
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">ผักกินหัว</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <label for="name_veg">ชื่อผัก :</label>
                            <input type="text" id="name_veg" name="name_veg">
                            <div class="row">
                                <div class="col">
                                    <label for="distance">ระยะห่างระหว่างต้น:</label>
                                    <input type="number" id="distance" name="distance" placeholder="เซนติเมตร"><br><br>
                                    <label for="sow_seeds">ระยะเวลาในการเพาะเมล็ด:</label>
                                    <input type="number" id="sow_seeds" name="sow_seeds" placeholder="วัน"><br><br>
                                    <label for="Planing_period">ระยะเวลาในการปลูก:</label>
                                    <input type="number" id="Planing_period" name="Planing_period" placeholder="วัน"><br><br>
                                </div>
                                <div class="col">
                                    <label for="old">ระยะเวลาอายุผัก(วัน) :</label>
                                    <input type="number" id="old" name="old" placeholder="วัน"><br><br>
                                    <label for="Fertilize">ระยะเวลาให้ปุ๋ย (น้ำ):</label>
                                    <input type="number" id="Fertilize" name="Fertilize" placeholder="ครั้ง/สัปดาห์"><br><br>
                                    <label for="soil">ระยะเวลาให้ปุ๋ย (ดิน):</label>
                                    <input type="number" id="soil" name="soil" placeholder="ครั้ง/สัปดาห์"><br><br>
                                </div>
                            </div>
                            <label for="img" class="form-label">รูปภาพ</label>
                            <input class="form-control" type="file" id="img" name="img">
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <div class="col">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" name="cancel">ยกเลิก</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success" name="seve">บันทึก</button>
                            </div>
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
            if (isset($_POST["name_veg"]) != "" && isset($_POST["distance"]) != "" && isset($_POST["sow_seeds"]) != "" && isset($_POST["old"]) != "" && isset($_POST["Planing_period"]) != "" && isset($_POST["Fertilize"]) != "" && isset($_POST["soil"]) != "" && isset($idfilepath)) {
                move_uploaded_file($idfiletmp, $idfilepath);
                $sqlCheck = "SELECT Name FROM vegetable WHERE Name = '$name_veg' ";
                $rsCheck = mysqli_query($conn, $sqlCheck);
                $rowCheck = mysqli_num_rows($rsCheck);
            }
            if ($rowCheck > 0) {
                echo "<script>alert('มีผักชนิดนี้แล้ว กรุณากรอกใหม่อีกครั้ง');</script>";
            } else {
                $sqlInsert = "INSERT INTO vegetable (Name, distance, sow_seeds, old, Planing_period, Fertilize, soil, img , Veg_Type_ID, id_user) VALUES ('$name_veg', '$distance', '$sow_seeds', '$old', '$Planing_period', '$Fertilize', '$soil', '$idfilepath' , '1','$user_id')";
                if (mysqli_query($conn, $sqlInsert)) {
                    echo "<script>window.location='./All_Vegetables_leafy.php';</script>";
                } else {
                    echo "<script>alert('เกิดข้อผิดพลาดกefwefรุณาลองอีกครั้ง');</script>";
                }
            }
        }
        ?>
</body>

</html>