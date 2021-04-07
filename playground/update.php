<?php
include 'template/header.html';
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
    // echo $username . " -- " .$status;
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
   
    ?>
    
    <body>
    <form action="update.php?user_id=<?=$user_id?>" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?= $username ?> ">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">status</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="status" value="<?= $status ?> ">
  </div>
   
  <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <?php
    include 'template/footer.html';
    ?>
    </body>
    </html>