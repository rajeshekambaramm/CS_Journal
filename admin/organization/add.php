<?php
include '../../config/db.php';
include '../includes/auth.php';

if (isset($_POST['submit'])) {
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $query = "INSERT INTO organizational_members (section, role, name, category)
              VALUES ('$section', '$role', '$name', '$category')";
    mysqli_query($conn, $query);

    header("Location: edit.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Organization Member</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

    <div class="page-container">

        <a href="edit.php" class="back-link">⬅ Back to Members List</a>
        <h2>Add Organizational Member</h2>

        <form method="post">
            <label>Section</label>
            <input type="text" name="section" placeholder="E.g., Patrons, Chief Editor" required>

            <label>Role (Optional)</label>
            <input type="text" name="role" placeholder="E.g., Editor-in-Chief">

            <label>Name</label>
            <input type="text" name="name" placeholder="Full Name" required>

            <label>Category</label>
            <select name="category">
                <option value="Internal">Internal</option>
                <option value="External">External</option>
                <option value="International">International</option>
            </select>

            <button type="submit" name="submit">Save Member</button>
        </form>

    </div>

</body>

</html>