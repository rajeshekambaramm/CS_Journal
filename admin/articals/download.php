<?php
include '../../config/db.php';

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT pdf_file, pdf_original_name FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        // Correct path to admin/uploads/pdfs
        $filePath = __DIR__ . '/../uploads/pdfs/' . $row['pdf_file'];
        $fileName = $row['pdf_original_name'];

        if (file_exists($filePath)) {

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
            echo "File not found on server.";
        }

    } else {
        echo "Invalid file ID.";
    }

} else {
    echo "No file specified.";
}
