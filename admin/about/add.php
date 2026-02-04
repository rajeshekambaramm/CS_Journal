<?php
include '../../config/db.php';
include '../includes/auth.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "INSERT INTO content_management (page_name, title, content)
              VALUES ('about', '$title', '$content')";
    mysqli_query($conn, $query);

    echo "<script>alert('Content Added');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add About Content</title>
     <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<h2>Add About Content</h2>
<a href="../index.php">⬅ Back to Dashboard</a>
<form method="post">
    <input type="text" name="title" placeholder="Title" rows="6" cols="180" required><br><br>
    <textarea name="content" placeholder="Content" rows="6" cols="180" required></textarea><br><br>
    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>
