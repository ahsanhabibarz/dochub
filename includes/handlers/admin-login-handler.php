<?php
    require("../config/connect.php");
    if(isset( $_POST['ademail']) && isset($_POST['adpass'])){
        $email = $_POST['ademail'];
        $password = $_POST['adpass'];
        $sql = "SELECT * FROM admin WHERE email='".$email."'AND password='".$password."'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1){
            $_SESSION['admin'] = array($row['id']);
            header("Location: ../../admin.php");
        }
    } 


?>