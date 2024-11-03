<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edit_cate = $_POST['edit_category'];
    $id = (int) $_POST['id'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "UPDATE category SET name = :name WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $edit_cate);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['add_cat'] = "success";
    } else {
        $_SESSION['add_cat'] = "error";
    }

    $conn = null;
    header("Location: category.php");
    exit();
} else {
    header("Location: category.php");
    exit();
}
?>
