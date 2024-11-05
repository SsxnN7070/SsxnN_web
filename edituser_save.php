<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'a') {
    header("location:index.php");
    exit();
}

try {
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $username = trim($_POST['username']);
        $name = trim($_POST['name']);
        $gender = trim($_POST['gender']);
        $email = trim($_POST['email']);
        $role = trim($_POST['role']);

        if (empty($username) || empty($name) || empty($email) || empty($role)) {
            $_SESSION['edit_user'] = "error";
            header("location: user.php?id=$id");
            exit();
        }

        $sql = "UPDATE user SET login = :username, name = :name, gender = :gender, email = :email, role = :role WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':name' => $name,
            ':gender' => $gender,
            ':email' => $email,
            ':role' => $role,
            ':id' => $id
        ]);

        $_SESSION['edit_user'] = "success";
        header("location: user.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
