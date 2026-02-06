<?php
include '../includes/auth.php';
include '../../config/db.php';

$success = '';
$error = '';

if (isset($_POST['submit'])) {
    $article_type   = $_POST['article_type'];
    $access_type    = $_POST['access_type'];
    $title          = mysqli_real_escape_string($conn, $_POST['title']);
    $authors        = mysqli_real_escape_string($conn, $_POST['authors']);
    $journal_info   = mysqli_real_escape_string($conn, $_POST['journal_info']);
    $published_date = $_POST['published_date'];

    // PDF upload
    if (!empty($_FILES['pdf']['name'])) {
        $pdf_original_name = $_FILES['pdf']['name'];
        $pdf_file = time() . "_" . $pdf_original_name;

        // Corrected path
        $target = "../uploads/pdfs/" . $pdf_file;

        // Create directory if not exists
        $upload_dir = "../uploads/pdfs/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $ext = strtolower(pathinfo($pdf_original_name, PATHINFO_EXTENSION));

        if ($ext !== "pdf") {
            $error = "Only PDF files are allowed!";
        } else {
            if (move_uploaded_file($_FILES['pdf']['tmp_name'], $target)) {

                mysqli_query(
                    $conn,
                    "INSERT INTO articles
                    (article_type, access_type, title, authors, journal_info, published_date, pdf_file, pdf_original_name)
                    VALUES
                    ('$article_type', '$access_type', '$title', '$authors', '$journal_info', '$published_date', '$pdf_file', '$pdf_original_name')"
                );

                $success = "Article added successfully!";
            } else {
                $error = "Failed to upload PDF.";
            }
        }
    } else {
        $error = "Please select a PDF file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Article</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">

    <h2>Add New Article</h2>

    <?php if ($success) { ?>
        <p class="success"><?= $success ?></p>
    <?php } ?>

    <?php if ($error) { ?>
        <p class="error"><?= $error ?></p>
    <?php } ?>

    <form method="post" enctype="multipart/form-data">

        <label>Article Type</label>
        <select name="article_type" required>
            <option value="Research Article">Research Article</option>
            <option value="Review Article">Review Article</option>
        </select>

        <label>Access Type</label>
        <select name="access_type" required>
            <option value="Open Access">Open Access</option>
            <option value="Restricted">Restricted</option>
        </select>

        <label>Title</label>
        <input type="text" name="title" required>

        <label>Authors</label>
        <input type="text" name="authors" required>

        <label>Journal Info</label>
        <input type="text" name="journal_info" required>

        <label>Published Date</label>
        <input type="date" name="published_date" required>

        <label>Upload PDF</label>
        <input type="file" name="pdf" accept="application/pdf" required>

        <button type="submit" name="submit">Save Article</button>
    </form>

    <a href="../index.php" class="back-link">⬅ Back to Dashboard</a>

</div>

</body>
</html>
