<?php
include '../../config/db.php';
include '../includes/auth.php';

if (isset($_POST['submit'])) {
    $section  = $_POST['section'];
    $role     = $_POST['role'];
    $name     = $_POST['name'];
    $category = $_POST['category'];

    $query = "INSERT INTO organizational_members (section, role, name, category)
              VALUES ('$section', '$role', '$name', '$category')";
    mysqli_query($conn, $query);

    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Organization Member</title>
    <link rel="stylesheet" href="../assets/admin.css">
</head>
<body>

<h2>Add Organizational Member</h2>
<a href="view.php">⬅ Back</a>

<form method="post">
    <label>Section</label>
    <input type="text" name="section" required>

    <label>Role (Optional)</label>
    <input type="text" name="role">

    <label>Name</label>
    <input type="text" name="name" required>

    <label>Category</label>
    <select name="category">
        <option value="Internal">Internal</option>
        <option value="External">External</option>
        <option value="International">International</option>
    </select>

    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>
