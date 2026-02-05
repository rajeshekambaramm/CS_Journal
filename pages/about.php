<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Journal of Computer Science</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php
include '../config/db.php';
include '../includes/header.php';

/* Fetch About sections from separate table */
$query = "SELECT title, content 
          FROM about_sections 
          ORDER BY id ASC";

$result = mysqli_query($conn, $query);
?>

<main class="content">
    <h1>Journal of Computer Science</h1>

    <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <h3><?= htmlspecialchars($row['title']); ?></h3>
            <p><?= nl2br(htmlspecialchars($row['content'])); ?></p>
        <?php } ?>
    <?php } else { ?>
        <p>No content available.</p>
    <?php } ?>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>
