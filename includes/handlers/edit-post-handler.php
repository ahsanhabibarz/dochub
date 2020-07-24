<?php
    require("../config/connect.php");
    $title = $_POST['title'];
    $des = $_POST['description'];
    $id = $_POST['id'];
    if(isset($_POST['editor1'])){
        $editor = $_POST['editor1'];
        $sql = "UPDATE posts SET title='".$title."', description='".$des."', content='".$editor."' WHERE id= '".$id."'";
        if ($con->query($sql) === TRUE) {
            header("Location: ../../index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
?>