<?php
include '../../config/db.php';
include '../includes/auth.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM organizational_members WHERE id=$id");
}

header("Location: view.php");
