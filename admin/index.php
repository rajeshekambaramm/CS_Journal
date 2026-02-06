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
            <div class="card-buttons">
                <a href="about/add.php">➕ Add Content</a>
                <a href="about/edit.php">🛠 Edit Content</a>
            </div>
        </div>

        <!-- ARTICLE PAGE -->
        <div class="card">
            <h3>Article Part</h3>
            <div class="card-buttons">
                <a href="articals/add.php">➕ Add Article</a>
                <a href="articals/edit.php">🛠 Edit Article</a>
            </div>
        </div>

        <!-- CURRENT UPDATES -->
        <div class="card">
            <h3>Current Updates</h3>
            <div class="card-buttons">
                <a href="current/add.php">➕ Add Content</a>
                <a href="current/edit.php">🛠 Manage</a>
            </div>
        </div>

        <!-- ORGANIZATION STRUCTURE -->
        <div class="card">
            <h3>Organization Structure</h3>
            <div class="card-buttons">
                <a href="organization/add.php">➕ Add Member</a>
                <a href="organization/edit.php">🛠 Edit Member</a>
            </div>
        </div>

        <!-- ANNOUNCEMENTS -->
        <div class="card">
            <h3>Announcements</h3>
            <div class="card-buttons">
                <a href="announcement/add.php">➕ Add Announcement</a>
                <a href="announcement/edit.php">🛠 Manage</a>
            </div>
        </div>
<!-- user login -->
        <div class="card">
            <h3>User Login</h3>
            <div class="card-buttons">
                <a href="login/add.php">➕ Add New User</a>
                <a href="login/edit.php">🛠 Manage User</a>
            </div>
        </div>
    </div>
</div>



</body>

</html>