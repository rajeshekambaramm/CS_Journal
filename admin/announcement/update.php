<?php
include '../includes/auth.php';
include '../../config/db.php';

$id = $_GET['id'] ?? 0;

// Fetch announcement
$res = mysqli_query($conn, "SELECT * FROM announcements WHERE id=$id");
$data = mysqli_fetch_assoc($res);

if (!$data) {
    die("Invalid Announcement ID");
}

// Update
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query(
        $conn,
        "UPDATE announcements 
         SET title='$title', description='$description' 
         WHERE id=$id"
    );

    header("Location: edit.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Announcement</title>
    <link rel="stylesheet" href="../assets/css/admin.css">

</head>
<body>

<div class="page-container">

    <h2>Edit Announcement</h2>

    <form method="post">
        <label>Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" required>

        <label>Description</label>
        <textarea name="description" required><?= htmlspecialchars($data['description']) ?></textarea>

        <button type="submit" name="update">Update</button>
    </form>

    <br>
    <a href="edit.php" class="back-link">⬅ Back</a>

</div>

</body>
</html>
