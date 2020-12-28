<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    // $username = $_POST['confirmUserPOST'];
    $email = $_POST['confirmEmailPOST'];
    $newpassword = $_POST['newpasswordPOST'];
    $verify = $_POST['forgetStatus'];
    
    if (!$con){
        die("Connection failed: ");
    }
    if ($email != ""){
        $sqlCheck = "select * from users where email = '".$email."'";
        $resultCheck = pg_query($con, $sqlCheck);
        $row = pg_num_rows($resultCheck);
        if ($row > 0){
            echo "exist";
            if ($verify = "Reset"){
                $sqlUpdate = "update users set user_password = '".$newpassword."' where email = '".$email."'";
                $resultUpdate = pg_query($con, $sqlUpdate);
                if ($resultUpdate) echo "successful!";
                else echo "Update Failed";
            }
        }
        else{
            echo "not exist";
        }
    }
?>