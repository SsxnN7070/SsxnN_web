<?php 
    session_start();
    $cate=$_POST['category'];
    $top=$_POST['topic'];
    $com=$_POST['comment'];
    $user=$_SESSION['user_id'];
    $id = $_POST['id'];
    $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    
    
    $sql ="UPDATE post SET post.cat_id = '$cate',post.title = '$top', post.content = '$com' WHERE post.id = $id";
    
    $result = $conn->exec($sql);

    if($result){
        $_SESSION['add_edit']="success";
    }else{
        $_SESSION['add_edit']="error";
    }

    header("location:editpost.php?id=$id");
    $conn=null;                        
    header("location:index.php");
    
?>