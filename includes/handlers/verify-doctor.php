<?php
    require("../config/connect.php");

        if(isset($_SESSION['admin']) && isset($_GET['id'])){
            $status = 1;
            $sql = "UPDATE users SET status='".$status."' WHERE id= '".$_GET['id']."'";
            if ($con->query($sql) === TRUE) {
                header("Location: ../../index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
    
?>