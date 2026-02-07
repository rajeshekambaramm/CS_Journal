<?php
include '../includes/auth.php';
include '../../config/db.php';

// Get member ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: edit.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch member data
$result = mysqli_query($conn, "SELECT * FROM organizational_members WHERE id = $id");
$member = mysqli_fetch_assoc($result);

// Handle update
if (isset($_POST['update'])) {
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    mysqli_query(
        $conn,
        "UPDATE organizational_members 
         SET section='$section', role='$role', name='$name', category='$category'
         WHERE id=$id"
    );

    echo "<script>alert('Member updated successfully'); window.location='edit.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Organizational Member</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

    <div class="page-container">

        <a href="edit.php" class="back-link">⬅ Back to Members List</a>
        <h2>Edit Organizational Member</h2>


        <form method="post">
            <label>Section</label>
            <input type="text" name="section" value="<?= htmlspecialchars($member['section']) ?>" required>

            <label>Role (Optional)</label>
            <input type="text" name="role" value="<?= htmlspecialchars($member['role']) ?>">

            <label>Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($member['name']) ?>" required>

            <label>Category</label>
            <select name="category">
                <option value="Internal" <?= $member['category'] == 'Internal' ? 'selected' : '' ?>>Internal</option>
                <option value="External" <?= $member['category'] == 'External' ? 'selected' : '' ?>>External</option>
                <option value="International" <?= $member['category'] == 'International' ? 'selected' : '' ?>>International
                </option>
            </select>

            <button type="submit" name="update">Update Member</button>
        </form>

    </div>

</body>

</html>