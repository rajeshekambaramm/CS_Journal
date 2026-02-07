<?php
include '../includes/auth.php';
include '../../config/db.php';

// Fetch all organization members
$result = mysqli_query($conn, "SELECT * FROM organizational_members ORDER BY section, id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Organizational Members</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">

    <h2>Organizational Structure</h2>

    <a href="../index.php" class="back-link" style="margin-left:10px;">⬅ Back to Dashboard</a>
    <a href="add.php" class="back">➕ Add Member</a>

    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Section</th>
                <th>Role</th>
                <th>Name</th>
                <th>Category</th>
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
                    <td><?= htmlspecialchars($row['section']) ?></td>
                    <td><?= htmlspecialchars($row['role']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['category']) ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a> |
                        <a href="delete.php?id=<?= $row['id'] ?>" class="delete" 
                           onclick="return confirm('Delete this member?')">Delete</a>
                    </td>
                </tr>
        <?php }
        } else { ?>
            <tr>
                <td colspan="6" style="text-align:center;">No Organizational Members found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>
