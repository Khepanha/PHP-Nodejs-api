<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    $username = $_POST["confirmUserPOST"];
    $password = $_POST["oldpasswordPOST"];
    $newpassword = $_POST["newpasswordPOST"];
    $verify = $_POST['forgetStatus'];
    // $newpassword = "abcd";
    // $uname = "khepanha";
    // $password = "admin";
    if (!$con){
        die("Connection failed: ");
    }
    if ($username != "" && $password != ""){
        $sqlCheck = "select * from users where user_name = '".$username."' and user_password = '".$password."'";
        $resultCheck = pg_query($con, $sqlCheck);
        $row = pg_num_rows($resultCheck);
        // if ($row > 0){
        //     $sqlUpdate = "update users set user_password = '".$newpassword."' where user_name = '".$uname."'";
        //     $resultUpdate = pg_query($con, $sqlUpdate);
        //     if ($resultUpdate) echo "successful!";
        //     else echo "Update Failed";
        // }
        if ($row > 0){
            echo "exist";
        }
        else{
            echo "not exist";
        }
    }
    if ($verify = "Reset"){
        $sqlUpdate = "update users set user_password = '".$newpassword."' where user_password = '".$password."' and user_name = '".$username."'";
        $resultUpdate = pg_query($con, $sqlUpdate);
        if ($resultUpdate) echo "successful!";
        else echo "Update Failed";
    }
?>









<!-- $con = pg_connect("host=192.168.7.92 user=lens_of_reality password={%lor2020%^postgresql*%} dbname=vr_vocabulary port=5432");

    $newpassword = $_POST["newpasswordPOST"];
    $email = $_POST["confirmEmailPOST"];
    $password = $_POST["oldpasswordPOST"];
    // $newpassword = "abcd";
    // $uname = "khepanha";
    // $password = "admin";
    if (!$con){
        die("Connection failed: ");
    }
    if ($email != ""){
        $sqlCheck = "select email from users where email = '".$email."'";
        $resultCheck = pg_query($con, $sqlCheck);
        $row = pg_num_rows($resultCheck);
        // if ($row > 0){
        //     $sqlUpdate = "update users set user_password = '".$newpassword."' where user_name = '".$uname."'";
        //     $resultUpdate = pg_query($con, $sqlUpdate);
        //     if ($resultUpdate) echo "successful!";
        //     else echo "Update Failed";
        // }
        if ($row > 0){
            echo "exist";
        }
        else echo "not exist";
    }
    if ($password != ""){
        $sqlcheck_1 = "select user_password from users where user_password = '".$password."'";
        $resultCheck_1 = pg_query($con, $sqlcheck_1);
        $row_1 = pg_num_rows($resultCheck_1);
        if ($row_1 > 0){
            $sqlUpdate = "update users set user_password = '".$newpassword."' where user_password = '".$password."'";
            $resultUpdate = pg_query($con, $sqlUpdate);
            if ($resultUpdate) echo "successful!";
            else echo "Update Failed";
        }
    } -->