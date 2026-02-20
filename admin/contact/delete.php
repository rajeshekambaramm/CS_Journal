<?php
session_start();
include '../../config/db.php';

/* Check ID */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

/* Check if message exists */
$stmt = $conn->prepare("SELECT id FROM contact_messages WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    $stmt->close();
    header("Location: index.php");
    exit();
}
$stmt->close();

/* Delete message */
$stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

/* Redirect */
header("Location: view.php?deleted=1");
exit();