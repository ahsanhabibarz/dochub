<?php
    require("../config/connect.php");
    if(isset( $_POST['lemail']) && isset($_POST['lpass'])){

        if(passwordvalidate($_POST['lpass'])){
            $error = "Password Structure not acceptable [Backend Response]";
            header("Location: ../../login.php?error=".$error);
        }else if(!filter_var($_POST['lemail'], FILTER_VALIDATE_EMAIL)){
            $error = "Email Structure not acceptable [Backend Response]";
            header("Location: ../../login.php?error=".$error);
        }else{
            $email = mysqli_real_escape_string( $con, $_POST['lemail']);
            $password = mysqli_real_escape_string($con , md5($_POST['lpass'])) ;
            $sql = "SELECT * FROM users WHERE email='".$email."'AND password='".$password."'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if($count == 1){
                $_SESSION['user'] = array($row['id'],$row['name'],$row['status']);
                header("Location: ../../index.php");
            }else{
                $error = "Email Or Password Incorrect [Backend Response]";
                header("Location: ../../login.php?error=".$error);
            }
        }
    }
    
    function passwordvalidate ($pass){
       return !preg_match("/^[A-Za-z]\w{9,14}$/",$pass);
    }
?>