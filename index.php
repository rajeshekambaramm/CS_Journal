<!---
<?php
include 'config/db.php';

$annQuery = "SELECT * FROM announcements ORDER BY created_at DESC";
$annResult = mysqli_query($conn, $annQuery);
?>
-->
<?php
include 'config/db.php';
$annResult = mysqli_query($conn, "SELECT * FROM announcements ORDER BY created_at DESC");
$result = mysqli_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
$articles = mysqli_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Journal of Computer Science</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="image/College_logo.png" alt="BHC" width="40" height="50">
            BHC CS JOURNALS
        </div>

        <nav>
            <a href="index.php">JOURNALS</a>
            <a href="pages/organizational_structure.php">RESOURCES</a>
            <a href="pages/about.php">ABOUT</a>
            <a href="#">CONTACT</a>
            <a href="#" class="login">LOGIN</a>
        </nav>
    </header>

    <!-- MAIN CONTENT 
     $articles = mysqli_query($conn, "SELECT * FROM articles ORDER BY published_date DESC");
-->
    <div class="container">

        <!-- LEFT SIDEBAR -->
        <div class="left-sidebar">
            <aside class="details">
                <!---<img src="image/jcs.webp" alt="Journal Image">-->
                <img src="image/cs.png" alt="Journal Image">
                <p><strong>Frequency:</strong>Monthly</p>
                <!--<p><strong>ISSN:</strong> <?php echo $issnPrint; ?> (Print)</p>
            <p><strong>ISSN:</strong> <?php echo $issnOnline; ?> (Online)</p> -->
            </aside>
            <aside class="sidebar">

                <!--
                <a href="pages/login.php" class="btn submit">SUBMIT YOUR ARTICLE</a>
                <a href="pages/login.php" class="btn editor">JOIN AS AN EDITOR</a>

-->
                <ul class="menu">

                    <li class="menu-item">
                        <a href="pages/login.php">SUBMIT YOUR ARTICLE</a>
                    </li>

                    <li class="menu-item">
                        <a href="pages/login.php">JOIN AS AN EDITOR</a>
                    </li>
                    <li class="menu-item">
                        <a href="pages/current.php">CURRENT</a>
                    </li>

                    <li class="menu-item">
                        <a href="#">ARCHIVES</a>
                    </li>

                    <!-- Parent -->
                    <li class="menu-item dropdown">
                        <a href="#" class="dropdown-toggle">
                            ABOUT <span class="arrow">&#9662;</span>
                        </a>

                        <!-- Child -->
                        <ul class="dropdown-content">
                            <li><a href="pages/organizational_structure.php">ORGANIZATIONAL STRUCTURE</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                        </ul>
                    </li>

                    <!-- Parent -->
                    <li class="menu-item dropdown">
                        <a href="#" class="dropdown-toggle">
                            SPECIAL ISSUES <span class="arrow">&#9662;</span>
                        </a>

                        <!-- Child -->
                        <ul class="dropdown-content">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </li>

                </ul>

            </aside>
        </div>

        <!-- RIGHT CONTENT -->
        <main class="content">
            <h1>Journal of Computer Science</h1>

            <h3>Aims</h3>
            <p>
                The main aim of this initiative is to inculcate Scientific Writing in our CS students and providing them
                an avenue to publish their work.IJACSI aims to publish high-quality,peer-reviewed research that advances
                the fields of <strong>Computer Science, Artificial Intelligence, and Emerging Technologies, </strong>
                fostering
                innovation and providing a platform for global knowledge exchange.
            </p>
            <h3>Scope</h3>
            <p>
                To provide a platform for high-quality research contributions in core and emerging areas of Computer
                Science. The journal welcomes original research articles,review papers,technical notes, case studies,
                and survey papers that advance knowledge, promote innovation, and address contemporary challenges in
                computing.
            </p>

            <!--
            <div class="announcements">      
                <div class="card">
                    <h4>ANNOUNCEMENT</h4>
                    <h3>Energy Research Journal welcomes new Editor-in-Chief</h3>
                    <p>Dr. Erdem Cuce has joined as the new Editor-in-Chief.</p>
                </div>

                <div class="card">
                    <h4>ANNOUNCEMENT</h4>
                    <h3>SGAMR 2020 Award Winners</h3>
                    <p>Awards given for excellence in research and editorial duties.</p>
                </div>

                <div class="card">
                    <h4>ANNOUNCEMENT</h4>
                    <h3>Special Issue on COVID-19</h3>
                    <p>Focused on neuroinflammation and COVID-19 research.</p>
                </div>
            </div>
-->
            <div class="announcements">
                <?php while ($row = mysqli_fetch_assoc($annResult)) { ?>
                    <div class="card">
                        <h4>ANNOUNCEMENT</h4>
                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                        <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>
                    </div>
                <?php } ?>
            </div>

            <div class="tabs">
                <a href="#">Recently Published</a>
                <a href="#">Most Cited</a>
                <a href="#">Most Viewed</a>
                <a href="#">Most downloded</a>
            </div>

            <!---
            <div class="card">
                <p><strong>Research Article</strong> - Open Access</p>
                <h3>Enhancing Facial Expression Recognition Accuracy Through Haar Cascade-Based Feature Extraction</h3>
                <p><em>Thambusamy Velmurugan and Lakshminarayanan Meena</em></p>
                <p>Journal of Computer Science 2025, 2917-2927</p>
                <p>Published: 21 January 2026</p>
                <p><a href="#.pdf">Download PDF</a></p>
            </div>

            <div class="card">
                <p><strong>Review Article</strong> - Open Access</p>
                <h3>Enhancing Facial Expression Recognition Accuracy Through Haar Cascade-Based Feature Extraction</h3>
                <p><em>Thambusamy Velmurugan and Lakshminarayanan Meena</em></p>
                <p>Journal of Computer Science 2025, 2917-2927</p>
                <p>Published: 21 January 2026</p>
                <p><a href="#.pdf">Download PDF</a></p>
            </div>

            <div class="card">
                <p><strong>Research Article</strong> - Open Access</p>
                <h3>Enhancing Facial Expression Recognition Accuracy Through Haar Cascade-Based Feature Extraction</h3>
                <p><em>Thambusamy Velmurugan and Lakshminarayanan Meena</em></p>
                <p>Journal of Computer Science 2025, 2917-2927</p>
                <p>Published: 21 January 2026</p>
                <p><a href="#.pdf">Download PDF</a></p>
            </div>
            --->
            <div class="articles">
                <?php while ($row = mysqli_fetch_assoc($articles)) { ?>
                <div class="card">
                    <p><strong>
                            <?= $row['article_type'] ?>
                        </strong> -
                        <?= $row['access_type'] ?>
                    </p>
                    <h3>
                        <?= $row['title'] ?>
                    </h3>
                    <p><em>
                            <?= $row['authors'] ?>
                        </em></p>
                    <p>
                        <?= $row['journal_info'] ?>
                    </p>
                    <p>Published:
                        <?= date('d M Y', strtotime($row['published_date'])) ?>
                    </p>
                    <p><a href="uploads/pdfs/<?= $row['pdf_file'] ?>">Download PDF</a></p>
                    <p><a href="admin/articals/download.php?id=<?= $row['id'] ?>">Download PDF</a></p>
                </div>
                <?php } ?>
            </div>

        </main>


    </div>






    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
</body>

</html>