<?php
include '../includes/auth.php';
include '../../config/db.php';

/* Validate ID */
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("Invalid ID");
}

/* Fetch existing record */
$res = mysqli_query(
    $conn,
    "SELECT * FROM about_sections WHERE id = $id"
);

$data = mysqli_fetch_assoc($res);

if (!$data) {
    die("Invalid About Section");
}

/* Update logic */
if (isset($_POST['update'])) {
    $title   = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    mysqli_query(
        $conn,
        "UPDATE about_sections 
         SET title = '$title', content = '$content'
         WHERE id = $id"
    );

    header("Location: edit.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit About Section</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

<div class="page-container">

    <a href="edit.php" class="back-link">⬅ Back</a>
    <h2>Edit About Section</h2>

    <form method="post">
        <label>Title</label>
        <input 
            type="text" 
            name="title" 
            value="<?= htmlspecialchars($data['title']) ?>" 
            required
        >

        <label>Content</label>
        <textarea 
            name="content" 
            rows="6" 
            required
        ><?= htmlspecialchars($data['content']) ?></textarea>

        <button type="submit" name="update">Update</button>
    </form>

</div>

</body>
</html>
