<?php
include '../includes/auth.php';
include '../../config/db.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    mysqli_query(
        $conn,
        "DELETE FROM content_management 
         WHERE id=$id AND page_name='about'"
    );
}

header("Location: edit.php");
exit;
