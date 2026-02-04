<?php
include '../../config/db.php'; // adjust path if needed

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Get the file info from DB
    $query = mysqli_query($conn, "SELECT pdf_file, pdf_original_name FROM articles WHERE id=$id");
    if ($row = mysqli_fetch_assoc($query)) {
        $filePath = __DIR__ . '/../../uploads/pdfs/' . $row['pdf_file']; // adjust relative path
        $fileName = $row['pdf_original_name'];

        if (file_exists($filePath)) {
            // Force download headers
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid file ID.";
    }
} else {
    echo "No file specified.";
}
