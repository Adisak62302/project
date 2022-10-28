<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>summary</title>
    <?php include "./user_menu.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./style/summary.css">


</head>
<?php
// ไอดีครอป
$id_Veg_crop = $_GET['id_Veg_crop'];

// ลำดับแปลง
$count_n = 1;

// ข้อมูลแปลง
$qry = mysqli_query($conn, "SELECT `veg_crop_plot`.* ,`veg_crop`.* FROM `veg_crop_plot` JOIN `veg_crop` ON (veg_crop_plot.id_Veg_crop= veg_crop.id_Veg_crop) WHERE (veg_crop_plot.id_Veg_crop = $id_Veg_crop)");

// จำนวนแปลงทั้งหมด
$sumplot = mysqli_query($conn, "SELECT `veg_crop_plot`.* ,COUNT(veg_crop_plot.id_Veg_crop) AS countZ FROM `veg_crop_plot`  WHERE (veg_crop_plot.id_Veg_crop = $id_Veg_crop)");
$rowplot = mysqli_fetch_array($sumplot);
extract($rowplot);

// ข้อมูลครอป
$qrycrop = mysqli_query($conn, "SELECT `veg_crop`.*,`veg_crop`.sow_seeds AS crop_sow_seeds,`veg_crop`.soil AS crop_soil,`veg_crop`.Fertilize AS crop_Fertilize ,`vegetable`.*,`vegetable`.Name AS vegName,`veg_type`.Name AS vegType FROM `veg_crop` JOIN `vegetable` ON (veg_crop.veg= vegetable.id_Vegetable) JOIN `veg_type` ON (veg_crop.Veg_Type_ID = veg_type.Veg_Type_ID) WHERE (veg_crop.id_Veg_crop = $id_Veg_crop)");
$rowcrop = mysqli_fetch_array($qrycrop);
extract($rowcrop);

// qry veg_type
$query = "SELECT * FROM veg_type ORDER BY Name ASC";
$result = mysqli_query($conn, $query);

// qry veg
$q = "SELECT * FROM vegetable";
$r = mysqli_query($conn, $q);


// แก้ไขข้อมูลครอป
if (isset($_POST['save-edit-crop'])) {
    $Veg_Type_ID = $_POST['veg_type'];
    $veg = $_POST['veg'];
    $sow_seeds = date('Y-m-d', strtotime($_POST['sow_seeds']));
    $soil = date('Y-m-d', strtotime($_POST['soil']));
    $Fertilize = date('Y-m-d', strtotime($_POST['Fertilize']));
    $crop_name = $_POST['corp'];

    if (isset($Veg_Type_ID) && isset($veg) && isset($sow_seeds) && isset($soil) && isset($Fertilize) && isset($crop_name)) {
        $updatecrop = mysqli_query($conn, "
        UPDATE
        `veg_crop`
        SET
        `sow_seeds` = '$sow_seeds',
        `soil` = '$soil',
        `Fertilize` = '$Fertilize',
        `crop_name` = '$crop_name',
        `Veg_Type_ID` = '$Veg_Type_ID',
        `veg` = '$veg'
        WHERE (`id_Veg_crop` = '$id_Veg_crop')
        ");

        if ($updatecrop) {
            echo "<script>alert('บันทึกข้อมูลสำเร็จ')</script>";
        } else {
            echo "<script>alert('ผิดพลาดกรุณาลองอีกครั้ง')</script>";
        }
    } else {
        echo "<script>alert('ผิดพลาด ข้อมูลไม่เข้า')</script>";
    }
}

// แก้ไขข้อมูลแปลง
if (isset($_POST['save-edit-plot'])) {
    $wide = $_POST['wide'];
    $long = $_POST['long'];
    $Veg_crop_Plot_id = $_POST['Veg_crop_Plot_id'];

    if (isset($wide) && isset($long) && isset($Veg_crop_Plot_id)) {
        $update_plot = mysqli_query($conn, "
        UPDATE
        `veg_crop_plot`
        SET
        `wide` = '$wide',
        `long` = '$long'
        WHERE
        (`Veg_crop_Plot_id` = '$Veg_crop_Plot_id')
        ");
        if ($update_plot) {
            echo "<script>alert('บันทึกข้อมูลสำเร็จ')</script>";
        } else {
            echo "<script>alert('ผิดพลาดกรุณาลองอีกครั้ง $wide++++$long+++$Veg_crop_Plot_id')</script>";
        }
    } else {
        echo "<script>alert('ผิดพลาด ข้อมูลไม่เข้า')</script>";
    }
}

// ลบแปลง
if (isset($_POST['delete-plot'])) {
    $Veg_crop_Plot_id = $_POST['Veg_crop_Plot_id'];

    if (isset($Veg_crop_Plot_id)) {
        $update_plot = mysqli_query($conn, "
        DELETE FROM `veg_crop_plot`
        WHERE
        (`Veg_crop_Plot_id` = '$Veg_crop_Plot_id')
        ");
        if ($update_plot) {
            echo "<script>alert('ลบแปลงสำเร็จ')</script>";
        } else {
            echo "<script>alert('ผิดพลาดกรุณาลองอีกครั้ง $wide++++$long+++$Veg_crop_Plot_id')</script>";
        }
    } else {
        echo "<script>alert('ผิดพลาด ข้อมูลไม่เข้า')</script>";
    }
}
?>
<script src="./con_veg_plant.js"></script>

<body>

    <div class="titel_icon ">
        <img src="./img/1.jpg" width="100px" height="100px" style="border-radius: 50%;">
        <h5>แก้ไขแผนการปลูกผัก</h5>
    </div>

    <div class="content hstack gap-5">

        <select class="form-select">
            <option selected>ครอปที่หนึ่ง</option>
        </select>

        <a type="sumtin" class="btn btn-outline-primary" href="./veg_plant.php">วางแผนการปลูก</a><br>
    </div>
    <div class="text-end mb-3" style="margin: 0 10%;">
        <a type="button" class="btn btn-outline-success" href="./summary.php?id_Veg_crop=<?php echo $rowcrop['id_Veg_crop']; ?>">ดูข้อมูลครอป</a>
        <a type="button" class="btn btn-outline-danger" href="./veg_plant.php?del_crop=<?php echo $rowcrop['id_Veg_crop']; ?>">ลบครอป</a>
    </div>
    <div class="border rounded mb-3 p-3" style="margin: 0 10%;">
        <form method="POST" enctype="multipart/form-data">
            <h4>แก้ไขข้อมูลครอป</h4>
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="basic-addon1">ชื่อครอป</span>
                <input name="corp" type="text" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $rowcrop['crop_name'] ?>" require>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">จำนวนแปลงทั้งหมด</span>
                <input name="corpall" type="text" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $rowplot['countZ'] ?>" disabled>
            </div>
            <div class="input-group mb-3">
                <!-- เลือกประเภทผัก -->
                <span class="input-group-text" id="basic-addon1">หมวดหมู่ผัก</span>
                <select require aria-label="Text input with dropdown button" class="form-control" name="veg_type" id="veg_type">
                    <option value="<?php echo $rowcrop['Veg_Type_ID'] ?>" selected disabled require><?php echo $rowcrop['vegType'] ?></option>
                    <?php foreach ($result as $row) { ?>
                        <option value="<?= $row['Veg_Type_ID'] ?>"><?= $row['Name'] ?></option>
                    <?php } ?>
                </select><br>
            </div>
            <div class="input-group mb-3">
                <!-- เลือกผัก -->
                <span class="input-group-text" id="basic-addon1">ผัก</span>
                <select name="veg" require aria-label="Text input with dropdown button" class="form-control" id="veg" name="veg">
                    <option value="<?php echo $rowcrop['Veg_Type_ID'] ?>" selected disabled require><?php echo $rowcrop['vegName'] ?></option>
                </select><br>
            </div>
            <div id="day">
                <input name="soilday" id="soilday" value="<?php echo $rowcrop['Fertilize'] ?>" hidden>
                <input name="fertilizeday" id="fertilizeday" value="<?php echo $rowcrop['soil'] ?>" hidden>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">วันที่ลงปลูก </span>
                <input id="sow_seeds_date" type="date" name="sow_seeds" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="<?php echo date('Y-m-d', strtotime($rowcrop['crop_sow_seeds'])) ?>">
            </div>
            <script>
                sow_seeds_date.onchange = evt => {
                    // รับค่าจากวันลงปลูก
                    var sow_seeds_date = new Date(document.getElementById("sow_seeds_date").value);
                    // ประกาศเก็บค่า จำนวนวันใส่ปุ๋ยดิน/น้ำที่ได้จากการเลือกผัก
                    var soilday = document.getElementById("soilday").value;
                    var fertilizeday = document.getElementById("fertilizeday").value;

                    // เซ็ตวันที่จะใส่ปุ่ยดิน/น้ำ
                    var set_soil_date = new Date(sow_seeds_date.setDate(sow_seeds_date.getDate() + parseInt(soilday)));
                    var set_fertilize_date = new Date(sow_seeds_date.setDate(sow_seeds_date.getDate() + parseInt(fertilizeday)));


                    document.getElementById("soil_date").valueAsDate = set_soil_date;
                    document.getElementById("fertilize_date").valueAsDate = set_fertilize_date;

                }
            </script>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">วันที่ให้ปุ๋ย (ดิน)</span>
                <input id="soil_date" type="date" name="soil" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="<?php echo date('Y-m-d', strtotime($rowcrop['crop_soil'])) ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">วันที่ให้ปุ๋ย (น้ำ)</span>
                <input id="fertilize_date" type="date" name="Fertilize" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="<?php echo date('Y-m-d', strtotime($rowcrop['crop_Fertilize'])) ?>">
            </div>
            <div class="text-end">
                <button type="submit" name="save-edit-crop" class="btn btn-outline-primary">บันทึกการแก้ไข</button>
            </div>
        </form>
    </div>
    <div class="planing border rounded p-3 shadow-sm mb-3">
        <h4 class="text-start">แก้ไขข้อมูลแปลง</h4>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">แปลงที่</th>
                    <th scope="col">ขนาดแปลงแนวกว้าง(ซม.)</th>
                    <th scope="col">ขนาดแปลงแนวยาว(ซม.)</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = $qry->fetch_assoc()) : ?>
                    <form method="POST">
                        <tr>
                            <td> <?php echo $count_n ?></td>
                            <td>
                                <input name="wide" type="number" class="form-control" value="<?php echo $row['wide'] ?>">
                            </td>
                            <td>
                                <input name="long" type="number" class="form-control" value="<?php echo $row['long'] ?>">
                            </td>
                            <td class="hstck gap-2">
                                <input name="Veg_crop_Plot_id" type="number" class="form-control" value="<?php echo $row['Veg_crop_Plot_id'] ?>" hidden>
                                <button type="submit" name="save-edit-plot" class="btn btn-outline-primary">บันทึกการแก้ไข</button>
                                <button type="submit" name="delete-plot" class="btn btn-outline-danger">ลบแปลง</button>
                            </td>
                        </tr>
                    </form>
                <?php
                    $count_n++;
                endwhile ?>
            </tbody>
        </table>
    </div>
</body>

</html>