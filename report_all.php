<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <?php include "./user_menu.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/report.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>


</head>
<?php
$q1 = "SELECT * FROM income ";
$r1 = mysqli_query($conn, $q1);
$i = 1;
?>

<script>
    // gg chart
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var options = {
            // ขนาด

            width: 700,
            height: 700,
            // อนิเมชั่น
            animation: {
                duration: 1000,
                easing: 'out'
            },
            // สีแบคกราว
            backgroundColor: '',
            chartArea: {
                'left': 15,
                'top': 15,
                'right': 0,
                'bottom': 0
            },
            slices: {
                0: {
                    color: 'Black'
                },
                1: {
                    color: '#C9E4CA'
                },
                2: {
                    color: '#1A4314'
                }
            }
        };
        // ใส่ข้อมููล
        var data = google.visualization.arrayToDataTable([
            ['รายการ', 'จำนวนเงิน'],
            ['ปี2022', 4300],
            ['ปี2021', 1000],
            ['ปี2020', 3000],

        ]);
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
<!-- ปฎิทินปี -->
<script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    })
</script>

<body>
    <div class="container">
        <div class="header">
            <h3>สรุปผลรายรับ</h3><br>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio1"><a href="./report.php">รายเดือน</a></label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio2"><a href="./report_year.php">รายปี</a></label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio3"><a href="./report_all.php">ทั้งหมด</a></label>
            </div>


        </div>

        <div class="selectdate hstack">

            <!-- ว้น -->
            <!-- <input type="date" class="select-date"> -->
            <!-- เดือน -->
            <!-- <select class="form-select" aria-label="Default select example">
            <option selected>เดือน</option>
            <option value="1">มกราคม</option>
            <option value="2">กุมภาพันธ์</option>
            <option value="3">มีนาคม</option>
            <option value="4">เมษายน</option>
            <option value="5">พฤษภาคม</option>
            <option value="6">มิถุนายน</option>
            <option value="7">กรกฎาคม </option>
            <option value="8">สิงหาคม</option>
            <option value="9">กันยายน </option>
            <option value="10">ตุลาคม </option>
            <option value="11">พฤศจิกายน </option>
            <option value="12">ธันวาคม </option>
        </select> -->

            <!-- ปี -->
            <!-- <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="ปี" /> -->

        </div>




        <div class="chartcanvas" id="piechart"></div>

        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">รายการที่</th>
                        <th scope="col">รายการ</th>
                        <th scope="col">รายรับ</th>
                        <th scope="col">ปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">1</th>
                        <th scope="col">รวมรายรับ</th>
                        <th scope="col">4300</th>
                        <th scope="col">2022</th>
                    </tr>
                    <tr>
                        <th scope="col">2</th>
                        <th scope="col">รวมรายรับ</th>
                        <th scope="col">1000</th>
                        <th scope="col">2021</th>
                    </tr>
                    <tr>
                        <th scope="col">3</th>
                        <th scope="col">รวมรายรับ</th>
                        <th scope="col">3000</th>
                        <th scope="col">2020</th>
                    </tr>

                    <!-- <?php
                            while ($row = mysqli_fetch_row($r1)) {

                            ?>
                        <tr>
                            <th scope="col"><?php echo $i ?></th>
                            <th scope="col"><?php echo $row[1] ?></th>
                            <th scope="col"><?php echo $row[2] ?></th>
                            <th scope="col"><?php echo $row[3] ?></th>
                        </tr>
                    <?php $i++;
                            } ?> -->
            </table>

            </tbody>
            </table>
        </div>
    </div>



</body>

</html>