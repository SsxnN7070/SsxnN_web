<?php
session_start();
$title = $_POST['topic'];
$content = $_POST['comment'];
$cate = $_POST['category'];
$user_id = $_SESSION['user_id'];
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql = "INSERT into post (cat_id,user_id,post_date,title,content) VALUES ('$cate','$user_id',NOW(),'$title','$content') ";
header("location:index.php");
$conn->exec($sql);
$conn = null;
die();
?>