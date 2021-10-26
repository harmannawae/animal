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
    <title>หน้ารายการรอฝาก</title>
</head>
<body>
<div class="container mt-3">
  <h2>หน้ารายการรอฝาก</h2>
  <p>//////////////////////////////</p>            
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
        <th scope="col">ทำการฝาก</th>
        <th scope="col">ฝากสำเร็จ</th>
      </tr>
    </thead>
    <tbody>
        <?php
        //ดึงข้อมูลมา
        $sql ="SELECT 
        user.*,
        wait.*
        FROM wait INNER JOIN user ON user.user_id=wait.user_id";
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
                 echo"<td><a href='deposit_animal.php?anm_id=".$row['anm_id']."'>ฝาก</a></td>";
                 echo"<td><a href='data3.php?delete_id=".$row['anm_id']."'
                 onclick='return confirm(\"คุณฝากสำเร็จแล้วใช่หรือไม่\")'>ฝากสำเร็จ</a>
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