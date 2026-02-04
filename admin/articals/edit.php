<?php
include '../../config/db.php';
include '../includes/auth.php';

$success = '';
$error = '';

// Fetch all articles
$result = mysqli_query($conn, "SELECT * FROM articles ORDER BY id DESC");

// Update form submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $article_type = $_POST['article_type'];
    $access_type  = $_POST['access_type'];
    $title        = mysqli_real_escape_string($conn, $_POST['title']);
    $authors      = mysqli_real_escape_string($conn, $_POST['authors']);
    $journal_info = mysqli_real_escape_string($conn, $_POST['journal_info']);
    $published_date = $_POST['published_date'];

    // Handle PDF upload if changed
    $pdf_name = $_POST['existing_pdf'];
    $pdf_original_name = $_POST['existing_pdf_original'];

    if (isset($_FILES['pdf_'.$id]) && $_FILES['pdf_'.$id]['name'] != "") {
        $pdf_original_name = $_FILES['pdf_'.$id]['name'];
        $pdf_name = time() . "_" . $pdf_original_name;
        $target = "../../uploads/pdfs/" . $pdf_name;

        $ext = strtolower(pathinfo($pdf_original_name, PATHINFO_EXTENSION));
        if ($ext != "pdf") {
            $error = "Only PDF files are allowed!";
        } else {
            if (move_uploaded_file($_FILES['pdf_'.$id]['tmp_name'], $target)) {
                // Delete old PDF
                if (file_exists("../../uploads/pdfs/".$_POST['existing_pdf'])) {
                    unlink("../../uploads/pdfs/".$_POST['existing_pdf']);
                }
            } else {
                $error = "Failed to upload PDF.";
            }
        }
    }

    if (!$error) {
        mysqli_query($conn, "UPDATE articles SET
            article_type='$article_type',
            access_type='$access_type',
            title='$title',
            authors='$authors',
            journal_info='$journal_info',
            published_date='$published_date',
            pdf_file='$pdf_name',
            pdf_original_name='$pdf_original_name'
            WHERE id=$id");
        $success = "Article updated successfully!";
        // Refresh article list
        $result = mysqli_query($conn, "SELECT * FROM articles ORDER BY id DESC");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Articles</title>
</head>
<body>

<h2>Edit Articles</h2>

<?php if($success) echo "<p style='color:green;'>$success</p>"; ?>
<?php if($error) echo "<p style='color:red;'>$error</p>"; ?>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<form method="post" enctype="multipart/form-data" style="border:1px solid #ccc; padding:15px; margin-bottom:15px;">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <input type="hidden" name="existing_pdf" value="<?= $row['pdf_file'] ?>">
    <input type="hidden" name="existing_pdf_original" value="<?= $row['pdf_original_name'] ?>">

    <label>Article Type</label><br>
    <select name="article_type" required>
        <option value="Research Article" <?= $row['article_type']=='Research Article'?'selected':'' ?>>Research Article</option>
        <option value="Review Article" <?= $row['article_type']=='Review Article'?'selected':'' ?>>Review Article</option>
    </select><br><br>

    <label>Access Type</label><br>
    <select name="access_type" required>
        <option value="Open Access" <?= $row['access_type']=='Open Access'?'selected':'' ?>>Open Access</option>
        <option value="Restricted" <?= $row['access_type']=='Restricted'?'selected':'' ?>>Restricted</option>
    </select><br><br>

    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" placeholder="Title" required><br><br>
    <input type="text" name="authors" value="<?= htmlspecialchars($row['authors']) ?>" placeholder="Authors" required><br><br>
    <input type="text" name="journal_info" value="<?= htmlspecialchars($row['journal_info']) ?>" placeholder="Journal Info" required><br><br>
    <input type="date" name="published_date" value="<?= $row['published_date'] ?>" required><br><br>

    <p>Current PDF: <a href="../../uploads/pdfs/<?= $row['pdf_file'] ?>" target="_blank"><?= $row['pdf_original_name'] ?></a></p>
    <input type="file" name="pdf_<?= $row['id'] ?>" accept="application/pdf"><br><br>

    <button type="submit" name="update">Update Article</button>
</form>
<?php } ?>

<br>
<a href="../index.php">⬅ Back to Dashboard</a>

</body>
</html>
