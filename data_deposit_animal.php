<?php

    require("connection.php");

        //add new data form to mysql
        if(isset($_POST['anm_name'])){
        
            $anm_name = $_POST['anm_name'];
            $anm_category = $_POST['anm_category'];
            $anm_age = $_POST['anm_age'];
            $anm_species = $_POST['anm_species'];
            $anm_special_features = $_POST['anm_special_features'];
            $anm_gender = $_POST['anm_gender'];
            $anm_color = $_POST['anm_color'];
            $anm_favorite_food = $_POST['anm_favorite_food'];
            $anm_food_allergy = $_POST['anm_food_allergy'];
            $anm_character = $_POST['anm_character'];
            $anm_talent = $_POST['anm_talent'];
            $anm_congenital_disease = $_POST['anm_congenital_disease'];
            $anm_more = $_POST['anm_more'];
            $anm_deposit_date = $_POST['anm_deposit_date'];
            $anm_Deposit_time = $_POST['anm_Deposit_time'];
            $anm_pick_up_date = $_POST['anm_pick_up_date'];
            $anm_pick_up_time = $_POST['anm_pick_up_time'];
            $anm_day = $_POST['anm_day'];
            $anm_id = $_POST['anm_id'];
    
        $sql = "INSERT INTO animal_deposit ( anm_id , anm_name , anm_category, anm_age, anm_species, anm_special_features, anm_gender, anm_color, anm_favorite_food, anm_food_allergy, anm_character, anm_talent, anm_congenital_disease, anm_more, anm_deposit_date, anm_Deposit_time, anm_pick_up_date, anm_pick_up_time, anm_day)
            
            VALUES (null , '$anm_name','$anm_category','$anm_age','$anm_species','$anm_special_features','$anm_gender','$anm_color','$anm_favorite_food','$anm_food_allergy','$anm_character','$anm_talent','$anm_congenital_disease','$anm_more','$anm_deposit_date','$anm_Deposit_time','$anm_pick_up_date','$anm_pick_up_time','$anm_day' )";
    
            if (mysqli_query($conn,$sql)) {
    
                echo "New record created successfully";
                echo "<br><a href='indax.php'>Bact To All Employees Page</a>";
    
            }else{
    
                echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    
            }
        }


    //delete data
    if(isset($_GET['delete_anm_id'])){

        $anm_id = $_GET['delete_anm_id'];

        // sql to delete a record
        $sql = "DELETE FROM wait WHERE anm_id= $anm_id";

        if (mysqli_query($conn,$sql)){

            echo "Record deleted successfully";

            echo "<br><a href='deposit.php'> Bact To user Page</a>";

        }else{

            echo "Error deleting record: " . mysqli_error($conn);
        }

    }
?>