<?php
include 'includes/auth.php';
include '../config/db.php';

/* COUNTS */
$aboutCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS total FROM about_sections"))['total'];
$articleCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS total FROM articles"))['total'];
$announcementCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS total FROM announcements"))['total'];
$currentCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS total FROM current_updates"))['total'];
$orgCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS total FROM organizational_members"))['total'];
$userCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS total FROM users"))['total'];
$conCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS total FROM contact_messages"))['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | CS Journal</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body class="admin-page">

<!-- TOP BAR -->
<div class="admin-topbar">
    <div class="logo">CS Journal Admin</div>
    <div class="admin-actions">
        <span>👤 Admin</span>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="admin-layout">

<!-- SIDEBAR -->
<aside class="admin-sidebar">
    <ul>
        <li class="active">📊 Dashboard</li>

        <li class="has-dropdown">
            <span class="dropdown-toggle">📄 About Page</span>
            <ul class="submenu">
                <li><a href="about/add.php">Add</a></li>
                <li><a href="about/edit.php">Edit</a></li>
            </ul>
        </li>

        <li class="has-dropdown">
            <span class="dropdown-toggle">📰 Articles</span>
            <ul class="submenu">
                <li><a href="articals/add.php">Add</a></li>
                <li><a href="articals/edit.php">Manage</a></li>
            </ul>
        </li>

        <li class="has-dropdown">
            <span class="dropdown-toggle">📢 Announcements</span>
            <ul class="submenu">
                <li><a href="announcement/add.php">Add</a></li>
                <li><a href="announcement/edit.php">Manage</a></li>
            </ul>
        </li>

        <li class="has-dropdown">
            <span class="dropdown-toggle">🔔 Current Updates</span>
            <ul class="submenu">
                <li><a href="current/add.php">Add</a></li>
                <li><a href="current/edit.php">Manage</a></li>
            </ul>
        </li>

        <li class="has-dropdown">
            <span class="dropdown-toggle">🏢 Organization</span>
            <ul class="submenu">
                <li><a href="organization/add.php">Add</a></li>
                <li><a href="organization/edit.php">Manage</a></li>
            </ul>
        </li>

        <li class="has-dropdown">
            <span class="dropdown-toggle">👥 Users</span>
            <ul class="submenu">
                <li><a href="login/add.php">Add User</a></li>
                <li><a href="login/edit.php">Manage</a></li>
            </ul>
        </li>
        <li class="has-dropdown">
            <span class="dropdown-toggle"> 📞 contact</span>
            <ul class="submenu">
                <li><a href="contact/view.php">View</a></li>
                <!-- <li><a href="login/edit.php">Manage</a></li> -->
            </ul>
        </li>
    </ul>
</aside>

<!-- MAIN CONTENT -->
<main class="admin-content">
    <h2 class="page-title">Dashboard</h2>

    <div class="grid">

        <div class="card stat-card blue">
            <span class="particle"></span><span class="particle"></span><span class="particle"></span>
            <div class="stat-header">
                <div class="stat-icon">📄</div>
                <div class="stat-info">
                    <h4>About Sections</h4>
                    <span><?= $aboutCount ?></span>
                </div>
            </div>
        </div>

        <div class="card stat-card green">
            <span class="particle"></span><span class="particle"></span><span class="particle"></span>
            <div class="stat-header">
                <div class="stat-icon">📰</div>
                <div class="stat-info">
                    <h4>Articles</h4>
                    <span><?= $articleCount ?></span>
                </div>
            </div>
        </div>

        <div class="card stat-card red">
            <span class="particle"></span><span class="particle"></span><span class="particle"></span>
            <div class="stat-header">
                <div class="stat-icon">📢</div>
                <div class="stat-info">
                    <h4>Announcements</h4>
                    <span><?= $announcementCount ?></span>
                </div>
            </div>
        </div>

        <div class="card stat-card orange">
            <span class="particle"></span><span class="particle"></span><span class="particle"></span>
            <div class="stat-header">
                <div class="stat-icon">🔔</div>
                <div class="stat-info">
                    <h4>Current Updates</h4>
                    <span><?= $currentCount ?></span>
                </div>
            </div>
        </div>

        <div class="card stat-card purple">
            <span class="particle"></span><span class="particle"></span><span class="particle"></span>
            <div class="stat-header">
                <div class="stat-icon">🏢</div>
                <div class="stat-info">
                    <h4>Organization</h4>
                    <span><?= $orgCount ?></span>
                </div>
            </div>
        </div>

        <div class="card stat-card teal">
            <span class="particle"></span><span class="particle"></span><span class="particle"></span>
            <div class="stat-header">
                <div class="stat-icon">👥</div>
                <div class="stat-info">
                    <h4>Users</h4>
                    <span><?= $userCount ?></span>
                </div>
            </div>
        </div>
        <div class="card stat-card teal">
            <span class="particle"></span><span class="particle"></span><span class="particle"></span>
            <div class="stat-header">
                <div class="stat-icon">📞</div>
                <div class="stat-info">
                    <h4>Contact</h4>
                    <span><?= $conCount ?></span>
                </div>
            </div>
        </div>
        

    </div>
</main>
</div>

<script>
document.querySelectorAll('.dropdown-toggle').forEach(item => {
    item.addEventListener('click', () => {
        item.parentElement.classList.toggle('open');
    });
});
</script>

</body>
</html>
