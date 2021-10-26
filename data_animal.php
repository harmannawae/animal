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

    $sql = "INSERT INTO animal ( anm_id , anm_name , anm_category, anm_age, anm_species, anm_special_features, anm_gender, anm_color, anm_favorite_food, anm_food_allergy, anm_character, anm_talent, anm_congenital_disease, anm_more)
        
        VALUES (null , '$anm_name','$anm_category','$anm_age','$anm_species','$anm_special_features','$anm_gender','$anm_color','$anm_favorite_food','$anm_food_allergy','$anm_character','$anm_talent','$anm_congenital_disease','$anm_more' )";

        if (mysqli_query($conn,$sql)) {

            echo "New record created successfully";
            echo "<br><a href='indax.php'>Bact To All Employees Page</a>";

        }else{

            echo "Error:" . $sql . "<br>" . mysqli_error($conn);

        }
    }

    //save edit data

    if(isset($_POST['edit_form_anm_id'])){

        $anm_name = $_POST['edit_anm_name'];
        $anm_category = $_POST['edit_anm_category'];
        $anm_age = $_POST['edit_anm_age'];
        $anm_species = $_POST['edit_anm_species'];
        $anm_special_features = $_POST['edit_anm_special_features'];
        $anm_gender = $_POST['edit_anm_gender'];
        $anm_color = $_POST['edit_anm_color'];
        $anm_favorite_food = $_POST['edit_anm_favorite_food'];
        $anm_food_allergy = $_POST['edit_anm_food_allergy'];
        $anm_character = $_POST['edit_anm_character'];
        $anm_talent = $_POST['edit_anm_talent'];
        $anm_congenital_disease = $_POST['edit_anm_congenital_disease'];
        $anm_more = $_POST['edit_anm_more'];
        $anm_id = $_POST['edit_form_anm_id'];
        
        $sql ="UPDATE animal SET anm_name='$anm_name',anm_category='$anm_category', 
                               anm_age ='$anm_age',anm_species='$anm_species',anm_special_features='$anm_special_features',anm_gender='$anm_gender',anm_color='$anm_color',
                               anm_favorite_food='$anm_favorite_food',anm_food_allergy='$anm_food_allergy',anm_character='$anm_character',anm_talent='$anm_talent',anm_congenital_disease='$anm_congenital_disease',anm_more='$anm_more' WHERE anm_id=$anm_id";

        if (mysqli_query($conn,$sql)){

            echo "Record updated successfully";

            echo "<br><a href='table_animal.php'>Bact To All user Page</a>";

        }else{
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    //delete data
    if(isset($_GET['delete_anm_id'])){

        $anm_id = $_GET['delete_anm_id'];

        // sql to delete a record
        $sql = "DELETE FROM animal WHERE anm_id= $anm_id";

        if (mysqli_query($conn,$sql)){

            echo "Record deleted successfully";

            echo "<br><a href='table_animal.php'> Bact To user Page</a>";

        }else{

            echo "Error deleting record: " . mysqli_error($conn);
        }

    }
    ?>