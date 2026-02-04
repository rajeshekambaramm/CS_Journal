<?php
include '../includes/auth.php';
include '../../config/db.php';

if ($_POST) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query(
        $conn,
        "INSERT INTO announcements (title, description) VALUES ('$title','$description')"
    );

    $success = "Announcement added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Announcement</title>
</head>
<body>

<h2>Add Announcement</h2>

<?php if (isset($success)) echo "<p>$success</p>"; ?>

<form method="post">
    <input type="text" name="title" placeholder="Announcement Title" required><br><br>
    <textarea name="description" placeholder="Announcement Description" required></textarea><br><br>
    <button type="submit">Save</button>
</form>

<br>
<a href="../index.php">⬅ Back to Dashboard</a>

</body>
</html>
