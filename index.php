<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard Kakkak</h1>
        <nav class="navbar navbar-expand-lg" style="background-color: #d3d3d3;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                <ul class="navbar-nav">
                    <?php
                        if (!isset($_SESSION['id'])) {
                            echo "<li class='nav-item'>";
                            echo "<a class='btn btn-outline-secondary btn-sm' href='login.php'><i class='bi bi-pencil-square'></i> เข้าสู่ระบบ</a>";
                            echo "</li>";
                        }
                        else {
                            echo "<li class='nav-item dropdown'>";
                            echo "<a class='btn btn-outline-secondary btn-sm dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='bi bi-person-lines-fill'></i> $_SESSION[username]&nbsp
                                </a>";
                            echo "<ul class='dropdown-menu'>";
                            echo "<li><a class='btn btn-sm dropdown-item' href='logout.php'><i class='bi bi-power'></i> ออกจากระบบ</a></li>";
                            echo "</ul>";
                            echo "</li>";
                        }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="mt-3">
        <label>หมวดหมู่ :</label>
                <button class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown">--ทั้งหมด--</button>
                    <ul class="dropdown-menu" aria-labelledby="Button2">
                        <li><a href="#" class="dropdwon-item">--ทั้งหมด--</a></li>
                        <?php 
                            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                            $sql = "SELECT * FROM category";
                            foreach($conn->query($sql) as $row){
                                echo"<li><a class='dropdown-item' href='#'>".$row["name"]."</a></li>";
                            }
                            $conn=null;
                        ?>
                    </ul>
            <?php
                if (isset($_SESSION['id'])) {
                    echo "<a href='newpost.php' class='btn btn-success btn-sm' style='float : right;'><i class='bi bi-plus'></i> สร้างกระทู้ใหม่</a>";
                }
            ?>
        </div>
        <div class="mt-3">
        <table class='table table-striped'>  
            <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql="SELECT t3.name,t1.title,t1.id,"

            ?>
        </table>
        </div>
    </div>
</body>
</html>