<?php
require("connection.php");

if(isset($_GET['user_id'])){

$user_id = $_GET['user_id'];

    $sql = "SELECT * FROM user WHERE user_id = $user_id";
     
       $row = mysqli_query($conn,$sql);

       $result = mysqli_fetch_assoc($row);

       if(!$result){

         echo "Error:". $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>หน้าแก้ไขข้อมูลลูกค้า</title>
</head>
<body>
<form action="data.php" method="post">
<div class="container mt-3">
  <h2>หน้าแก้ไขข้อมูลลูกค้า</h2>
  <p>////////////////////////////////////////////</p>
  
  <div class="input-group mb-3">
    <span class="input-group-text">อีเมล</span>
    <input type="text" class="form-control" name="edit_user_email" required value="<?php echo $result['user_email']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">รหัสผ่าน</span>
    <input type="text" class="form-control" name="edit_user_password" value="<?php echo $result['user_password']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">ชื่อ</span>
    <input type="text" class="form-control" name="edit_user_name" value="<?php echo $result['user_name']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">นามสกุล</span>
    <input type="text" class="form-control" name="edit_user_sname" value="<?php echo $result['user_sname']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">วันเกิด</span>
    <input type="text" class="form-control" name="edit_user_birthday" required value="<?php echo $result['user_birthday']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">ที่อยู๋</span>
    <input type="text" class="form-control" name="edit_user_address" required value="<?php echo $result['user_address']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">เบอร์โทร</span>
    <input type="text" class="form-control" name="edit_user_phone" required value="<?php echo $result['user_phone']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">เลขบัตรปชช</span>
    <input type="text" class="form-control" name="edit_user_id_number" required value="<?php echo $result['user_id_number']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">สถานะ</span>
    <input type="text" class="form-control" name="edit_user_type" required value="<?php echo $result['user_type']?>">
  </div>
  <input type="hidden" name="edit_form_user_id" value="<?php echo $result['user_id']?>">
</div>
<br>
<center>
<div class="container mt-3">
<div class="btn-group">
<button type="submit" value="save" class="btn btn-outline-dark">บันทึก</button>
<button type="submit" class="btn btn-outline-danger"><a href="admin_page.php">ย้อนกลับ</button>
</div>
</div>
</center>
<br>
</body>
</html>