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
    <script>
        function sure(){
            let r = confirm("ต้องการจะลบจริงหรือไม่");
            return r;
        }
    </script>
</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard SsxnN</h1>
        <?php include "nav.php" ?>
        <div class="mt-3">
        <label>หมวดหมู่ :</label>
            <span class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown">--ทั้งหมด--</button>
                <ul class="dropdown-menu" aria-labelledby="Button2">
                    <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                        $sql = "SELECT * FROM category";
                        foreach($conn->query($sql) as $row){
                            echo "<li><a class='dropdown-item' href='?cat=$row[name]'>$row[name]</a></li>";
                        }
                        $conn = null;
                    ?>
                </ul>
            </span>
            <?php
                if (isset($_SESSION['id'])) {
                    echo "<a href='newpost.php' class='btn btn-success btn-sm' style='float : right;'><i class='bi bi-plus'></i> สร้างกระทู้ใหม่</a>";
                }
            ?>
        </div>
        <div class="mt-3">
        <table class='table table-striped'>  
        <?php
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $sql = "SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date FROM post as t1
                    INNER JOIN user as t2 ON (t1.user_id=t2.id)
                    INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch()){
                if (isset($_GET["cat"]) && $_GET["cat"] == $row[0]) {
                echo "<tr><td>[ $row[0] ]<a href=post.php?id=$row[2]
                style=text-decoration:none> $row[1] </a><br>$row[3] - $row[4]</td>";
                }
                else if (!isset($_GET["cat"])) {
                    echo "<tr><td>[ $row[0] ]<a href=post.php?id=$row[2]
                    style=text-decoration:none> $row[1] </a><br>$row[3] - $row[4]</td>";
                }
                if (isset($_SESSION['id']) && $_SESSION['role'] == "a"){
                    echo "<td><a href='delete.php?id=$row[2]' class='btn btn-danger btn-sm float-end' onclick='return sure()'><i class='bi bi-trash'></i></a>";
                }
                else if (isset($_SESSION['id']) && $_SESSION['username'] == $row[3]){
                    echo "<td><a href='delete.php?id=$row[2]' class='btn btn-danger btn-sm float-end' onclick='return sure()'><i class='bi bi-trash'></i></a>";
                }
                // if (isset($_SESSION['id']) && $_SESSION['username'] == $row[3]){
                //     echo "<a href='editpost.php?id=$row[2]' class='btn btn-warning btn-sm float-end me-2'><i class='bi bi-pencil-fill'></i></a></td>";
                // }
                echo "</tr>";
            }
            $conn = null;
        ?>
        </table>
        </div>
    </div>
</body>
</html>