<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รวมรายรับ</title>
    <?php include "./user_menu.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/home.css">
</head>

<body>
    <div class="container" style="margin-top: 80px;">
        <h3 style="text-align: center;">รายรับ</h3>
        <div class="row">
            <div class="col">
                <a href="./Income_category.php">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/f4.jpg" class="card-img-top" alt="รูป">
                        <div class="card-body">
                            <h5 class="card-title">หมวดหมู่รายรับ</h5>
                            <p class="card-text">เพิ่ม ลบ แก้ไข หมวดหมู่รายรับ ที่ได้มาจากรายได้จากส่วนต่างๆ เพื่อภาพรวมที่ดีต่อผู้ใช้</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="./Income.php">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/income.jpg" class="card-img-top" alt="รูป">
                        <div class="card-body">
                            <h5 class="card-title">บันทึกรายรับ</h5>
                            <p class="card-text">บันทึกรายรับเพื่อช่วยทำให้เรารู้ถึงข้อบกพร่องทางการเงิน ว่ามีส่วนไหนบ้างที่เราต้องใช้จ่ายเกินกำลังงบ</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="./report.php">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/f2.jpg" class="card-img-top" alt="รูป" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">สรุปผลรายรับ</h5>
                            <p class="card-text">ดูสรุปผลยอดรวมของ รายเดือน หรือรายปี เพื่อเป็นประโยชน์ในการบริหารจัดการเงิน</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>