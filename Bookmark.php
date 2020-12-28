<!-- user_id
word_id
pic_id
audio_id -->

<?php
    $con = pg_connect("host=*** user=*** password=*** dbname=*** port=5432");
    $user_id = $_POST['useridPOST'];
    $word = $_POST['wordPOST'];
    $definition = $_POST['definitionPOST'];
    $check = $_POST['Status'];
    if (!$con){
        die("Connection Failed: ");
    }

    if ($user_id != "" && $word != "" && $definition != ""){
        $sqlcheck = "select * from bookmark where user_id = '".$user_id."' and word_id = '".$word."'";
        $resultcheck = pg_query($con,$sqlcheck);
        $row = pg_num_rows($resultcheck);
        if ($check == "Book"){
            if ($row > 0){
                echo "exist";
            }
            else{
                $sqlinsert = "insert into bookmark (user_id,word,definition) values('".$user_id."','".$word."','".$definition."')";
                $result = pg_query($con, $sqlinsert);
                echo "successful";
            }
        }
        if ($check == "Unbook"){
            $sqldelete = "delete from bookmark where user_id = '".$user_id."' and word = '".$word."' and definition = '".$definition."'";
            $result_delete = pg_query($con,$sqldelete);
            echo "delete successful";
        }
    }
?>