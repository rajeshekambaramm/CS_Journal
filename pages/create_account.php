<?php
session_start();
include '../config/db.php';
include '../includes/header.php';

$error = '';
$success = '';

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $error = "Passwords do not match";
    } else {
        $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Email already registered";
        } else {
            $hashed = md5($password);

            $insert = mysqli_query(
                $conn,
                "INSERT INTO users (name, email, password) 
                 VALUES ('$name', '$email', '$hashed')"
            );

            if ($insert) {
                $success = "Account created successfully. You can now login.";
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Page-specific CSS -->
</head>

<body>
    <!-- RESOURCES CARD -->
    <div class="auth-container">

        <div class="auth-card">
            <h2>Create an Account</h2>

            <?php if ($error)
                echo "<p class='error'>$error</p>"; ?>
            <?php if ($success)
                echo "<p class='success'>$success</p>"; ?>

            <form method="post">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>

                <button type="submit" name="register">Create Account</button>
            </form>

            <p class="auth-link">
                Already have an account?
                <a href="login.php">Login</a>
            </p>
        </div>

    </div>

</body>

</html>