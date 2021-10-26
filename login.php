<?php 

    session_start();

    if (isset($_POST['user_email'])) {

        include('connection.php');

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $query = "SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['user'] = $row['user_name'] . " " . $row['user_sname'];
            $_SESSION['user_type'] = $row['user_type'];

            if ($_SESSION['user_type'] == 'admin') {
                header("Location: admin_page.php");
            }
            
        } else {
            echo "<script>alert('Email หรือ Password ไม่ถูกต้อง);</script>";
        }

    } else {
        header("Location: index.php");
    }


?>