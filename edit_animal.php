<?php
require("connection.php");

if(isset($_GET['anm_id'])){

$anm_id = $_GET['anm_id'];

    $sql = "SELECT * FROM animal WHERE anm_id = $anm_id";
     
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
    <title>หน้าแก้ไขข้อมูลสัตว์เลี้ยง</title>
</head>
<body>
<form action="data_animal.php" method="post">
<div class="container mt-3">
  <h2>หน้าแก้ไขข้อมูลสัตว์เลี้ยง</h2>
  <p>/////////////////////////////////////////////////////</p>
  
  <div class="input-group mb-3">
    <span class="input-group-text">ชื่อ</span>
    <input type="text" class="form-control" name="edit_anm_name" required value="<?php echo $result['anm_name']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">ประเภท</span>
    <input type="text" class="form-control" name="edit_anm_category" value="<?php echo $result['anm_category']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">อายุ</span>
    <input type="text" class="form-control" name="edit_anm_age" value="<?php echo $result['anm_age']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">สายพันธุ์</span>
    <input type="text" class="form-control" name="edit_anm_species" value="<?php echo $result['anm_species']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">ลักษณะพิเศษ</span>
    <input type="text" class="form-control" name="edit_anm_special_features" required value="<?php echo $result['anm_special_features']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">เพศ</span>
    <input type="text" class="form-control" name="edit_anm_gender" required value="<?php echo $result['anm_gender']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">สีลำตัว</span>
    <input type="text" class="form-control" name="edit_anm_color" required value="<?php echo $result['anm_color']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">อาหารที่ชอบ</span>
    <input type="text" class="form-control" name="edit_anm_favorite_food" required value="<?php echo $result['anm_favorite_food']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">อาหารที่แพ้</span>
    <input type="text" class="form-control" name="edit_anm_food_allergy" required value="<?php echo $result['anm_food_allergy']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">นิสัยสัตว์เลี้ยง</span>
    <input type="text" class="form-control" name="edit_anm_character" required value="<?php echo $result['anm_character']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">ความสามารถพิเศษ</span>
    <input type="text" class="form-control" name="edit_anm_talent" required value="<?php echo $result['anm_talent']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">โรคประจำตัว</span>
    <input type="text" class="form-control" name="edit_anm_congenital_disease" required value="<?php echo $result['anm_congenital_disease']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">ข้อมูลเพิ่มเติม</span>
    <input type="text" class="form-control" name="edit_anm_more" required value="<?php echo $result['anm_more']?>">
  </div>
  <input type="hidden" name="edit_form_anm_id" value="<?php echo $result['anm_id']?>">
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