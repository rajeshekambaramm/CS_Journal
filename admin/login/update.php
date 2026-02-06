<?php
include '../includes/auth.php';
include '../../config/db.php';

$id = $_GET['id'] ?? 0;

$res = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE id=$id"
);

$data = mysqli_fetch_assoc($res);

if (!$data) {
    die("Invalid User");
}

if (isset($_POST['update'])) {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = $_POST['password'];

    // If password field is filled → update password
    if (!empty($new_password)) {
        $hashed = md5($new_password);

        mysqli_query(
            $conn,
            "UPDATE users 
             SET name='$name',
                 email='$email',
                 password='$hashed'
             WHERE id=$id"
        );
    } else {
        // Update without changing password
        mysqli_query(
            $conn,
            "UPDATE users 
             SET name='$name',
                 email='$email'
             WHERE id=$id"
        );
    }

    header("Location: edit.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">

<h2>Edit User</h2>

<form method="post">
    <label>Full Name</label>
    <input type="text" name="name"
           value="<?= htmlspecialchars($data['name']) ?>" required>

    <label>Email</label>
    <input type="email" name="email"
           value="<?= htmlspecialchars($data['email']) ?>" required>

    <label>New Password</label>
    <input type="password" name="password"
           placeholder="Leave blank to keep current password">

    <button type="submit" name="update">Update</button>
</form>

<a href="edit.php" class="back-link">⬅ Back</a>

</div>
</body>
</html>
