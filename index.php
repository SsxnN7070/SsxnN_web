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
    <h1 style="text-align: center;">Webbord SsunN</h1>
    <hr>
หมวดหมู่ :
    <select name="category">
        <option value="all">--ทั้งหมด--</option>
        <option value="general">เรื่องทั่วไป</option>
        <option value="study">เรื่องเรียน</option>
    </select>
    <br> 

    <?php
    if(!isset($_SESSION['id'])){

        echo "<a href='login.php' style='float:right;'>เข้าสู่ระบบ</a>";

    }else{
        echo"<a href=newpost.php > สร้างกระทู้ใหม่ </a>";
        echo "<div style= ' float: right; '> ผู้ใช้งานระบบ : $_SESSION[username]&nbsp; 
        <a href=logout.php style= ' float: right; ' > ออกจากระบบ </a>
    </div>";
    }

    echo "<ul>";
    for($i = 1; $i <= 10; $i++){
        echo "<li><a href=post.php?id=$i>กระทู้ที่ $i</a>";
        if(isset($_SESSION['id']) && $_SESSION['role']=='a'){
            echo"&nbsp;<a href=delete.php?id=$i >ลบ</a></li>";
        }
    }
    ?>
    </ul>
        
</body>
</html>