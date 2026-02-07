<?php
include '../../config/db.php';
include '../includes/auth.php';

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query(
        $conn,
        "INSERT INTO current_updates (title, description)
         VALUES ('$title', '$description')"
    );

    echo "<script>alert('Current Update Added');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Current Update</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">
    <a class="back-link" href="../index.php">⬅ Back to Dashboard</a>
    <h2>Add Current Update</h2>

    <form method="post">
        <input type="text" name="title" placeholder="Update Title" required>
        <textarea name="description" placeholder="Update Description" required></textarea>
        <button type="submit" name="submit">Save</button>
    </form>
</div>

</body>
</html>
