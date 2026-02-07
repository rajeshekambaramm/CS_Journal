<?php
include '../includes/auth.php';
include '../../config/db.php';

$id = $_GET['id'] ?? 0;

// Fetch article
$result = mysqli_query($conn, "SELECT * FROM articles WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Invalid Article ID");
}

// Update article
if (isset($_POST['update'])) {
    $article_type = $_POST['article_type'];
    $access_type = $_POST['access_type'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $authors = mysqli_real_escape_string($conn, $_POST['authors']);
    $journal_info = mysqli_real_escape_string($conn, $_POST['journal_info']);
    $published_date = $_POST['published_date'];

    // PDF handling
    $pdf_file = $data['pdf_file'];
    $pdf_original_name = $data['pdf_original_name'];

    if (!empty($_FILES['pdf']['name'])) {
        $pdf_original_name = $_FILES['pdf']['name'];
        $pdf_file = time() . "_" . $pdf_original_name;
        $target = "../../uploads/pdfs/" . $pdf_file;

        $ext = strtolower(pathinfo($pdf_original_name, PATHINFO_EXTENSION));
        if ($ext != 'pdf') {
            $error = "Only PDF files are allowed";
        } else {
            move_uploaded_file($_FILES['pdf']['tmp_name'], $target);
            if (file_exists("../../uploads/pdfs/" . $data['pdf_file'])) {
                unlink("../../uploads/pdfs/" . $data['pdf_file']);
            }
        }
    }

    if (!isset($error)) {
        mysqli_query($conn, "UPDATE articles SET
            article_type='$article_type',
            access_type='$access_type',
            title='$title',
            authors='$authors',
            journal_info='$journal_info',
            published_date='$published_date',
            pdf_file='$pdf_file',
            pdf_original_name='$pdf_original_name'
            WHERE id=$id
        ");

        header("Location: edit.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Article</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

    <div class="page-container">

        <a href="edit.php" class="back-link">⬅ Back</a>
        <h2>Edit Article</h2>

        <?php if (isset($error)) { ?>
            <p class="error"><?= $error ?></p>
        <?php } ?>

        <form method="post" enctype="multipart/form-data">

            <label>Article Type</label>
            <select name="article_type" required>
                <option value="Research Article" <?= $data['article_type'] == 'Research Article' ? 'selected' : '' ?>>
                    Research Article
                </option>
                <option value="Review Article" <?= $data['article_type'] == 'Review Article' ? 'selected' : '' ?>>
                    Review Article
                </option>
            </select>

            <label>Access Type</label>
            <select name="access_type" required>
                <option value="Open Access" <?= $data['access_type'] == 'Open Access' ? 'selected' : '' ?>>
                    Open Access
                </option>
                <option value="Restricted" <?= $data['access_type'] == 'Restricted' ? 'selected' : '' ?>>
                    Restricted
                </option>
            </select>

            <label>Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" required>

            <label>Authors</label>
            <input type="text" name="authors" value="<?= htmlspecialchars($data['authors']) ?>" required>

            <label>Journal Info</label>
            <input type="text" name="journal_info" value="<?= htmlspecialchars($data['journal_info']) ?>" required>

            <label>Published Date</label>
            <input type="date" name="published_date" value="<?= $data['published_date'] ?>" required>

            <label>Current PDF</label>
            <p>
                <a href="../../uploads/pdfs/<?= $data['pdf_file'] ?>" target="_blank">
                    <?= $data['pdf_original_name'] ?>
                </a>
            </p>

            <label>Replace PDF (optional)</label>
            <input type="file" name="pdf" accept="application/pdf">

            <button type="submit" name="update">Update Article</button>
        </form>



    </div>

</body>

</html>