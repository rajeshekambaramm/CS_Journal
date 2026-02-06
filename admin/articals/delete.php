<?php
include '../includes/auth.php';
include '../../config/db.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    // Get PDF file name
    $res = mysqli_query($conn, "SELECT pdf_file FROM articles WHERE id=$id");
    $row = mysqli_fetch_assoc($res);

    if ($row && file_exists("../../uploads/pdfs/".$row['pdf_file'])) {
        unlink("../../uploads/pdfs/".$row['pdf_file']);
    }

    // Delete article
    mysqli_query($conn, "DELETE FROM articles WHERE id=$id");
}

header("Location: edit.php");
exit;
