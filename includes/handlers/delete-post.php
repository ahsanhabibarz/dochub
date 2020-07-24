<?php
    require("../config/connect.php");
    if(isset($_SESSION['user']) && !isset($_SESSION['admin'])){
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $sql = "DELETE FROM posts WHERE id= '".$pid."' AND posted_by='".$_SESSION['user'][0]."'";
            if ($con->query($sql) === true) {
                header("Location: ../../index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }else{
            echo "BAD REAUEST";
        }
    }else if(isset($_SESSION['admin'])){
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $sql = "DELETE FROM posts WHERE id= '".$pid."'";
            if ($con->query($sql) === true) {
                header("Location: ../../index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }else{
            echo "BAD REAUEST";
        }
    }else{
        header("Location: ../../login.php");
    }

    

?>