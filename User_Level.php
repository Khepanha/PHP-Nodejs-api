<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    $user_name = $_POST['usernamePOST'];
    $user_level = $_POST['userlevelPOST'];
    if (!$con){
        die("Connection Failed: ");
    }
    if ($user_name != "" && $user_level != ""){
        $sqlinsert = "update users set user_level = '".$user_level."' where user_name = '".$user_name."'";
        $result = pg_query($con, $sqlcheck);
        echo "successful";
    }
?>