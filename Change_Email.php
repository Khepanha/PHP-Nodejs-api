
// Forget Password


<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    if (!$con){
        die("Connection failed: ");
    }

    $old_email = $_POST['oldEmail'];
    $old_password = $_POST['oldPassword'];
    $new_email = $_POST['newEmail'];
    $verify = $_POST['change']

    // $old_email = "jeffyeak999@gmail.com";
    // $old_password = "jeff";
    // $new_email = "jackma00@gmail.com";

    if ($old_email != "" && $old_password != ""){
        $sqlcheck = "select * from users where user_password = '".$old_password."' and email = '".$old_email."'";
        $resultCheck = pg_query($con,$sqlcheck);
        $row = pg_num_rows($resultCheck);

        if ($row > 0){
            echo "exist";
            if ($verify = "change"){
                $sqlUpdate = "update users set email = '".$new_email."' where user_password = '".$old_password."' and email = '".$old_email."'";
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