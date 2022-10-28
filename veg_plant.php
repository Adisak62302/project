<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>วางแผนการปลูกผัก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/veg_planting.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <?php include "./user_menu.php" ?>
</head>
<?php
$query = "SELECT * FROM veg_type ORDER BY Name ASC";
$result = mysqli_query($conn, $query);

$username = $_SESSION['username'];
$datauser = "SELECT * FROM users WHERE username = '$username'";
$resultuser = mysqli_query($conn, $datauser);
$userdata = mysqli_fetch_array($resultuser);
extract($userdata);
$user_id = $userdata['id_user'];

$q = "SELECT * FROM vegetable";
$r = mysqli_query($conn, $q);

// ข้อมูลครอป
$qrycrop = mysqli_query($conn, "SELECT `veg_crop`.* ,`vegetable`.Name AS vegName,`veg_type`.Name AS vegType FROM `veg_crop` JOIN `vegetable` ON (veg_crop.veg= vegetable.id_Vegetable) JOIN `veg_type` ON (veg_crop.Veg_Type_ID = veg_type.Veg_Type_ID) WHERE (veg_crop.id_user = $user_id)");

// บันทึกฟอร์มวางแผนการปลูก
if (isset($_POST['save-plan'])) {
    $Veg_Type_ID = $_POST['veg_type'];
    $veg = $_POST['veg'];
    $sow_seeds = date('Y-m-d', strtotime($_POST['sow_seeds']));
    $soil = date('Y-m-d', strtotime($_POST['soil']));
    $Fertilize = date('Y-m-d', strtotime($_POST['Fertilize']));
    $crop_name = $_POST['corp'];
    $same_crop = $_POST['same_crop'];
    $diff_crop = $_POST['diff_crop'];

    // เช็คข้อมูล
    if (isset($Veg_Type_ID) && isset($veg) && isset($sow_seeds) && isset($soil) && isset($Fertilize) && isset($crop_name) && isset($same_crop) && isset($diff_crop)) {
        $InsertCrop = mysqli_query($conn, "INSERT INTO `veg_crop`(`sow_seeds`, `soil`, `Fertilize`, `crop_name`,`Veg_Type_ID`, `veg`, `id_user`) 
        VALUES ('$sow_seeds', '$soil', '$Fertilize','$crop_name','$Veg_Type_ID', '$veg', '$user_id')");


        // เช็คว่าเพิ่มครอปได้มั้ย
        if ($InsertCrop) {

            // เอาไอดีของครอปล่าสุดที่เพิ่มมาเก็บไว้ สำหรับเป็น FK
            $id_Veg_crop =  mysqli_insert_id($conn);

            // เช็คว่ามีแปลงที่เหมือนกันไหม
            if ($same_crop > 0) {
                // loop บันทึกข้อมูล โดยกำหนดให้เริ่ม $i = 0;  จบลูปถ้า $i < $same_crop; เพิ่ม step ละ 1   $i++
                for ($i = 0; $i < $same_crop; $i++) {
                    $wide = $_POST['wide'];
                    $long = $_POST['long'];
                    if (isset($wide) && isset($long)) {
                        $InsertSameCrop = mysqli_query($conn, "INSERT INTO `veg_crop_plot`(`wide`, `long`, `id_Veg_crop`) 
                        VALUES ($wide,$long, $id_Veg_crop)");
                    } else {
                        echo "<script>alert('ผิดพลาดกรุณาลองอีกครั้ง ไม่พบข้อมูลความกว้าง + ยาว')</script>";
                    }
                }
            }

            // เช็คว่ามีแปลงที่ต่างกันไหม
            if ($diff_crop > 0) {
                // loop บันทึกข้อมูล โดยกำหนดให้เริ่ม $i = 0;  จบลูปถ้า $i < $diff_crop; เพิ่ม step ละ 1   $i++
                for ($i = 0; $i < $diff_crop; $i++) {
                    $wideI = "wide$i";
                    $longI = "long$i";
                    $wide = $_POST[$wideI];
                    $long = $_POST[$longI];
                    if (isset($wide) && isset($long)) {
                        $InsertDiffCrop = mysqli_query($conn, "INSERT INTO `veg_crop_plot`(`wide`, `long`, `id_Veg_crop`) 
                        VALUES ($wide,$long, $id_Veg_crop)");
                    } else {
                        echo "<script>alert('ผิดพลาดกรุณาลองอีกครั้ง ไม่พบข้อมูลความกว้าง + ยาว')</script>";
                    }
                }
            }

            if ($InsertSameCrop) {
                echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location = './summary.php?id_Veg_crop=$id_Veg_crop';</script>";
            } else {
                echo "<script>alert('ผิดพลาดกรุณาลองอีกครั้ง')</script>";
            }
        }
    } else {
        echo "<script>alert('ผิดพลาดกรุณาลองอีกครั้ง ข้อมูลไม่เข้า')</script>";
    }
}

// ลบครอป
if (isset($_GET['del_crop'])) {
    $id_Veg_crop = $_GET['del_crop'];
    $del = mysqli_query($conn, "DELETE FROM `veg_crop` WHERE (id_Veg_crop = '$id_Veg_crop')");
    if ($del) {
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
    }
}
?>
<script src="con_veg_plant.js"></script>

<body>
    <div class="container">
        <div class="titel">
            <div class="titel_icon">
                <img src="./img/1.jpg" width="100px" height="100px" style="border-radius: 50%;">
            </div>
            <h5>วางแผนการปลูกผัก</h5>
            <a type="sumtin" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">เพิ่ม</a><br><br>
        </div>


        <form method="POST" enctype="multipart/form-data">

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <!-- <form action="#" method="POST" enctype="multipart/form-data"> -->
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">เพิ่มแผนการปลูกผัก</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <!-- เลือกประเภทผัก -->
                                <span class="input-group-text" id="basic-addon1">หมวดหมู่ผัก</span>
                                <select require aria-label="Text input with dropdown button" class="form-control" name="veg_type" id="veg_type">
                                    <option value="" selected disabled require>เลือก</option>
                                    <?php foreach ($result as $row) { ?>
                                        <option value="<?= $row['Veg_Type_ID'] ?>"><?= $row['Name'] ?></option>
                                    <?php } ?>
                                </select><br>
                            </div>

                            <div class="input-group mb-3">
                                <!-- เลือกผัก -->
                                <span class="input-group-text" id="basic-addon1">ผัก</span>
                                <select name="veg" require aria-label="Text input with dropdown button" class="form-control" id="veg" name="veg">
                                    <option value="" selected disabled require>เลือก</option>
                                </select><br>
                            </div>

                            <!-- <script type="text/javascript">
                                $('#veg_type').change(function() {
                                    var id_type = $(this).val();
                                    $.ajax({
                                        type: "post",
                                        url: "con_veg_plant.php",
                                        data: {
                                            id: id_type,
                                            function: 'veg_type'
                                        },
                                        success: function(data) {
                                            $('#veg').html(data);
                                        }
                                    });
                                });
                            </script> -->

                            <div class="input-group mb-3">
                                <a href="./index.php" type="bonton" class="btn btn-primary">เพิ่มหมวดหมู่ผัก</a>
                            </div>
                            <div id="day">
                            </div>

                            <div class="row">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">วันที่ลงปลูก</span>
                                    <input id="sow_seeds_date" type="date" name="sow_seeds" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="">
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
                                    <input id="soil_date" type="date" name="soil" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">วันที่ให้ปุ๋ย (น้ำ)</span>
                                    <input id="fertilize_date" type="date" name="Fertilize" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-primary" name="seve" data-bs-target="#myModa2" data-bs-toggle="modal">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>


            <div class="modal" id="myModa2">
                <div class="modal-dialog">
                    <!-- <form action="#" method="POST" enctype="multipart/form-data"> -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มแผนการปลูกผัก</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">ครอป</span>
                                    <input name="corp" type="text" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">จำนวนแปลงที่มีขนาดเท่ากัน</span>
                                    <input type="number" name="same_crop" id="sum1" value="" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">จำนวนแปลงที่มีขนาดต่างกัน</span>
                                    <input type="number" name="diff_crop" id="sum2" value="" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-target="#myModal" data-bs-toggle="modal">ย้อนกลับ</button>
                                <button type="button" class="btn btn-primary" name="next2" data-bs-target="#myModa3" data-bs-toggle="modal" onclick="myFunction()">ถัดไป</button>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
            <div class="modal" id="myModa3">
                <div class="modal-dialog">
                    <!-- <form action="#" method="POST" enctype="multipart/form-data"> -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มแผนการปลูกผัก</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <script>
                                function myFunction() {
                                    // var i = "แปลง";
                                    var x = document.getElementById("sum1").value;
                                    document.getElementById("demo").value = x;
                                    var y = document.getElementById("sum2").value;
                                    document.getElementById("demo2").value = y;

                                    var inputform = document.getElementById("diffcrop");


                                    for (var i = 0; i < y; i++) {
                                        var widthform = document.createElement("input");
                                        widthform.setAttribute("type", "number");
                                        widthform.setAttribute("id", "form" + i);
                                        widthform.setAttribute("name", "wide" + i);
                                        widthform.setAttribute("class", "form-control");
                                        widthform.setAttribute("placeholder", "กว้าง (ซม.)");

                                        var heightform = document.createElement("input");
                                        heightform.setAttribute("type", "number");
                                        heightform.setAttribute("id", "form" + i);
                                        heightform.setAttribute("name", "long" + i);
                                        heightform.setAttribute("class", "form-control");
                                        heightform.setAttribute("placeholder", "ยาว (ซม.)");

                                        var DivForInput = document.createElement("div");
                                        DivForInput.setAttribute("class", "input-group mb-3 ");
                                        DivForInput.appendChild(widthform);
                                        DivForInput.appendChild(heightform);
                                        inputform.appendChild(DivForInput);
                                    }
                                }
                            </script>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">จำนวนแปลงที่มีขนาดเท่ากัน</span>
                                    <input id="demo" class="input-group-text" id="basic-addon1">

                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" name="wide" class="form-control" placeholder="กว้าง (ซม.)" aria-label="Username" aria-describedby="basic-addon1">
                                    <input type="number" name="long" class="form-control" placeholder="ยาว (ซม.)" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <br>
                                <br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">จำนวนแปลงที่มีขนาดต่างกัน</span>
                                    <input id="demo2" class="input-group-text" id="basic-addon1">
                                    <?php  ?>
                                </div>
                                <br>
                                <div id="diffcrop">

                                </div>
                                <!-- <div class="input-group mb-3">
                                    <input type="number" name="" class="form-control" placeholder="กว้าง (ซม.)" aria-label="Username" aria-describedby="basic-addon1">
                                    <input type="number" name="" class="form-control" placeholder="ยาว (ซม.)" aria-label="Username" aria-describedby="basic-addon1">
                                </div> -->
                            </div>

                            <div class="modal-footer">
                                <a type="button" class="btn btn-danger" data-bs-target="#myModa2" data-bs-toggle="modal">ย้อนกลับ</a>
                                <button type="submit" class="btn btn-success" name="save-plan">บันทึก</button>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </form>
        <div class="row">
            <?php while ($rowcrop = $qrycrop->fetch_assoc()) : ?>
                <div class="col-3 p-1">
                    <div class="border rounded shadow-sm bg-white p-3">
                        <h5>ชื่อครอป : <?php echo $rowcrop['crop_name'] ?></h5>
                        <div class="fs-12">จำนวนแปลงทั้งหมด :
                            <?php
                            $id = $rowcrop['id_Veg_crop'];
                            $sumplot = mysqli_query($conn, "SELECT `veg_crop_plot`.* ,COUNT(veg_crop_plot.id_Veg_crop) AS countZ FROM `veg_crop_plot`  WHERE (veg_crop_plot.id_Veg_crop =$id )");
                            $rowplot = mysqli_fetch_array($sumplot);
                            extract($rowplot);
                            echo $rowplot['countZ'];
                            ?>
                            แปลง</div>
                        <div class="fs-12">ประเภท : <?php echo $rowcrop['vegType'] ?></div>
                        <div class="fs-12">ผัก : <?php echo $rowcrop['vegName'] ?></div>
                        <div class="fs-12">วันที่ลงปลูก : <?php echo date('d-m-Y', strtotime($rowcrop['sow_seeds'])) ?></div>
                        <div class="fs-12">วันที่ให้ปุ๋ย (ดิน) : <?php echo date('d-m-Y', strtotime($rowcrop['soil'])) ?></div>
                        <div class="fs-12">วันที่ให้ปุ๋ย (น้ำ) : <?php echo date('d-m-Y', strtotime($rowcrop['Fertilize'])) ?></div>
                        <a type="button" class="btn btn-outline-success" href="./summary.php?id_Veg_crop=<?php echo $rowcrop['id_Veg_crop']; ?>">ดูข้อมูลครอป</a>
                        <a type="button" class="btn btn-outline-danger" href="./veg_plant.php?del_crop=<?php echo $rowcrop['id_Veg_crop']; ?>">ลบครอป</a>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</body>

</html>