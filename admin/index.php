<?php
include 'includes/auth.php';
include '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | CS Journal</title>

    <!-- IMPORTANT: correct relative path -->
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
                        A
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
                    <span class="dropdown-toggle">Current Updates</span>
                    <ul class="submenu">
                        <li><a href="Current/add.php">Add</a></li>
                        <li><a href="Current/edit.php">Manage</a></li>
                    </ul>
                </li>


                <li class="has-dropdown">
                    <span class="dropdown-toggle">Organization</span>
                    <ul class="submenu">
                        <li><a href="Organization/add.php">Add</a></li>
                        <li><a href="Organization/edit.php">Manage</a></li>
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
                    <span class="dropdown-toggle">👥 Users</span>
                    <ul class="submenu">
                        <li><a href="login/add.php">Add User</a></li>
                        <li><a href="login/edit.php">Manage</a></li>
                    </ul>
                </li>

            </ul>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="admin-content">

            <h2 class="page-title">Dashboard</h2>

            <div class="grid">

                <div class="card">
                    <h3>About Page</h3>
                    <div class="card-buttons">
                        <a href="about/add.php">Add</a>
                        <a href="about/edit.php">Edit</a>
                    </div>
                </div>

                <div class="card">
                    <h3>Articles</h3>
                    <div class="card-buttons">
                        <a href="articals/add.php">Add</a>
                        <a href="articals/edit.php">Manage</a>
                    </div>
                </div>

                <div class="card">
                    <h3>Announcements</h3>
                    <div class="card-buttons">
                        <a href="announcement/add.php">Add</a>
                        <a href="announcement/edit.php">Manage</a>
                    </div>
                </div>
                <div class="card">
                    <h3>Current Updates</h3>
                    <div class="card-buttons">
                        <a href="current/add.php">➕ Add</a>
                        <a href="current/edit.php">🛠 Manage</a>
                    </div>
                </div>

                <div class="card">
                    <h3>Organization</h3>
                    <div class="card-buttons">
                        <a href="organization/add.php">➕ Add</a>
                        <a href="organization/edit.php">🛠 Edit</a>
                    </div>
                </div>
                <div class="card">
                    <h3>Users</h3>
                    <div class="card-buttons">
                        <a href="login/add.php">Add</a>
                        <a href="login/edit.php">Manage</a>
                    </div>
                </div>

            </div>
        </main>

    </div>

    <!-- DROPDOWN SCRIPT -->
    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(item => {
            item.addEventListener('click', () => {
                item.parentElement.classList.toggle('open');
            });
        });
    </script>

</body>

</html>