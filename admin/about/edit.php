<?php
include '../../config/db.php';
include '../includes/auth.php';

// If update form submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $update = "UPDATE content_management 
               SET title='$title', content='$content' 
               WHERE id='$id'";
    mysqli_query($conn, $update);

    echo "<script>alert('Section Updated');</script>";
}

// Fetch all About sections
$result = mysqli_query($conn, "SELECT * FROM content_management WHERE page_name='about'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit About Sections</title>
</head>
<body>

<h2>Edit About Page Sections</h2>
<a href="../index.php">⬅ Back to Dashboard</a>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <form method="post" style="border:1px solid #ccc; padding:15px; margin-bottom:15px;">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <label>Section Title</label><br>
        <input 
            type="text" 
            name="title" 
            value="<?= htmlspecialchars($row['title']) ?>" 
            required
        ><br><br>

        <label>Content</label><br>
        <textarea 
            name="content" 
            rows="5" 
            cols="60" 
            required
        ><?= htmlspecialchars($row['content']) ?></textarea><br><br>

        <button type="submit" name="update">Update Section</button>
    </form>
<?php } ?>
</body>
</html>
