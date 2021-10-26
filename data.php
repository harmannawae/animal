<?php

    require("connection.php");

    //add new data form to mysql
    if(isset($_POST['user_email'])){
        
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_name = $_POST['user_name'];
        $user_sname = $_POST['user_sname'];
        $user_birthday = $_POST['user_birthday'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
        $user_id_number = $_POST['user_id_number'];
        $user_type = $_POST['user_type'];

    $sql = "INSERT INTO user ( user_id , user_email , user_password, user_name, user_sname, user_birthday, user_address, user_phone, user_id_number, user_type)
        
        VALUES (null , '$user_email','$user_password','$user_name','$user_sname','$user_birthday','$user_address','$user_phone','$user_id_number','$user_type' )";

        if (mysqli_query($conn,$sql)) {

            echo "New record created successfully";
            echo "<br><a href='indax.php'>Bact To All Employees Page</a>";

        }else{

            echo "Error:" . $sql . "<br>" . mysqli_error($conn);

        }
    }

    //save edit data

    if(isset($_POST['edit_form_user_id'])){

        $user_email = $_POST['edit_user_email'];
        $user_password = $_POST['edit_user_password'];
        $user_name = $_POST['edit_user_name'];
        $user_sname = $_POST['edit_user_sname'];
        $user_birthday = $_POST['edit_user_birthday'];
        $user_address = $_POST['edit_user_address'];
        $user_phone = $_POST['edit_user_phone'];
        $user_id_number = $_POST['edit_user_id_number'];
        $user_type = $_POST['edit_user_type'];
        $user_id = $_POST['edit_form_user_id'];
        
        $sql ="UPDATE user SET user_email='$user_email',user_password='$user_password', 
                               user_name ='$user_name',user_sname='$user_sname',user_birthday='$user_birthday',user_address='$user_address',user_phone='$user_phone',
                               user_id_number='$user_id_number',user_type='$user_type' WHERE user_id=$user_id";

        if (mysqli_query($conn,$sql)){

            echo "Record updated successfully";

            echo "<br><a href='table_admin.php'>Bact To All user Page</a>";

        }else{
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    //delete data
    if(isset($_GET['delete_user_id'])){

        $user_id = $_GET['delete_user_id'];

        // sql to delete a record
        $sql = "DELETE FROM user WHERE user_id= $user_id";

        if (mysqli_query($conn,$sql)){

            echo "Record deleted successfully";

            echo "<br><a href='table_admin.php'> Bact To user Page</a>";

        }else{

            echo "Error deleting record: " . mysqli_error($conn);
        }

    }
    ?>