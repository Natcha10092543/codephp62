<?php
include 'template/header.html';
 require_once 'connectdb.php';
    
    $strSQL = "SELECT user_id, username, status FROM user WHERE 1";
    $result = $myconn->query($strSQL);

   ?>
   <body>
   <table class="table table-striped table-dark">
         <tr>
            <td> รหัส </td>
            <td> ชื่อผู้ใช้</td>
            <td> สถานะ</td>
            <td> แก้ไข</td>
            <td> ลบ</td>

     <tr>
    <tbody>
    <?php
     while ($row = $result->fetch_array()) {
        // echo $row["username"] . "<br>";
    ?>
         <tr>
            <td> <?php echo $row["user_id"]; ?></td>
            <td> <?php echo $row["username"]; ?></td>
            <td> <?php echo $row["status"]; ?></td>
            <td><a href="update.php?id=<?php echo $row["user_id"]; ?>&username=<?php echo $row["username"]; ?>&status=<?php echo $row["status"]; ?>"><i class="fas fa-pen"></i>
</a></td>
            <td><a href="delete.php?id=<?php echo $row["user_id"]; ?>"><i class="fas fa-trash"></i>
</a></td>
         <tr>
     <?php
    }
    ?>     
    </tbody>
    </table>
 <a href ="insert.php">เพิ่มผู้ใช้; 
        <?php
       include 'template/footer.html';
       ?>
   </body>

   </html>