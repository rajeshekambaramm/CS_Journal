<?php
include '../includes/auth.php';
include '../../config/db.php';

$id = $_GET['id'] ?? 0;

$res = mysqli_query(
    $conn,
    "SELECT * FROM content_management 
     WHERE id=$id AND page_name='about'"
);

$data = mysqli_fetch_assoc($res);

if (!$data) {
    die("Invalid About Section");
}

if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    mysqli_query(
        $conn,
        "UPDATE content_management 
         SET title='$title', content='$content'
         WHERE id=$id"
    );

    header("Location: edit.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit About Section</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">

<h2>Edit About Section</h2>

<form method="post">
    <label>Title</label>
    <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" required>

    <label>Content</label>
    <textarea name="content" rows="6" required><?= htmlspecialchars($data['content']) ?></textarea>

    <button type="submit" name="update">Update</button>
</form>

<a href="edit.php" class="back-link">⬅ Back</a>

</div>
</body>
</html>
