<?php
include '../includes/auth.php';
include '../../config/db.php';

// Fetch announcements
$result = mysqli_query(
    $conn,
    "SELECT * FROM announcements ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Announcements</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

    <div class="page-container">

        <a href="../index.php" class="back-link">⬅ Back to Dashboard</a>
        <h2>Announcements Management</h2>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created On</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
                            <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                            <td>
                                <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a> |
                                <a href="delete.php?id=<?= $row['id'] ?>" class="delete"
                                    onclick="return confirm('Delete this announcement?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">No announcements found</td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <br>
    </div>
</body>

</html>