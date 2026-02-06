<?php
session_start();
include '../config/db.php';
include '../includes/header.php';

$error = '';

// Already logged in → redirect
if (isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}


if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (md5($password) === $row['password']) {
            $_SESSION['user'] = $email;
           $redirect = $_GET['redirect'] ?? '../index.php';
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Page-specific CSS -->
    <style>
        .login-page {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.12);
            margin-bottom: 20px;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .login-card p {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }

        .login-card label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .login-card input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-card button {
            width: 100%;
            padding: 10px;
            background: #06557c;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-card button:hover {
            background: #043f5d;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .resource-links a {
            display: block;
            margin: 8px 0;
            text-decoration: none;
            color: #06557c;
            font-weight: 500;
        }

        .resource-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="login-page">
    <div class="login-wrapper">

        <!-- LOGIN CARD -->
        <div class="login-card">
            <h2>Journal of Computer Science</h2>
            <p>Please log in to continue</p>

            <?php if ($error): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="post">
                <label>Email Address</label>
                <input type="email" name="email" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit" name="login">Log In</button>
            </form>
        </div>

        <!-- RESOURCES CARD -->
        <div class="login-card">
            <h3>Resources</h3>
            <div class="resource-links">
                <a href="../index.php">Home Page</a>
                <a href="create_account.php">Create an Account</a>
                <a href="../guidelines.php">Guidelines</a>
            </div>
        </div>

    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
