<?php
require("connection.php");

if(isset($_GET['anm_id'])){

$anm_id = $_GET['anm_id'];

    $sql = "SELECT
    wait.*,
    price.*,
    wait.anm_day*price.p_price AS total
    FROM wait 
    INNER JOIN price ON price.p_id=wait.anm_category
    WHERE anm_id = $anm_id";
     
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
    <title>หน้าป้อนเวลาฝาก-รับ</title>
</head>
<body>
<form action="data3.php" method="post">
<div class="container mt-3">
  <h2>หน้าป้อนเวลาฝาก-รับ</h2>
  <p>//////////////////////////////////</p>
    <input type="hidden" class="form-control" name="anm_name" required value="<?php echo $result['anm_name']?>">

    <input type="hidden" class="form-control" name="anm_category" value="<?php echo $result['anm_category']?>">

    <input type="hidden" class="form-control" name="anm_age" value="<?php echo $result['anm_age']?>">

    <input type="hidden" class="form-control" name="anm_species" value="<?php echo $result['anm_species']?>">

    <input type="hidden" class="form-control" name="anm_special_features" required value="<?php echo $result['anm_special_features']?>">

    <input type="hidden" class="form-control" name="anm_gender" required value="<?php echo $result['anm_gender']?>">

    <input type="hidden" class="form-control" name="anm_color" required value="<?php echo $result['anm_color']?>">

    <input type="hidden" class="form-control" name="anm_favorite_food" required value="<?php echo $result['anm_favorite_food']?>">

    <input type="hidden" class="form-control" name="anm_food_allergy" required value="<?php echo $result['anm_food_allergy']?>">

    <input type="hidden" class="form-control" name="anm_character" required value="<?php echo $result['anm_character']?>">

    <input type="hidden" class="form-control" name="anm_talent" required value="<?php echo $result['anm_talent']?>">

    <input type="hidden" class="form-control" name="anm_congenital_disease" required value="<?php echo $result['anm_congenital_disease']?>">

    <input type="hidden" class="form-control" name="anm_more" required value="<?php echo $result['anm_more']?>">
  
  <div class="input-group mb-3">
    <span class="input-group-text">วันที่ฝาก</span>
    <input type="text" class="form-control" name="anm_deposit_date" required value="<?php echo $result['anm_deposit_date']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">เวลาฝาก</span>
    <input type="text" class="form-control" name="anm_Deposit_time" required value="<?php echo $result['anm_Deposit_time']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">วันที่รับ</span>
    <input type="text" class="form-control" name="anm_pick_up_date" required value="<?php echo $result['anm_pick_up_date']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">เวลารับ</span>
    <input type="text" class="form-control" name="anm_pick_up_time" required value="<?php echo $result['anm_pick_up_time']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">จำนวนวัน</span>
    <input type="text" class="form-control" name="anm_day" required value="<?php echo $result['anm_day']?>">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">จำนวนวัน</span>
    <input type="text" class="form-control" name="anm_total" required value="<?php echo $result['total']?>">
  </div>
  <input type="hidden" name="user_id" value="<?php echo $result['user_id']?>">
  <br>
  <input type="hidden" name="anm_id" value="<?php echo $result['anm_id']?>">
</div>
<br>
<center>
<div class="container mt-3">
<div class="btn-group">
<button type="submit" value="save" name="add" class="btn btn-outline-dark">บันทึก</button>
<button type="submit" class="btn btn-outline-danger"><a href="deposit.php">ย้อนกลับ</button>
</div>
</div>
</center>
<br>
</body>
</html>