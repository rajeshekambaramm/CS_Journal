<?php
include '../includes/auth.php';
include '../../config/db.php';

/* Fetch about sections using existing columns only */
$result = mysqli_query(
    $conn,
    "SELECT * FROM about_sections ORDER BY id DESC"
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

    <!-- Back link (top-right via CSS) -->
    <a href="../index.php" class="back-link">⬅ Back</a>

    <h2>About Page Management</h2>

    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td>
                    <?= nl2br(htmlspecialchars(substr($row['content'], 0, 120))) ?>...
                </td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" 
                       class="delete"
                       onclick="return confirm('Delete this section?')">
                        Delete
                    </a>
                </td>
            </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="4" style="text-align:center;">
                    No About sections found
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>
