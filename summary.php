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

// จำนวนตำกล้าทั้งหมด
$count_plant = 0;

?>
<script src="./con_veg_plant.js"></script>

<body>

    <div class="titel_icon ">
        <img src="./img/1.jpg" width="100px" height="100px" style="border-radius: 50%;">
        <h5>สรุปวางแผนการปลูกผัก</h5>
    </div>

    <div class="content hstack gap-5">

        <select class="form-select">
            <option selected>ครอปที่หนึ่ง</option>
        </select>

        <a type="sumtin" class="btn btn-outline-primary" href="./veg_plant.php">วางแผนการปลูก</a><br>
    </div>
    <div class="text-end mb-3" style="margin: 0 10%;">
        <a type="sumtin" class="btn btn-outline-warning" href="./edit_veg_plant.php?id_Veg_crop=<?php echo $id_Veg_crop ?>">แก้ไขข้อมูลแผนการปลูก</a>
    </div>
    <div class="border rounded mb-3 p-3" style="margin: 0 10%;">
            <h5>ชื่อครอป : <?php echo $rowcrop['crop_name'] ?></h5>
            <div class="fs-12">จำนวนแปลงทั้งหมด : <?php echo $rowplot['countZ'] ?> แปลง</div>
            <div class="fs-12">ประเภท : <?php echo $rowcrop['vegType'] ?></div>
            <div class="fs-12">ผัก : <?php echo $rowcrop['vegName'] ?></div>
            <div class="fs-12">วันที่ลงปลูก : <?php echo date('d-m-Y', strtotime($rowcrop['crop_sow_seeds'])) ?></div>
            <div class="fs-12">วันที่ให้ปุ๋ย (ดิน) : <?php echo date('d-m-Y', strtotime($rowcrop['crop_soil'])) ?></div>
            <div class="fs-12">วันที่ให้ปุ๋ย (น้ำ) : <?php echo date('d-m-Y', strtotime($rowcrop['crop_Fertilize'])) ?></div>
    </div>
    <div class="planing">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">แปลงที่</th>
                    <th scope="col">ขนาดแปลง(ซม.)</th>
                    <th scope="col">จำนวนต้นกล้า(ในแนวกว้าง/ในแนวยาว)</th>
                    <th scope="col">จำนวน(ต้นกล้า/แปลง)</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = $qry->fetch_assoc()) : ?>
                    <tr>
                        <td> <?php echo $count_n ?></td>
                        <td><?php echo $row['wide'] ?> * <?php echo $row['long'] ?></td>
                        <?php
                        // คำนวนระยะห่างระหว่างต้น
                        $distance = $rowcrop['distance'];
                        $wide = $row['wide'];
                        $long = $row['long'];

                        @$plantonWide = ($wide / $distance) - 1;
                        @$plantonLong = ($long / $distance) - 1;
                        if ($plantonWide > 0) {
                            $plantWide = round($plantonWide, 0, PHP_ROUND_HALF_DOWN);
                        } else {
                            $plantWide = 0;
                        }

                        if ($plantonLong > 0) {
                            $plantLong = round($plantonLong, 0, PHP_ROUND_HALF_DOWN);
                        } else {
                            $plantLong = 0;
                        }

                        $sumplantonPlot = round($plantWide * $plantLong, 0, PHP_ROUND_HALF_DOWN);
                        ?>


                        <td><?php echo $plantWide ?> ต้น / <?php echo $plantLong ?> ต้น</td>
                        <td><?php echo $sumplantonPlot; ?> ต้น</td>
                    </tr>
                <?php
                    $count_n++;
                    $count_plant += $sumplantonPlot;
                endwhile ?>
                <tr>
                    <td>รวมทั้งสิ้น</td>
                    <td></td>
                    <td></td>
                    <td><?php echo $count_plant; ?> ต้น</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>