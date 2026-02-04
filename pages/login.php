<?php
session_start();
include '../config/db.php';
include '../includes/header.php';



$error = '';

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'dashboard.php';
    header("Location: $redirect");
    exit();
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // plaintext password from form

    // Fetch user from database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify password (use md5 if your DB stores md5)
        if (md5($password) === $row['password']) { 
            $_SESSION['user'] = $email;

            // Redirect to intended page or dashboard
            $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'dashboard.php';
            header("Location: $redirect");
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        
        body { font-family: Arial; background: #f0f2f5; }
        .container { width: 500px; margin: 50px auto; }
        .card { background: #fff; padding: 20px; margin-bottom: 20px; box-shadow: 0 0 10px #ccc; }
        h2, h3 { margin-top: 0; }
        input[type=email], input[type=password] { width: 100%; padding: 8px; margin: 5px 0 10px 0; }
        button { padding: 10px 15px; background: #007bff; color: #fff; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">

    <!-- Login Card -->
    <div class="card">
        <h2>Welcome to Journal of Computer Science</h2>
        <p>Please login to continue</p>
        <?php if($error) echo "<p class='error'>$error</p>"; ?>
        <form method="post">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Email Address" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="login">Log In</button>
        </form>
       <!-- <p><a href="forgot_password.php">Forgot Password?</a></p> -->
    </div>

    <!-- Resources Card -->
    <div class="card">
        <h3>Resources</h3>
        <p><a href="../index.php">Home Page</a></p>
        <p><a href="create_account.php">Create an Account</a></p>
        <p><a href="#">Author Guidelines</a></p>
        <p><a href="#">Editor Guidelines</a></p>
    </div>

</div>

</body>
</html>
