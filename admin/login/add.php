<?php
include '../includes/auth.php';
include '../../config/db.php';

if ($_POST) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    mysqli_query(
        $conn,
        "INSERT INTO users (name, email, password)
         VALUES ('$name', '$email', '$password')"
    );

    $success = "User added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">

<h2>Add User</h2>

<?php if (isset($success)) { ?>
    <p class="success"><?= $success ?></p>
<?php } ?>

<form method="post">
    <label>Full Name</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Save</button>
</form>

<a href="edit.php" class="back-link">⬅ Back to User Management</a>

</div>
</body>
</html>
