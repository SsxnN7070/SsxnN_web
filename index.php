<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webbord</title>
</head>
<body>
    <h1 style="text-align: center;">Webbord KakKak</h1>
    <hr>
หมวดหมู่ :
    <select name="category">
        <option value="all">--ทั้งหมด--</option>
        <option value="general">เรื่องทั่วไป</option>
        <option value="study">เรื่องเรียน</option>
    </select>

    <?php
    if(!isset(session_id('id'))){

        echo "<a href='login.php' style='float:right;'>เข้าสู่ระบบ</a>";

    }else{

        echo "<div style= ' float: right; '> ผู้ใช้งานระบบ : $_SESSION[username]&nbsp;&nbsp; 
        <a href=logout.php style= ' float: right; ' > ออกจากระบบ </a>
    </div>";
    }
    ?>

    <ul>
    <?php
    for($i = 1; $i <= 10; $i++){
        echo "<li><a href=post.php?id=$i> กระทู้ที่ $i </a></li>";
    }
    ?>
    </ul>
        
</body>
</html>