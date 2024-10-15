<?php
session_start();
if (isset($_SESSION['id'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
    function password_show_hide() {
        let pwd = document.getElementById("pwd");
        let show = document.getElementById("show-eye");
        let hide = document.getElementById("hide-eye");
        hide.classList.remove("d-none");

        if (pwd.type === "password") {
            pwd.type = "text";
            show.style.display = "none";
            hide.style.display = "block";
        } else {
            pwd.type = "password";
            show.style.display = "block";
            hide.style.display = "none";
        }
    }
    </script>
</head>
<body>
    <div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">Webboard SsxnN</h1>
    <?php include "nav.php" ?>
    <div class="row mt-4">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
        <?php
            if (isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
                unset($_SESSION['error']);
            } 
        ?>
        <div class="card">
        <h5 class="card-header">เข้าสู่ระบบ</h5>
            <div class="card-body">
            <form action="verify.php" method="post">
                <div class="form-group mb-3">
                    <label for="Login" class="form-label">Login:</label>
                    <input id="Login" type="text" class="form-control" name="Login">
                </div>
                <div class="form-group mb-3">
                    <label for="Password" class="form-label">Password:</label>
                    <div class="input-group">
                        <input id="pwd" type="password" class="form-control" name="Password">
                        <span class="input-group-text" onclick="password_show_hide()">
                            <i id="show-eye" class="bi bi-eye-fill"></i>
                            <i id="hide-eye" class="bi bi-eye-slash-fill d-none"></i>
                        </span>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-sm me-3">Login</button>
                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    <center>
    <p class="mt-3">ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></p>
    </center>
    </div>
</body>
</html>