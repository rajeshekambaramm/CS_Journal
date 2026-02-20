<?php
session_start();
include '../config/db.php';

$success = '';
$error = '';

if (isset($_POST['send'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {

        $insert = "INSERT INTO contact_messages (name, email, subject, message)
                   VALUES ('$name', '$email', '$subject', '$message')";

        if (mysqli_query($conn, $insert)) {
            $success = "Your message has been sent successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }

    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us - Journal of Computer Science</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <?php include '../includes/header.php'; ?>

    <div class="container" style="margin: 20px 100px;">
        <main class="content">

            <h1>Contact Us</h1>

            <!-- 🔹 TOP CONTACT INFORMATION SECTION -->
            <div class="card">
                <h3>Journal Contact Information</h3>
                <p><strong>Address:</strong> Department of Computer Science,
                <p>Bishop Heber College (Autonomous),</p>
                <p>Tiruchirappalli – Tamil Nadu, India</p>
                <p><strong>Email:</strong> journal@IJACSI.com</p>
                <p><strong>Phone:</strong> +123 456 7890</p>
                <p><strong>Office Hours:</strong> Monday – Friday, 9:00 AM – 5:00 PM</p>
            </div>

            <?php if ($success) { ?>
                <div class="card" style="background:#d4edda; color:#155724;">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php } ?>

            <?php if ($error) { ?>
                <div class="card" style="background:#f8d7da; color:#721c24;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php } ?>

            <!-- 🔹 CONTACT FORM -->
            <div class="card">

                <form method="post">

                    <label>Full Name</label>
                    <input type="text" name="name" required class="form-input">

                    <label>Email Address</label>
                    <input type="email" name="email" required class="form-input">

                    <label>Subject</label>
                    <input type="text" name="subject" required class="form-input">

                    <label>Message</label>
                    <textarea name="message" rows="5" required class="form-input"></textarea>

                    <button type="submit" name="send" class="btn-primary">
                        Send Message
                    </button>
                </form>
            </div>

        </main>
    </div>

    <?php include '../includes/footer.php'; ?>

</body>

</html>