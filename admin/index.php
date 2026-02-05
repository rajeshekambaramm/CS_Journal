<?php
// Session + auth check
include 'includes/auth.php';

// DB connection
include '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | CS Journal</title>
<link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Welcome Admin 👋</h2>
    <a href="logout.php">🚪 Logout</a>
</div>

<div class="container">
    <div class="grid">
        <!-- ABOUT PAGE -->
        <div class="card">
            <h3>About Page</h3>
            <a href="about/add.php">➕ Add Content</a><br>
            <a href="about/edit.php">🛠 Edit Content</a>
        </div>

        <!-- ARTICLE PAGE -->
        <div class="card">
            <h3>Article Part</h3>
            <a href="articals/add.php">➕ Add Article</a><br>
            <a href="articals/edit.php">🛠 Edit Article</a>
        </div>

        <!-- CURRENT PAGE -->
        <div class="card">
            <h3>Current Updates</h3>
            <a href="current/add.php">➕ Add Content</a>
            <a href="current/edit.php">🛠 Manage</a>
        </div>

        <!-- ORGANIZATION PAGE -->
        <div class="card">
            <h3>Organization Structure</h3>
            <a href="organization/add.php">➕ Add organization</a>
             <a href="organization/view.php">🛠 Edit  organization</a>
        </div>

        <!-- ANNOUNCEMENTS -->
        <div class="card">
            <h3>Announcements</h3>
            <a href="announcement/add.php">➕ Add Announcement</a><br>
            <a href="announcement/edit.php">🛠 Manage</a>
        </div>
    </div>
</div>

</body>
</html>
