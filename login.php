<?php
    session_start();
    $host = "***";
    $user = "***";
    $password = "***";
    $dbname = "***";
    $port = "5432";

    $con = pg_connect($host, $user, $password,$dbname,$port);
    // Check connection
    if (!$con) {
        die("Connection failed: ");
    }
    // $email = $_POST['txt_email'];
    // $password = $_POST['txt_pwd'];
    $email = 'khepanha18@kit.edu.kh';
    $password = 'hello';

    if ($email != "" && $password != ""){

        $sql_query = "select * from users where email ='".$email."' and user_password='".$password."'";
        $result = pg_query($con,$sql_query);
        $row = pg_num_rows($result);

        if($row > 0){
            $email = "select * from users where email = '".$email."' and user_password = '".$password."'";
            $email_result = pg_query($con,$email);
            $col = pg_fetch_assoc($email_result);
            echo "Done/".$col['email']."/".$col['user_id']."/".$col['user_level'];
        }else{
            echo "Password is incorrect";
        }
    }
?>