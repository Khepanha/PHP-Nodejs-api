<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    if (!$con){
        die("Connection failed: ");
    }

    // $old_username = $_POST['oldEmail'];
    // $old_password = $_POST['oldPassword'];
    // $new_username = $_POST['newEmail'];
    // $verify = $_POST['status'];

    $old_username = "jeffyeak";
    $old_password = "jack";
    $new_username = "JackMa";
    $verify = "change";

    if ($old_username != "" && $old_password != ""){
        $sqlcheck = "select * from users where user_name = '".$old_username."' and user_password = '".$old_password."'";
        $resultCheck = pg_query($con,$sqlcheck);
        $row = pg_num_rows($resultCheck);

        if ($row > 0){
            echo "exist";
            $sqlcheck_1 = "select * from users where user_name = '".$new_username."'";
            $resultCheck_1 = pg_query($con,$sqlcheck_1);
            $row_1 = pg_num_rows($resultCheck_1);
            if ($row_1 > 0){
                echo "userexist";
            }
            else{
                if ($verify = "Reset"){
                    $sqlUpdate = "update users set user_name= '".$new_username."' where user_password = '".$old_password."'";
                    $resultUpdate = pg_query($con, $sqlUpdate);
                    if ($resultUpdate) echo "successful!";
                    else echo "Update Failed";
                }
            }
        }
        else{
            echo "not exist";
        }
    }
?>