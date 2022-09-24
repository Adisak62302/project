<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายรับ</title>
    <?php include "./user_menu.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/income.css">
</head>
<?php

$q = "SELECT * FROM category_income ORDER BY Name_category_income ASC";
$r = mysqli_query($conn, $q);

$q1 = "SELECT * FROM income ";
$r1 = mysqli_query($conn, $q1);
$i = 1;
?>

<body>
    <div class="container">
        <h2>บันทึกรายรับ</h2>
        <a type="sumtin" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">เพิ่ม</a><br><br>
        <table class="table">
            <thead>
                <tr class="table-success">
                    <th scope="col">รายการที่</th>
                    <th scope="col">รายการ</th>
                    <th scope="col">จำนวนเงิน</th>
                    <th scope="col">วันที่</th>
                </tr>
            </thead>
            <?php
            while($row = mysqli_fetch_row($r1)){

            ?>
            <tr>
                <th scope="col"><?php echo $i?></th>
                <th scope="col"><?php echo $row[1]?></th>
                <th scope="col"><?php echo $row[2]?></th>
                <th scope="col"><?php echo $row[3]?></th>
            </tr>
            <?php $i++; } ?>
        </table>
        <!-- Modal -->
        <form method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">รายรับ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">วันที่</span>
                                <input type="date" name="id_date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <select requireclass="dropdown-menu dropdown-menu-end" aria-label="Text input with dropdown button" class="form-control"  name="name_income">
                                    <option value="">เลือก</option>
                                    <?php foreach ($r as $row) { ?>
                                        <option value="<?php echo $row["Name_category_income"]; ?>">
                                            <?php echo $row['Name_category_income']; ?>
                                        </option>
                                    <?php } ?>
                                    ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="price" class="form-control" placeholder="จำนวนเงิน" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary" name="seve">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    $username = $_SESSION['username'];
    $data = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $data);
    $userdata = mysqli_fetch_array($result);
    extract($userdata);
    $user_id = $userdata['id_user'];
    if (isset($_POST['seve'])) {
        $id_date = $_POST['id_date'];
        $name_income = $_POST['name_income'];
        $price = $_POST['price'];
        $sqlInsert = "INSERT INTO `income`(`name_income`, `price`, `id_date`)
                                 VALUES ('$name_income','$price','$id_date')";
        if (mysqli_query($conn, $sqlInsert)) {
            echo "<script>window.location='./Income.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดกhnlnรุณาลองอีกครั้ง');</script>";
        }
        //     }
        // }
    }

    ?>
</body>

</html>