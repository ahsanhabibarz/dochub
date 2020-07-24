<?php
    require("../config/connect.php");
    
    if(isset($_POST['topic'])){
        $topic = $_POST['topic'];;
        $topic = preg_replace('/\s+/', '+', $topic);
        $sql = "UPDATE apikeys SET value='".$topic."' WHERE id= '1'";
        if ($con->query($sql) === TRUE) {
            header("Location: ../../admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
?>