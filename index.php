<?php include('server.php');
// ต้องlogin เอาใส่ทุกไฟล์ของuser
if (isset($_SESSION['type_id' != 2])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <?php include "./user_menu.php" ?>
</head>


<?php $sql = "SELECT * FROM edit_admin_index ";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
?>

<body>



    <div class="container">
        <div class="row">
            <h1>รายการผัก</h1>
            <h6>ผู้ใช้สามารถเลือกรายการผักได้ทั้งหมด 4 หมวดหมู่</h6>
        </div>
        <div class="row">
            <div class="col">
                <a href="./All_Vegetables_leafy.php">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['logoleaf'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">ผักกินใบ</h4>
                            <p class="card-text">ผักที่สามารถกินใบเป็นอาหาร มักนำไปต้มหรือผัดกับไฟแรง กินร้อนๆ ใบจะกรอบอร่อย มีวิตามินและแร่ธาตุสูง เป็นที่นิยมอย่างมากในครัวเรือน</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="./All_Vegetables_head.php">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['logohead'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">ผักกินผล</h4>
                            <p class="card-text">ผักที่รับประทานผลเป็นหลัก ผักในกลุ่มนี้จะใช้เวลาปลูกนานกว่าผักกินใบ เพราะมีระยะเวลาหลังปลูกลงแปลงยาวไปจนถึงต้นโตเต็มวัย </p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col">
                <a href="./All_Vegetables.php">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['logofruit'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">ผักกินหัว</h4>
                            <p class="card-text"> ก็คือผักที่มีรากหรือลำต้นเป็นหัวอยู่ใต้ดิน ใช้สะสมอาหารเพื่อการงอกและเจริญเติบโตเป็นต้นใหม่ ซึ่งหัวที่ว่านี้มีทั้งหัวส่วนที่เป็นราก</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="./All_Vegetables_pods.php">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['logopod'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">ผักกินฝัก</h4>
                            <p class="card-text">ผักที่ต้องปลอกฝักก่อนก่อนที่สามารถนำมาทำอาหารได้ ผักกลุ่มนี้เป็นผักที่เป็นล้มลุกใช้เวลาปลูกอยู่ในช่วงระยะเวลา 2-3 เดือน</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

</body>

</html>