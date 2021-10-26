<?php
    require("connection.php");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>หน้ารายงานข้อมูล</title>
</head>
<body>
<div class="container mt-3">
  <h2>รายงานข้อมูลเกี่ยวกับระบบ</h2>
  <p>/////////////////////////////////////////////////////////</p>            
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col"><center> จำนวนการฝากในระบบทั้งหมด </center></th>
      </tr>
    </thead>
    <tbody>
            <?php
              //ดึงข้อมูลมา
              $sql ="SELECT 
              COUNT(anm_id) AS report_animal_deposit
              FROM animal_deposit;
              ";
              //ดึงข้อมูลมาใส่แยกกัน
              $result = mysqli_query($conn,$sql);
              $i =1;
              if(mysqli_num_rows($result) > 0){
              //บรรทัดนี้สำคัญ 
              while($row = mysqli_fetch_assoc($result)){
              echo"<tr>";
                echo"<td>".$row['report_animal_deposit']."</td>";
              echo"</tr>";
              $i++;
              }
              }else{
              echo "ข้อมูลยังไม่มี";
              }
            ?>
    </tbody>

    <thead>
      <tr>
        <th scope="col"><center> จำนวนสมาชิกในระบบทั้งหมด </center></th>
      </tr>
    </thead>
    <tbody>
            <?php
              //ดึงข้อมูลมา
              $sql ="SELECT 
              COUNT(user_id) AS report_user
              FROM user;
              ";
              //ดึงข้อมูลมาใส่แยกกัน
              $result = mysqli_query($conn,$sql);
              $i =1;
              if(mysqli_num_rows($result) > 0){
              //บรรทัดนี้สำคัญ 
              while($row = mysqli_fetch_assoc($result)){
              echo"<tr>";
                echo"<td>".$row['report_user']."</td>";
              echo"</tr>";
              $i++;
              }
              }else{
              echo "ข้อมูลยังไม่มี";
              }
            ?>
    </tbody>

    <thead>
      <tr>
        <th scope="col"><center> จำนวนสัตว์เลี้ยงที่ลงทะเบียนทั้งหมด </center></th>
      </tr>
    </thead>
    <tbody>
            <?php
              //ดึงข้อมูลมา
              $sql ="SELECT 
              COUNT(user_id) AS report_animal
              FROM animal;
              ";
              //ดึงข้อมูลมาใส่แยกกัน
              $result = mysqli_query($conn,$sql);
              $i =1;
              if(mysqli_num_rows($result) > 0){
              //บรรทัดนี้สำคัญ 
              while($row = mysqli_fetch_assoc($result)){
              echo"<tr>";
                echo"<td>".$row['report_animal']."</td>";
              echo"</tr>";
              $i++;
              }
              }else{
              echo "ข้อมูลยังไม่มี";
              }
            ?>
    </tbody>

    <thead>
      <tr>
        <th scope="col"><center> จำนวนสัตว์เลี้ยงที่รอการฝาก </center></th>
      </tr>
    </thead>
    <tbody>
            <?php
              //ดึงข้อมูลมา
              $sql ="SELECT 
              COUNT(user_id) AS report_wait
              FROM wait;
              ";
              //ดึงข้อมูลมาใส่แยกกัน
              $result = mysqli_query($conn,$sql);
              $i =1;
              if(mysqli_num_rows($result) > 0){
              //บรรทัดนี้สำคัญ 
              while($row = mysqli_fetch_assoc($result)){
              echo"<tr>";
                echo"<td>".$row['report_wait']."</td>";
              echo"</tr>";
              $i++;
              }
              }else{
              echo "ข้อมูลยังไม่มี";
              }
            ?>
    </tbody>

    <thead>
      <tr>
        <th scope="col"><center> จำนวนเงินทั้งหมด </center></th>
      </tr>
    </thead>
    <tbody>
            <?php
              //ดึงข้อมูลมา
              $sql ="SELECT 
              SUM(anm_total) AS report_wait
              FROM animal_deposit;
              ";
              //ดึงข้อมูลมาใส่แยกกัน
              $result = mysqli_query($conn,$sql);
              $i =1;
              if(mysqli_num_rows($result) > 0){
              //บรรทัดนี้สำคัญ 
              while($row = mysqli_fetch_assoc($result)){
              echo"<tr>";
                echo"<td>".$row['report_wait']."</td>";
              echo"</tr>";
              $i++;
              }
              }else{
              echo "ข้อมูลยังไม่มี";
              }
            ?>
    </tbody>

  </table>
</div>
<br>
<br>
<center>
<div class="container mt-3">
<button type="button" class="btn btn-outline-dark"><a href="admin_page.php">ย้อนกลับ</button>
</div>
</center>
</body>
</html>