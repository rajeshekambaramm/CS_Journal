<?php
include '../includes/auth.php';
include '../../config/db.php';

// Update announcement
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query(
        $conn,
        "UPDATE announcements 
         SET title='$title', description='$description' 
         WHERE id='$id'"
    );

    $success = "Announcement updated successfully!";
}

// Fetch all announcements
$result = mysqli_query(
    $conn,
    "SELECT * FROM announcements ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Announcements</title>
</head>
<body>

<h2>Edit Announcements</h2>

<?php if (isset($success)) echo "<p>$success</p>"; ?>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<form method="post" style="border:1px solid #ccc; padding:15px; margin-bottom:15px;">
    
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <input 
        type="text" 
        name="title" 
        value="<?= htmlspecialchars($row['title']) ?>" 
        required
    ><br><br>

    <textarea 
        name="description" 
        rows="4" 
        required
    ><?= htmlspecialchars($row['description']) ?></textarea><br><br>

    <button type="submit" name="update">Update</button>
</form>
<?php } ?>

<br>
<a href="../index.php">⬅ Back to Dashboard</a>

</body>
</html>
