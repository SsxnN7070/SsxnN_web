<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != "a") {
    header("location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>User Management</title>
    <script>
        function setEditUserData(id, username, name, gender, email, role) {
            document.getElementById('editUserId').value = id;
            document.getElementById('editUsername').value = username;
            document.getElementById('editName').value = name;
            document.getElementById('editGender').value = gender;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;
        }
    </script>
</head>
<body>
    <div class="container text-center">
        <h1 class="mt-3">Webboard SsxnN - User Management</h1>
        <?php include "nav.php"; ?>
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-10 col-md-7 col-sm-5">
                <?php
                    if (isset($_SESSION['add_user'])) {
                        echo "<div class='alert alert-" . ($_SESSION['add_user'] == "success" ? "success" : "danger") . " mt-4'>"
                             . ($_SESSION['add_user'] == "success" ? "User added successfully" : "Failed to add user") . 
                             "</div>";
                        unset($_SESSION['add_user']);
                    }
                ?>
                <table class="table table-striped mt-4 ms-5">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เพศ</th>
                        <th>อีเมล</th>
                        <th>สิทธิ์</th>
                        <th>จัดการ</th>
                    </tr>
                    <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT id, login, name, gender, email, role FROM user";
                        foreach ($conn->query($sql) as $row) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['login']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['role']}</td>
                                <td>
                                    <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editUserModal'
                                            onclick=\"setEditUserData('{$row['id']}', '{$row['login']}', '{$row['name']}', '{$row['gender']}', '{$row['email']}', '{$row['role']}')\">
                                        <i class='bi bi-pencil-fill'></i>
                                    </button>
                                </td>
                            </tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edituser_save.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editUserId">
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editUsername" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editGender" class="form-label">Gender</label>
                            <select class="form-select" id="editGender" name="gender" required>
                                <option value="m">ชาย</option>
                                <option value="f">หญิง</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRole" class="form-label">Role</label>
                            <select class="form-select" id="editRole" name="role" required>
                                <option value="m">Member</option>
                                <option value="a">Admin</option>
                                <option value="b">Band</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
