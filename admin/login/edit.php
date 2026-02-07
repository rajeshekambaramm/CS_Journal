<?php
include '../includes/auth.php';
include '../../config/db.php';

$result = mysqli_query(
    $conn,
    "SELECT * FROM users ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">

<h2>User Management</h2>
<a href="../index.php" class="back-link">⬅ Back to Dashboard</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

<?php
if ($result && mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>"
                   class="delete"
                   onclick="return confirm('Delete this user?')">
                   Delete
                </a>
            </td>
        </tr>
<?php }
} else { ?>
    <tr>
        <td colspan="4" style="text-align:center;">No users found</td>
    </tr>
<?php } ?>

    </tbody>
</table>



</div>
</body>
</html>
