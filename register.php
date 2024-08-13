<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <h1 style="text-align: center;">สมัครสมาชิก</h1>
    <hr>
    <center>
    <table style="border: 2px solid black; width: 50%;text-align: left;padding: 0.5%;">
        <tr align="center" style="background-color: aqua;"><th colspan="2">กรอกข้อมูล</th></tr>
        <tr><td>ชื่อบัญชี :</td><td><input type="text" name="user" style="width: 90%;"></td></tr>
        <tr><td>รหัสผ่าน :</td> <td><input type="Password" name="pwd" style="width: 90%;"></td></tr>
        <tr><td>ชื่อ-นามสกุล :</td><td><input type="text" name="name" style="width: 90%;"></td></tr>
        <tr><td>เพศ :</td><td><input type="radio" name="gender" value="m">ชาย<br>
            <input type="radio" name="gender" value="f">หญิง<br>
            <input type="radio" name="gender" value="o">อื่นๆ
        </td></tr>
        <tr><td>อีเมล :</td><td><input type "email" name="email" style="width: 90%"></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="สมัครสมาชิก"></td></tr>
    </table>

    <div><a href="index.php"><br>กลับไปหน้าหลัก</a></div>
    </center>
</body>
</html>