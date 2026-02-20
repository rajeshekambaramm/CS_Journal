<?php
session_start();
include '../../config/db.php';

$messages = mysqli_query(
    $conn,
    "SELECT * FROM contact_messages ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Messages</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <div class="page-container">
        <h2>Contact Messages</h2>

        <?php if (isset($_GET['deleted'])): ?>
            <div class="alert-success">Message deleted successfully.</div>
        <?php endif; ?>

        <?php if ($messages && mysqli_num_rows($messages) > 0) { ?>

            <div class="messages-container">

            <?php while ($row = mysqli_fetch_assoc($messages)) { ?>

                <div class="message-card">
                    <div class="message-header">
                        <?= htmlspecialchars($row['subject']) ?>
                    </div>

                    <p><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>

                    <div class="message-body">
                        <?= nl2br(htmlspecialchars($row['message'])) ?>
                    </div>

                    <small class="message-date">
                        <?= date('d M Y H:i', strtotime($row['created_at'])) ?>
                    </small>

                    <div class="message-actions">
                        <a href="delete.php?id=<?= $row['id'] ?>" 
                           class="btn-danger"
                           onclick="return confirm('Are you sure you want to delete this message?');">
                            Delete
                        </a>
                    </div>
                </div>

            <?php } ?>

            </div>

        <?php } else { ?>

            <p>No messages found.</p>

        <?php } ?>
    </div>
</body>

</html>