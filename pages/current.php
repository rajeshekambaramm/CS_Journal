<?php
session_start();
include '../config/db.php';

// Fetch articles from database
$articles = mysqli_query($conn, "SELECT * FROM articles ORDER BY published_date DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Articles - Journal of Computer Science</title>
    <!-- Correct CSS path from pages/ folder -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- Correct include path for header -->
    <?php include '../includes/header.php'; ?>

    <div class="container" style="margin-top: 20px;">

        <main class="content">
            <h1>current Articles</h1>

            <div class="articles">
                <?php while ($row = mysqli_fetch_assoc($articles)) { ?>
                    <div class="card">
                        <p><strong><?= htmlspecialchars($row['article_type']) ?></strong> - <?= htmlspecialchars($row['access_type']) ?></p>
                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                        <p><em><?= htmlspecialchars($row['authors']) ?></em></p>
                        <p><?= htmlspecialchars($row['journal_info']) ?></p>
                        <p>Published: <?= date('d M Y', strtotime($row['published_date'])) ?></p>
                        
                    </div>
                <?php } ?>
            </div>
        </main>

    </div>

    <!-- Correct include path for footer -->
    <?php include '../includes/footer.php'; ?>
</body>

</html>
