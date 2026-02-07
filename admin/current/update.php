<?php
include '../includes/auth.php';
include '../../config/db.php';

if (!isset($_GET['id'])) {
    header("Location: edit.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch the current update
$result = mysqli_query($conn, "SELECT * FROM current_updates WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Update not found!";
    exit();
}

// Handle POST update
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query($conn, "UPDATE current_updates 
                         SET title='$title', description='$description' 
                         WHERE id=$id");

    header("Location: edit.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Current Update</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">
    <a href="edit.php" class="back-link">⬅ Back to Current Updates</a>
    <h2>Edit Current Update</h2>

    <form method="post">
        <label>Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>

        <label>Description</label>
        <textarea name="description" required><?= htmlspecialchars($row['description']) ?></textarea>

        <button type="submit" name="submit">Update</button>
    </form>

    <a href="edit.php" class="back-link">⬅ Back to Current Updates</a>
</div>

</body>
</html>
