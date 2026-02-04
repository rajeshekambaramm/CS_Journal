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

$query = "SELECT title, content FROM content_management 
          WHERE page_name='about' 
          ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>

<main class="content">
    <h1>Journal of Computer Science</h1>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
    <?php } ?>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>
