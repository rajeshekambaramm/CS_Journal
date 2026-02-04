<?php
include '../../config/db.php';
include '../includes/auth.php';

$success = '';
$error = '';

if (isset($_POST['submit'])) {
    $article_type = $_POST['article_type'];
    $access_type  = $_POST['access_type'];
    $title        = mysqli_real_escape_string($conn, $_POST['title']);
    $authors      = mysqli_real_escape_string($conn, $_POST['authors']);
    $journal_info = mysqli_real_escape_string($conn, $_POST['journal_info']);
    $published_date = $_POST['published_date'];

    // PDF upload
    if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
        $pdf_original_name = $_FILES['pdf']['name'];
        $pdf_file = time() . "_" . $pdf_original_name;
        $target = "../../uploads/pdfs/" . $pdf_file;

        $ext = strtolower(pathinfo($pdf_original_name, PATHINFO_EXTENSION));
        if ($ext != "pdf") {
            $error = "Only PDF files are allowed!";
        } else {
            if (move_uploaded_file($_FILES['pdf']['tmp_name'], $target)) {
                $query = "INSERT INTO articles 
                    (article_type, access_type, title, authors, journal_info, published_date, pdf_file, pdf_original_name)
                    VALUES 
                    ('$article_type', '$access_type', '$title', '$authors', '$journal_info', '$published_date', '$pdf_file', '$pdf_original_name')";
                mysqli_query($conn, $query);
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
<html>
<head>
    <title>Add Article</title>
</head>
<body>

<h2>Add New Article</h2>

<?php if($success) echo "<p style='color:green;'>$success</p>"; ?>
<?php if($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" enctype="multipart/form-data">
    <label>Article Type</label><br>
    <select name="article_type" required>
        <option value="Research Article">Research Article</option>
        <option value="Review Article">Review Article</option>
    </select><br><br>

    <label>Access Type</label><br>
    <select name="access_type" required>
        <option value="Open Access">Open Access</option>
        <option value="Restricted">Restricted</option>
    </select><br><br>

    <input type="text" name="title" placeholder="Title" required><br><br>
    <input type="text" name="authors" placeholder="Authors" required><br><br>
    <input type="text" name="journal_info" placeholder="Journal Info" required><br><br>
    <input type="date" name="published_date" required><br><br>

    <label>Upload PDF</label><br>
    <input type="file" name="pdf" accept="application/pdf" required><br><br>

    <button type="submit" name="submit">Add Article</button>
</form>

<br>
<a href="../index.php">⬅ Back to Dashboard</a>

</body>
</html>
