<?php
session_start();
if (isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
$login = $_POST['Login'];
$password = $_POST['Password'];
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql="SELECT * FROM user where login='$login' and password = sha('$password')";
$result=$conn->query($sql);
$stmt = $conn->prepare("SELECT * FROM user WHERE login = :login");
$stmt->bindParam(':login', $login);
$stmt->execute();

$login = $_POST['Login'];
$password = $_POST['Password'];

if ($login == "admin" && $password == "ad1234") {
    $_SESSION['username']="admin";
    $_SESSION['role']="a";
    $_SESSION['id']=session_id();
    header("location:index.php");
    die();
}
if ($stmt->rowCount() > 0) {
    $error_message = "Username already taken. Please choose another.";
}
if($result->rowCount()==1){
    $data=$result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['username']=$data['login'];
    $_SESSION['role']=$data['role'];
    $_SESSION['user_id']=$data['id'];
    $_SESSION['id']=session_id();
    header("location:index.php");
    die();
}else{
    $_SESSION['error']='error';
    header("location:login.php");
    die();
}
    $conn=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <h1 style="text-align: center;"><b>Webboard Kakkak</b></h1>
    <hr>
    <center>
        <?php
        $login = $_POST['Login'];
        $password = $_POST['Password'];

        if ($login == "admin" && $password == "ad1234") {
            $_SESSION['username']="admin";
            $_SESSION['role']="a";
            $_SESSION['id']=session_id();
            echo "ยินดีต้อนรับคุณ ADMIN"; }
        else if ($login == "member" && $password == "mem1234") {
            $_SESSION['username']="member";
            $_SESSION['role']="m";
            $_SESSION['id']=session_id();
            echo "ยินดีต้อนรับคุณ MEMBER"; }
        else
            echo "ชื่อบัญชีหรือหรัสผ่านไม่ถูกต้อง";
        ?> 
    <br><a href="index.php">กลับไปหน้าหลัก</a></p>  
    </center>
</body>
</html>