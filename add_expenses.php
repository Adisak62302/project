<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/add_expenses.css">
    <title>add expenses</title>
</head>

<body>
    <div class="wrapper">
        <h2>รายจ่าย</h2>
        <form action="#">
            <div class="input-box">
                <input type="date" placeholder="Enter your name" required>
            </div>
            <select class="veg_list" aria-label="Default select example">
                <option selected>เลือดหมวดหมู่</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div class="input-box">
                <input type="text" placeholder="0.00" required>
            </div>
            <div class="input-box button">
                <input type="Submit" value="เพิ่ม" class="add_list">
              
            </div>
        </form>
    </div>
</body>

</html>