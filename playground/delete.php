<?php
require_once 'connectdb.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = "";
    if(isset($_GET["id"]) && $_GET["id"] != ''){
        $id = $_GET["id"];
        $strSQL ="DELETE FROM user WHERE user_id= " .$id;
        $result = $myconn->query($strSQL);
        // echo $strSQL . "<br>";
        echo $result;

        if ($result) {
        echo "ลบข้อมูลสำเร็จ";
        }else {
         echo "ไม่สามารถเพิ่มข้อมูล";
        }
    }else{
        echo "id is null";
    }
   }