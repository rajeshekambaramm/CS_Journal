<?php
include '../../config/db.php';
include '../includes/auth.php';

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query(
        $conn,
        "UPDATE current_updates 
         SET title='$title', description='$description'
         WHERE id=$id"
    );

    echo "<script>alert('Update Modified');</script>";
}

// Fetch all updates
$result = mysqli_query($conn, "SELECT * FROM current_updates ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Current Updates</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">
    <h2>Edit Current Updates</h2>
    <a class="back-link" href="../index.php">⬅ Back to Dashboard</a>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <form method="post" class="edit-form">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <input type="text" name="title"
                   value="<?= htmlspecialchars($row['title']) ?>" required>

            <textarea name="description" required><?= htmlspecialchars($row['description']) ?></textarea>

            <button type="submit" name="update">Update</button>
        </form>
    <?php } ?>
</div>

</body>
</html>
