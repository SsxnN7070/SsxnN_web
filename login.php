<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1 style="text-align: center;">Webbord SsunN</h1>
    <hr>
    <center>
        <table style="border: 2px solid black; width: 40%;" align="center">
            <form action="verify.php" method="post">
                <tr>
                    <td colspan="2" style=" background-color: aqua;" >เข้าสู่ระบบ</td>
                </tr>
                <tr>
                    <td>Login</td><td><input type="text" name="login" size="50"></td>
                </tr>
                <tr>
                    <td>Password</td><td><input type="password" name="pwd" size="50"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Login"></td>
                </tr>
            </table>
            <br>
            ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก
        </form>
    </table>
    </center>   
</body>
</html>