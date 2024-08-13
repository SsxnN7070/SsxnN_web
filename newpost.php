<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newpost</title>
</head>
<body>

    <h1 style=" text-align: center;">Webbord SsunN</h1>
    <hr>
    ผู้ใช้งานระบบ : <?php echo $_SESSION['username']; ?><br>
    
    <br>
    <table style="position:fixed; text-align: left;padding: 0.5%;">
    <tr><td>หมวดหมู่ :</td><td>   <select name="category">
                                <option value="all">--ทั้งหมด--</option>
                                <option value="general">เรื่องทั่วไป</option>
                                <option value="study">เรื่องเรียน</option>
                                </select></td></tr>
    <tr><td style="position: fixed; text-align:top;">หัวข้อ :</td><td><input></td></tr>
    <tr><td>เนื้อหา :</td><td><textarea name="" id="" cols="40" rows="5"></textarea></td></tr>
    <tr><td></td><td><input type="submit" value="บันทึกข้อความ"></td></tr>
    </table>

</body>
</html>