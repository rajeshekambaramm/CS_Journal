<?php
include '../includes/auth.php';
include '../../config/db.php';

// Fetch articles
$result = mysqli_query(
    $conn,
    "SELECT * FROM articles ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Articles</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

    <div class="page-container">

        <a href="../index.php" class="back-link">⬅ Back to Dashboard</a>
        <h2>Articles Management</h2>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>Type</th>
                    <th>Access</th>
                    <th>Published</th>
                    <th>PDF</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= htmlspecialchars($row['authors']) ?></td>
                            <td><?= $row['article_type'] ?></td>
                            <td><?= $row['access_type'] ?></td>
                            <td><?= date('d M Y', strtotime($row['published_date'])) ?></td>
                            <td>
                                <a href="download.php?id=<?= $row['id'] ?>" target="_blank">
                                    View PDF
                                </a>
                            </td>

                            <td>
                                <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a> |
                                <a href="delete.php?id=<?= $row['id'] ?>" class="delete"
                                    onclick="return confirm('Delete this article?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="8" style="text-align:center;">
                            No articles found
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>



    </div>

</body>

</html>