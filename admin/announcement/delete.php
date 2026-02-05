<?php
include '../includes/auth.php';
include '../../config/db.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    mysqli_query($conn, "DELETE FROM announcements WHERE id=$id");
}

header("Location: edit.php");
exit;
