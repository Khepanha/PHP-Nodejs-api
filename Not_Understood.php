<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    $user_id = $_POST['useridPOST'];
    $word = $_POST['wordPOST'];

    if($user_id != "" && $word != ""){
        $sqlcheck = "select * from not_understood where user_id = '".$user_id."' and word = '".$word."'";
        $resultcheck = pg_query($con,$sqlcheck);
        $row = pg_num_rows($resultcheck);
        if($row > 0){
            echo "exist";
        }
        else{
            $sqlinsert = "insert into not_understood (user_id,word,scene_name) values('".$user_id."','".$word."')";
            $result = pg_query($con, $sqlinsert);
            echo "successful";
        }
    }
?>