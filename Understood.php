<!-- user_id
     word_id -->

<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    $user_id = $_POST['useridPOST'];
    $word = $_POST['wordPOST'];

    if($user_id != "" && $word != ""){
        $sqlcheck = "select * from understood where user_id = '".$user_id."' and word = '".$word."'";
        $resultcheck = pg_query($con,$sqlcheck);
        $row = pg_num_rows($resultcheck);
        if($row > 0){
            echo "exist";
        }
        else{
            $sqlcheck_not_understood = "select * from not_understood where user_id = '".$user_id."' and word = '".$word."'";
            $resultcheck_not_understood = pg_query($con,$sqlcheck_not_understood);
            $row_n = pg_num_rows($resultcheck_not_understood);
            if ($row_n > 0){
                $sqldelete = "delete from not_understood where user_id = '".$user_id."' and word = '".$word."'";
                $sqlresult_del = pg_query($con, $sqldelete);
            }

            $sqlinsert = "insert into understood (user_id,word) values('".$user_id."','".$word."')";
            $result = pg_query($con, $sqlinsert);
            echo "successful";
        }
    }

?>