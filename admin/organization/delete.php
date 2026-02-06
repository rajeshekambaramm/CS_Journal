<?php
include '../includes/auth.php';
include '../../config/db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: edit.php");
    exit();
}

$id = intval($_GET['id']);

// Delete the member
mysqli_query($conn, "DELETE FROM organizational_members WHERE id = $id");

header("Location: edit.php");
exit();
