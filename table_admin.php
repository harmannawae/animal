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
    <title>หน้าจัดการข้อมูลลูกค้า</title>
</head>
<body>
<div class="container mt-3">
  <h2>หน้าจัดการข้อมูลลูกค้า</h2>
  <p>///////////////////////////////////////////////</p>            
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">ลำดับ</th>
        <th scope="col">อีเมล</th>
        <th scope="col">รหัสผ่าน</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">นามสกุล</th>
        <th scope="col">วันเกิด</th>
        <th scope="col">ที่อยู่</th>
        <th scope="col">เบอร์โทร</th>
        <th scope="col">เลขบัตรปชช</th>
        <th scope="col">สถานะ</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
      </tr>
    </thead>
    <tbody>
        <?php
        //ดึงข้อมูลมา
        $sql ="SELECT * FROM user";
        //ดึงข้อมูลมาใส่แยกกัน
        $result = mysqli_query($conn,$sql);
        $i =1;
        if(mysqli_num_rows($result) > 0){
        //บรรทัดนี้สำคัญ 
        while($row = mysqli_fetch_assoc($result)){
                 echo"<tr>";
                 echo"<td>".$i."</td>";
                 echo"<td>".$row['user_email']."</td>";
                 echo"<td>".$row['user_password']."</td>";
                 echo"<td>".$row['user_name']."</td>";
                 echo"<td>".$row['user_sname']."</td>";
                 echo"<td>".$row['user_birthday']."</td>";
                 echo"<td>".$row['user_address']."</td>";
                 echo"<td>".$row['user_phone']."</td>";
                 echo"<td>".$row['user_id_number']."</td>";
                 echo"<td>".$row['user_type']."</td>";
                 echo"<td><a href='edit_form.php?user_id=".$row['user_id']."'>แก้ไข</a></td>";
                 echo"<td><a href='data.php?delete_user_id=".$row['user_id']."'
                 onclick='return confirm(\"คุณต้องการลบข้อมูลนี้ใช่หรือไหม\")'>ลบ</a>
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