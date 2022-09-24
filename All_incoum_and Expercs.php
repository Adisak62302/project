<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกรายรับรายจ่าย</title>
    <?php include "./user_menu.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/home.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>บันทึกรายรับรายจ่าย</h1>
            <h6>ผู้ใช้สามารถเลือกบันทึกรายรับหรือรายจ่ายได้</h6>
        </div>
        <div class="row">
            <div class="col">
                <a href="./All_income.php">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/in.jpg" class="card-img-top" alt="รูป" style="height: 150px;">
                        <div class="card-body">
                            <h4 class="card-title">รายรับ</h4>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="./All_expenses.php">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/ex1.jpg" class="card-img-top" alt="รูป" style="height: 150px;">
                        <div class="card-body">
                            <h4 class="card-title">ร่ายจ่าย</h4>
                            <p class="card-text"> </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>