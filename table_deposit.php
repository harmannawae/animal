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
    <title>หน้าจัดการข้อมูลการฝาก</title>
</head>
<body>
<div class="container mt-3">
  <h2>หน้าจัดการข้อมูลการฝาก</h2>
  <p>/////////////////////////////////////////////////////</p>            
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">ลำดับ</th>
        <th scope="col">ชื่อเจ้าของ</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">ประเภท</th>
        <th scope="col">อายุ</th>
        <th scope="col">สายพันธุ์</th>
        <th scope="col">ลักษณะพิเศษ</th>
        <th scope="col">เพศ</th>
        <th scope="col">สีลำตัว</th>
        <th scope="col">อาหารที่ชอบ</th>
        <th scope="col">อาหารที่แพ้</th>
        <th scope="col">นิสัยสัตว์เลี้ยง</th>
        <th scope="col">ความสามารถพิเศษ</th>
        <th scope="col">โรคประจำตัว</th>
        <th scope="col">ข้อมูลเพิ่มเติม</th>
        <th scope="col">วันที่ฝาก</th>
        <th scope="col">เวลาฝาก</th>
        <th scope="col">วันที่รับ</th>
        <th scope="col">เวลารับ</th>
        <th scope="col">จำนวนวัน</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
      </tr>
    </thead>
    <tbody>
        <?php
        //ดึงข้อมูลมา
        $sql ="SELECT 
        user.*,
        animal_deposit.*
        FROM animal_deposit INNER JOIN user ON user.user_id=animal_deposit.user_id";
        //ดึงข้อมูลมาใส่แยกกัน
        $result = mysqli_query($conn,$sql);
        $i =1;
        if(mysqli_num_rows($result) > 0){
        //บรรทัดนี้สำคัญ 
        while($row = mysqli_fetch_assoc($result)){
                 echo"<tr>";
                    echo"<td>".$i."</td>";
                    echo"<td>".$row['user_name']."</td>";
                    echo"<td>".$row['anm_name']."</td>";
                    echo"<td>".$row['anm_category']."</td>";
                    echo"<td>".$row['anm_age']."</td>";
                    echo"<td>".$row['anm_species']."</td>";
                    echo"<td>".$row['anm_special_features']."</td>";
                    echo"<td>".$row['anm_gender']."</td>";
                    echo"<td>".$row['anm_color']."</td>";
                    echo"<td>".$row['anm_favorite_food']."</td>";
                    echo"<td>".$row['anm_food_allergy']."</td>";
                    echo"<td>".$row['anm_character']."</td>";
                    echo"<td>".$row['anm_talent']."</td>";
                    echo"<td>".$row['anm_congenital_disease']."</td>";
                    echo"<td>".$row['anm_more']."</td>";
                    echo"<td>".$row['anm_deposit_date']."</td>";
                    echo"<td>".$row['anm_Deposit_time']."</td>";
                    echo"<td>".$row['anm_pick_up_date']."</td>";
                    echo"<td>".$row['anm_pick_up_time']."</td>";
                    echo"<td>".$row['anm_day']."</td>";
                    echo"<td><a href='edit_deposit.php?anm_id=".$row['anm_id']."'>แก้ไข</a></td>";
                    echo"<td><a href='data_deposit.php?delete_anm_id=".$row['anm_id']."'
                    onclick='return confirm(\"คุณต้องการลบขอความหรือไม\")'>ลบ</a>
                    </td>";
                echo"</tr>";
                $i++;
            }
        }else{
            echo "ยังไม่มีข้อมูล........";
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