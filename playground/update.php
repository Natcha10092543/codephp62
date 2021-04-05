<?php
require_once 'connectdb.php';
$user_id = "";
$username = "";
$status = "";
$strSQL = "";

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $user_id = "";
    if(isset($_GET["id"]) && $_GET["id"] != '') {
        $user_id = $_GET["id"];
        $username = $_GET["username"];
        $status = $_GET["status"];
    }else {
        //echo "user_id is null";
    }
}
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $status = "";
    $user_id = $_GET["user_id"];
    $username = $_POST["username"];
    $status = $_POST["status"];
    echo $username . " -- " .$status;
    $strSQL ="UPDATE user SET username='" .$username."',status=".$status." WHERE user_id=".$user_id;
    if(($username == "") && ($status == "")) {
        echo "ไม่สามารถเพิ่มข้อมูลได้";
    }else{
        echo $strSQL ;

        $result = $myconn->query($strSQL);
        if($result){
            echo "เพิ่มข้อมูลสำเร็จ";
        }else{
            echo "ไม่สามารถเพิ่มข้อมูลได้";
        }
    }
    }
    //echo $_POST["username"];

    //$strSQL ="INSERT INTO user`(username`, password_hash) ";
    //$strSQL .=" VALUES ('user03','password for user 03')";

    //$result = $myconn->query($strSQL);
    //if($result){
    //    echo "1";
    //}else{
    //    echo "2";
    //}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <form action="update.php?user_id=<?=$user_id?>" method="POST">
        <table border="2">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?=$username?>"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" name="status" value="<?=$status?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="save"></td>
            </tr>
        </table>
    </form>
    </body>
    </html>