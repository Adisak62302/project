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
    <link rel="stylesheet" href="./style/summary.css">


</head>

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


    <div class="planing">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">แปลงที่</th>
                    <th scope="col">ขนาดแปลง(ซม.)</th>
                    <th scope="col">จำนวนต้นกล้า(ในแนวกว้าง/ในแนวยาว)</th>
                    <th scope="col">จำนวน(ต้นกล้า/แปลง)</th>
                    <th scope="col">จำนวนแปลงทั้งหมด</th>
                    <th scope="col">จำนวนต้นกล้าทั้งหมด</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>1</td>
                    <td>1200 * 200</td>
                    <td>79 ต้น / 12 ต้น</td>
                    <td>948 ต้น</td>
                    <td>10 แปลง</td>
                    <td>9480 ต้น</td>
                </tr>
                <tr>

                    <td>2</td>
                    <td>1200 * 400</td>
                    <td>79 ต้น / 25 ต้น</td>
                    <td>1975 ต้น</td>
                    <td>1 แปลง</td>
                    <td>1975 ต้น</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>1000 * 100</td>
                    <td>65 ต้น / 5 ต้น</td>
                    <td>325 ต้น</td>
                    <td>1 แปลง</td>
                    <td>325 ต้น</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>1500 * 80</td>
                    <td>99 ต้น / 4 ต้น</td>
                    <td>396 ต้น</td>
                    <td>1 แปลง</td>
                    <td>396 ต้น</td>
                </tr>
                <tr>
                    <td>#</td>
                    <td>รวม</td>
                    <td></td>
                    <td></td>
                    <td>13 แปลง</td>
                    <td>12176 ต้น</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>