<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    $scene_percentage = $_POST['percentagePOST'];
    $scene_name = $_POST['scenenamePOST'];
    $user_id = $_POST['useridPOST'];

    if (!$con){
        die("Connection Failed: ");
    }

    if ($scene_percentage != "" && $scene_name != "" && $user_id != ""){
        $sqlcheck = "select * from scene_percentage where scene_name = '".$scene_name."' and user_id = '".$user_id."'";
        $resultcheck = pg_query($con,$sqlcheck);
        $row = pg_num_rows($resultcheck);
        if ($row > 0){
            $sqlupdate = "update scene_percentage set percentage = '".$scene_percentage."' where scene_name = '".$scene_name."' and user_id = '".$user_id."'";
            $resultupdate = pg_query($con, $sqlupdate);
            echo "successful";
        }
        else {
            $sqlinsert = "insert into scene_percentage(scene_name,user_id,percentage) values('".$scene_name."','".$user_id."','".$scene_percentage."')";
            $result = pg_query($con, $sqlinsert);
            echo "successful";
        }
    }
?>