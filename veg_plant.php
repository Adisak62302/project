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

$q = "SELECT * FROM vegetable";
$r = mysqli_query($conn, $q);

?>

<body>
    <div class="container">
        <div class="titel" >
            <div class="titel_icon">
                <img src="./img/1.jpg" width="100px" height="100px" style="border-radius: 50%;">
            </div>
            <h5>วางแผนการปลูกผัก</h5>
            <a type="sumtin" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">เพิ่ม</a><br><br>
        </div>


        <form action="#" method="POST" enctype="multipart/form-data">

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

                                    <option value="" require></option>
                                </select><br>
                            </div>
                            <script type="text/javascript">
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
                                    // console.log($(this).val())
                                });
                            </script>

                            <div class="input-group mb-3">
                                <a href="./index.php" type="bonton" class="btn btn-primary">เพิ่มหมวดหมู่ผัก</a>
                            </div>
                            <div class="row">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">วันที่ลงปลูก</span>
                                    <input type="date" name="sow_seeds" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">วันที่ให้ปุ๋ย (ดิน)</span>
                                    <input type="date" name="soil" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">วันที่ให้ปุ๋ย (น้ำ)</span>
                                    <input type="date" name="Fertilize" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require value="">
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
                                    <span class="input-group-text" id="basic-addon1">จำนวนแปลงในครอป</span>
                                    <input name="sum" type="number" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">จำนวนแปลงที่มีขนาดเท่ากัน</span>
                                    <input type="number" name="" id="sum1" value="" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1" require>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">จำนวนแปลงที่มีขนาดต่างกัน</span>
                                    <input type="number" name="" id="sum2" value="" class="form-control" placeholder="แปลง" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-target="#myModal" data-bs-dismiss="modal">ย้อนกลับ</button>
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
                                        widthform.setAttribute("class", "form-control");
                                        widthform.setAttribute("placeholder", "กว้าง (ซม.)");

                                        var heightform = document.createElement("input");
                                        heightform.setAttribute("type", "number");
                                        heightform.setAttribute("id", "form" + i);
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
                                    <input type="number" name="" class="form-control" placeholder="กว้าง (ซม.)" aria-label="Username" aria-describedby="basic-addon1">
                                    <input type="number" name="" class="form-control" placeholder="ยาว (ซม.)" aria-label="Username" aria-describedby="basic-addon1">
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
                                <a type="button" class="btn btn-danger" data-bs-target="#myModa2" data-bs-dismiss="modal">ยกเลิก</a>
                                <a type="submit" class="btn btn-success" name=""  data-bs-toggle="modal" href='./summary.php'>บันทึก</a>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </form>

    </div>
</body>

</html>