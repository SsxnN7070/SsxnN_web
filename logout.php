<?php
session_start();
session_destroy();// ลบการlogin
header("location:index.php"); // ส่งกลับindex
die();
?>