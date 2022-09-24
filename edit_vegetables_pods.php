<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veg</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <?php include "./user_menu.php" ?>
    <link rel="stylesheet" href="./style/veg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<?php
if ($_GET) {
    $id_Vegetable = $_GET['id_Vegetable'];
    $all_veg = "SELECT * FROM  vegetable WHERE (id_Vegetable = $id_Vegetable) ";
    $result = mysqli_query($conn, $all_veg);
    $row = mysqli_fetch_array($result);
    extract($row);
}
?>

<body>
    <div class="container">

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="<?php echo $row['img']; ?>" style="width:350px;height:200px" >
                    <div class="card-body">
                        <p class="btn"><?php echo $row['Name']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <h4 class="modal-title">ข้อมูล <?php echo $row['Name']; ?></h4>
                    <label for="name_veg">ชื่อผัก :</label>
                    <input type="text" id="name_veg" name="name_veg" value="<?php echo $row['Name']; ?>">
                    <div class="row">
                        <div class="col">
                            <label for="distance">ระยะห่างระหว่างต้น :</label>
                            <input type="number" id="distance" name="distance" value="<?php echo $row['distance']; ?>">
                            <label for="sow_seeds">ระยะเวลาในการเพาะเมล็ด :</label>
                            <input type="number" id="sow_seeds" name="sow_seeds" value="<?php echo $row['sow_seeds']; ?>">
                            <label for="Planing_period">ระยะเวลาในการปลูก:</label>
                            <input type="number" id="Planing_period" name="Planing_period" value="<?php echo $row['Planing_period']; ?>">
                        </div>
                        <div class="col">
                            <label for="old">ระยะเวลาอายุผัก :</label>
                            <input type="number" id="old" name="old"value="<?php echo $row['old']; ?>">
                            <label for="Fertilize">ระยะเวลาให้ปุ๋ย (น้ำ) :</label>
                            <input type="number" id="Fertilize" name="Fertilize" value="<?php echo $row['Fertilize']; ?>">
                            <label for="soil">ระยะเวลาให้ปุ๋ย (ดิน):</label>
                            <input type="number" id="soil" name="soil" value="<?php echo $row['soil']; ?>">
                        </div>
                    </div>
                    <label for="img" class="form-label">รูปภาพ</label>
                    <input class="form-control" type="file" id="img" name="img"><br>
                    <a type="submit" class="btn btn-outline-danger" name="cancel" href="./All_Vegetables_pods.php">ยกเลิก</a>
                    <button type="submit" class="btn btn-outline-secondary" name="seve">บันทึก</button>
                </form>
            </div>
        </div>

    </div>

    <?php
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
            $sqlupdate = "UPDATE vegetable SET Name='$name_veg', distance='$distance', sow_seeds='$sow_seeds', old='$sow_seeds', Planing_period='$Planing_period', Fertilize='$Planing_period', soil='$soil' WHERE id_Vegetable = '$id_Vegetable' ";
            mysqli_query($conn, $sqlupdate);
            if ($idfiletmp != "") {
                $udimg = "UPDATE vegetable  SET img  ='$idfilepath' WHERE id_Vegetable='$id_Vegetable' ";
                mysqli_query($conn, $udimg);
                move_uploaded_file($idfiletmp, $idfilepath);
                echo "<script>window.location='All_Vegetables_pods.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาดกรุณาลองอีกครั้ง);</script>";
            }
        }
    }
    ?>


</body>

</html>