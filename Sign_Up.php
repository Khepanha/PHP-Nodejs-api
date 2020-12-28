<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    if (!$con){
        die("Connection Failed: ");
    }
    
    // $first_name = $_POST['firstnamePOST'];
    // $last_name = $_POST['lastnamePOST'];
    $fullname = $_POST['fullnamePOST'];
    // $uname = $first_name.$last_name;
    $email = $_POST['emailPOST'];
    $password = $_POST['passwordPOST'];
    $verify = $_POST['verificationStatus'];

    if ($fullname != "" && $email != ""){
        $selectSQL = "select * from users where user_name = '".$fullname."' and email = '".$email."'";
        $selectresult = pg_query($con, $selectSQL);
        $row = pg_num_rows($selectresult);
        if ($row > 0){
            echo "Taken";
        }
        else{
            echo "Not Taken";
            if ($verify == "confirmed"){
                $insert = "insert into users(user_name,user_password,email) values('".$fullname."','".$password."','".$email."')";
                $result = pg_query($con, $insert);
                $user_id = "select * from users where user_name = '".$fullname."'";
                $user_id_result = pg_query($con,$user_id);
                $col = pg_fetch_assoc($user_id_result);
                echo "successful/".$col['user_id'];
            }
        }
    }
?>
















    // $con = pg_connect("host=192.168.7.92 user=lens_of_reality password={%lor2020%^postgresql*%} dbname=vr_vocabulary port=5432");
    // if (!$con){
    //     die("Connection Failed: ");
    // }
    // $email = $_POST['txt_email'];
    // $first_name = $POST['firstnamePOST'];
    // $last_name = $POST['lastnamePOST'];
    // $uname = $email.$last_name;
    // $password = $_POST['txt_pwd'];
    // $verify = $_POST['verificationStatus'];
    // // $first_name = "Yean";
    // // $last_name = "mao";
    // // $email = "yunjork@zin2.bczin";
    // // $uname = $first_name.$last_name;
    // // $password = "hello";
    // // $verify = "confirmed";

    // if ($uname != "" && $password != ""){
    //     $selectSQL = "select * from users where user_name = '".$uname."'";
    //     $selectresult = pg_query($con, $selectSQL);
    //     $row = pg_num_rows($selectresult);
    //     if ($row > 0){
    //         echo "Taken";
    //     }
    //     else{
    //         echo "not taken";
    //     }
    //     // else{
    //     //     $insert = "insert into users(user_name,user_password) values('".$uname."','".$password."')";
    //     //     $result = pg_query($con, $insert);
    //     //     echo "successful";
    //     // }
    // }
    // if ($verify == "confirmed"){
    //     $insert = "insert into users(user_name,user_password) values('".$uname."','".$password."')";
    //     $result = pg_query($con, $insert);
    //     echo "successful";
    // }