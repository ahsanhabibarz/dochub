<?php
    require("../config/connect.php");
    if(isset( $_POST['semail']) && isset($_POST['sname']) && isset($_POST['spass']) && isset($_POST['seducation']) && isset($_POST['sdesignation'])){
        
        if(passwordvalidate($_POST['spass'])){
            $error = "Password Structure not acceptable [Backend Response]";
            header("Location: ../../signup.php?error=".$error);
        }else if(!passwordMatch($_POST['spass'] ,$_POST['sconfirmpass'] )){
            $error = "Password Structure not acceptable [Backend Response]";
            header("Location: ../../signup.php?error=".$error);
        }
        else if(!filter_var($_POST['semail'], FILTER_VALIDATE_EMAIL)){
            $error = "Email Structure not acceptable [Backend Response]";
            header("Location: ../../signup.php?error=".$error);
        }else{
            $name = mysqli_real_escape_string($con,  $_POST['sname']);
            $email = mysqli_real_escape_string($con,  $_POST['semail']);
            $password = mysqli_real_escape_string($con,  $_POST['spass']);
            $education = mysqli_real_escape_string($con,  $_POST['seducation']);
            $designation = mysqli_real_escape_string( $con, $_POST['sdesignation']);
            $hashedPassword = md5($password);
    
            $sql = "INSERT INTO users (id,name,email,education,designation, password , status)
        VALUES ('','".$name."','".$email."','".$education."','".$designation."','".$hashedPassword."', 0)";
    
            if ($con->query($sql) === TRUE) {
                $last_id = $con->insert_id;
                $_SESSION['user'] = array($last_id,$name,0);
                header("Location: ../../index.php");
            } else {
                $error = "Failed To Register";
                header("Location: ../../signup.php?error=".$error);
            }
        }
        
    }
    
    function passwordvalidate ($pass){
        // /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/ 
        return !preg_match("/^[A-Za-z]\w{9,14}$/",$pass);
     }
    function passwordMatch ($pass , $pass2){
        return $pass == $pass2;
     }
?>