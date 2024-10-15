<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location:index.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM user WHERE login = :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($pwd, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            header("location:index.php");
            die();
        } else {
            $error_message = "Invalid login credentials.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Register</title>
</head>
<body>
    <script>
        function comfirmpwd() {
            let pwd1 = document.getElementById("pwd1");
            let pwd2 = document.getElementById("pwd2");
            if (pwd1.value !== pwd2.value) {
                alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
                pwd1.value = "";
                pwd2.value = "";
            }
        }
    </script>
    <div class="container-lg">
        <h1 class="mt-3 text-center">Webboard SsxnN</h1>
        <?php include "nav.php" ?>
        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <?php if (isset($error_message)): ?>
                    <div class='alert alert-danger'><?= htmlspecialchars($error_message) ?></div>
                <?php endif; ?>
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">REGISTER</div>
                    <div class="card-body">
                        <form action="register_save.php" method="post">
                            <div class="row">
                                <label for="user" class="col-lg-3 col-form-label">Username:</label>
                                <div class="col-lg-9">
                                    <input id="user" type="text" name="login" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="pwd" class="col-lg-3 col-form-label">Password:</label>
                                <div class="col-lg-9">
                                    <input id="pwd1" type="password" name="pwd" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="pwd2" class="col-lg-3 col-form-label">Confirm Password:</label>
                                <div class="col-lg-9">
                                    <input id="pwd2" type="password" name="pwd2" onblur="comfirmpwd()" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="name" class="col-lg-3 col-form-label">Full Name:</label>
                                <div class="col-lg-9">
                                    <input id="name" type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">Gender:</label>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input id="m" type="radio" name="gender" value="m" class="form-check-input" required>
                                        <label for="m" class="form-check-label">Male</label> 
                                    </div>
                                    <div class="form-check">
                                        <input id="f" type="radio" name="gender" value="f" class="form-check-input" required>
                                        <label for="f" class="form-check-label">Female</label> 
                                    </div>
                                    <div class="form-check">
                                        <input id="o" type="radio" name="gender" value="o" class="form-check-input" required>
                                        <label for="o" class="form-check-label">Other</label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="e" class="col-lg-3 col-form-label">Email:</label>
                                <div class="col-lg-9">
                                    <input id="e" type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-sm me-2">
                                        <i class="bi bi-save"></i> Register</button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-circle"></i> Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div>
</body>
</html>
