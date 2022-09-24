<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หมวดหมู่รายรับ</title>
    <?php include "./user_menu.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/Income_category.css">
</head>
<?php
$all_income = "SELECT * FROM  category_income ";
$result = mysqli_query($conn, $all_income);
$i =1;
?>

<body>
    <div class="container">
        <h2>หมวดหมู่รายรับ</h2>
        <a type="sumtin" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">เพิ่มหมวดหมู่รายรับ</a><br><br>
        <table class="table">
            <thead>

                <tr>
                    <th scope="col">ที่</th>
                    <th scope="col">ชื่อหมวดหมู่</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) :
                ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row['Name_category_income']; ?></td>
                        <td>
                            <form method="GET">
                                <a type="sumtin" class="btn btn-outline-danger" name="delete" href="delete_income.php ?id_category_income=<?php echo $row['id_category_income']; ?>">ลบ</a>
                                <!-- <a type="sumtin" class="btn btn-outline-secondary" name="edit" data-bs-toggle="modal" data-bs-target="#Modal">แก้ไข</a> -->
                            </form>
                        </td>
                    </tr>
                  <?php $i++; ?>  
                <?php endwhile ?>
            </tbody>
        </table>

        <!-- Modal -->
        <form method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหมู่รายรับ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">ชื่อหมวดหมู่</span>
                                <input type="text" class="form-control" name="Name_category_income" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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

        <!-- Modalแก้ไข -->
        <form method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหมู่รายรับ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">ชื่อหมวดหมู่</span>
                                <input type="text" class="form-control" name="Name_category_income" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="แก้ไขหมวดหมู่">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <a type="submit" class="btn btn-primary" name="seve" href="edit_income.php ?id_category_income=<?php echo $row['id_category_income']; ?>">บันทึก</a>
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
        $Name_category_income = $_POST['Name_category_income'];
        $sqlInsert = "INSERT INTO category_income ( Name_category_income, id_user) VALUES ('$Name_category_income' , '$user_id')";
        if (mysqli_query($conn, $sqlInsert)) {
            echo "<script>window.location='./Income_category.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดกhnlnรุณาลองอีกครั้ง');</script>";
        }
        //     }
        // }
    }
    ?>
</body>

</html>