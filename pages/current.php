<?php
session_start();
include '../config/db.php';

// Fetch current updates from separate table
$currentUpdates = mysqli_query(
    $conn,
    "SELECT * FROM current_updates ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Current Updates - Journal of Computer Science</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include '../includes/header.php'; ?>

<div class="container" style="margin-top: 20px;">
    <main class="content">
        <h1>Current Updates</h1>

        <div class="articles">
            <?php if ($currentUpdates && mysqli_num_rows($currentUpdates) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($currentUpdates)) { ?>
                    <div class="card">
                        <h3><?= htmlspecialchars($row['title']) ?></h3>

                        <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>

                        <p style="margin-top:10px; font-size:0.9em; color:#666;">
                            Posted on: <?= date('d M Y', strtotime($row['created_at'])) ?>
                        </p>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>No current updates available.</p>
            <?php } ?>
        </div>
    </main>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
