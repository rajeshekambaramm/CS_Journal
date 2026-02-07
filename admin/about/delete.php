<?php
include '../includes/auth.php';
include '../../config/db.php';

/* Validate ID */
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    mysqli_query(
        $conn,
        "DELETE FROM about_sections WHERE id = $id"
    );
}

/* Redirect back */
header("Location: edit.php");
exit;
