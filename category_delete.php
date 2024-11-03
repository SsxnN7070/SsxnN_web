<?php
    session_start();
    if((isset($_SESSION['id']) || ($_SESSION['role']=="a"))){
        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $id=$_GET['id'];
        $sql="DELETE FROM category WHERE id=$id";
        $result=$conn->exec($sql);

         if($result){
            $_SESSION['cat_delete']="success";
        }else{
            $_SESSION['cat_delete']="error";
        }

        $conn=null;
        header("location:category.php");
        die();
    }else{
        header("location:index.php");
        die();
    }
    
?>