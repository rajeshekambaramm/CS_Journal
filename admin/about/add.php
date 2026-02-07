<?php
include '../includes/auth.php';
include '../../config/db.php';

if ($_POST) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    mysqli_query(
        $conn,
        "INSERT INTO about_sections (title, content)
         VALUES ('$title', '$content')"
    );

    $success = "About section added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add About Section</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

    <div class="page-container">

        <a href="edit.php" class="back-link">⬅ Back to About Management</a>
        <h2>Add About Section</h2>

        <?php if (isset($success)) { ?>
            <p class="success"><?= $success ?></p>
        <?php } ?>

        <form method="post">
            <label>Title</label>
            <input type="text" name="title" required>

            <label>Content</label>
            <textarea name="content" rows="6" required></textarea>

            <button type="submit">Save</button>
        </form>

    </div>

</body>

</html>