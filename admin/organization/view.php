<?php
include '../../config/db.php';
include '../includes/auth.php';

$result = mysqli_query($conn, "SELECT * FROM organizational_members ORDER BY section, id DESC");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Organization</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

    <a href="../index.php" class="back-link">⬅ Dashboard</a>
    <h2>Organizational Structure</h2>
    <a href="add.php" class="btn">➕ Add Member</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Section</th>
            <th>Role</th>
            <th>Name</th>
            <th>Category</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['section']) ?></td>
                <td><?= htmlspecialchars($row['role']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['category']) ?></td>
                <td>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this member?')"
                        class="delete">Delete</a>
                </td>
            </tr>
        <?php } ?>

    </table>

</body>

</html>