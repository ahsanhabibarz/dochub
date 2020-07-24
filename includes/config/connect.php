<?php
    session_start();
    $errors = "A";
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "dochub";

    $con = new MYSQLI($host , $user , $pass , $db_name);

    if($con->connect_error){
        die("Connection Error" . $con->connect_error);
    }