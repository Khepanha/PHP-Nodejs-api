<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    $user_id = $_POST['useridPOST'];
    if (!$con){
        die("Connection Failed: ");
    }
    if ($user_id != ""){
        $sqlselect = "select word from understood where user_id = '".$user_id."'";
        $resultselect = pg_query($con, $sqlselect);
        $num = pg_num_rows($resultselect);
        $arr = pg_fetch_all($resultselect);
        for ($i = 0; $i < $num; $i++){
            print_r($arr[$i]['word']);
            echo "<br />";
        }
    }
?>