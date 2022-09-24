<?php include('server.php');
session_start();
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/reset_pass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>


<nav>

    <div class="content">

        <div class="header">
            รีเซตรหัสผ่านของคุณ
        </div>

        <div class="text_content">
            กรุณากรอกอีเมลเพื่อรับรหัส
            ผ่านรีเซตรหัสผ่านใหม่
        </div>

        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="กรอกอีเมล">
        <div class="submit">
            <button type="button" class="btn btn-secondary">ยกเลิก</button>
            <button type="button" class="btn btn-primary">ดำเนินการต่อ</button>


        </div>
    </div>

</body>




</html>