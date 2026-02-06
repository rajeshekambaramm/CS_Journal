<?php
include '../includes/auth.php';
include '../../config/db.php';

if ($_POST) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query(
        $conn,
        "INSERT INTO announcements (title, description)
         VALUES ('$title', '$description')"
    );

    $success = "Announcement added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Announcement</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">

    <h2>Add Announcement</h2>

    <?php if (isset($success)) { ?>
        <p class="success"><?= $success ?></p>
    <?php } ?>

    <form method="post">

        <label>Announcement Title</label>
        <input
            type="text"
            name="title"
            placeholder="Enter announcement title"
            required
        >

        <label>Announcement Description</label>
        <textarea
            name="description"
            rows="6"
            placeholder="Enter announcement description"
            required
        ></textarea>

        <button type="submit">Save Announcement</button>

    </form>

    <a href="../index.php" class="back-link">⬅ Back to Dashboard</a>

</div>

</body>
</html>
