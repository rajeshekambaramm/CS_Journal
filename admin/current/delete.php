<?php
include '../includes/auth.php';
include '../../config/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($conn, "DELETE FROM current_updates WHERE id=$id");
}

header("Location: edit.php");
exit();
?>
