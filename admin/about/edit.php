<?php 
include '../includes/auth.php';
include '../../config/db.php';

$result = mysqli_query(
    $conn,
    "SELECT * FROM about_sections 
     ORDER BY updated_at DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage About Sections</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="page-container">

    <h2>About Page Management</h2>

    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Last Updated</th>
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
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= nl2br(htmlspecialchars(substr($row['content'], 0, 120))) ?>...</td>
                    <td><?= date('d M Y', strtotime($row['updated_at'])) ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a> |
                        <a href="delete.php?id=<?= $row['id'] ?>"
                           class="delete"
                           onclick="return confirm('Delete this section?')">
                           Delete
                        </a>
                    </td>
                </tr>
        <?php }
        } else { ?>
            <tr>
                <td colspan="5" style="text-align:center;">No About sections found</td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <a href="../index.php" class="back-link">⬅ Back to Dashboard</a>

</div>

</body>
</html>
