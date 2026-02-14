<?php
require_once 'config/db.php';

// --------------------
// Fetch Announcements
// --------------------
$announcements = [];
$annQuery = "SELECT * FROM announcements ORDER BY created_at DESC";
$annResult = mysqli_query($conn, $annQuery);

if ($annResult) {
    while ($row = mysqli_fetch_assoc($annResult)) {
        $announcements[] = $row;
    }
}

// --------------------
// Fetch Articles
// --------------------
$articles = [];
$articleQuery = "SELECT * FROM articles ORDER BY published_date DESC";
$articleResult = mysqli_query($conn, $articleQuery);

if ($articleResult) {
    while ($row = mysqli_fetch_assoc($articleResult)) {
        $articles[] = $row;
    }
}

// --------------------
// Scope Content
// --------------------
$scope = '
<p>
To provide a platform for high-quality research contributions in core and
emerging areas of Computer Science. The journal welcomes original research
articles, review papers, technical notes, case studies, and survey papers
that advance knowledge, promote innovation, and address contemporary
challenges in computing.
</p>

<ul class="section-content">
<li><strong>Artificial Intelligence & Machine Learning</strong> – Deep learning, neural networks, expert systems, knowledge representation, intelligent agents.</li>
<li><strong>Data Science, Big Data & Analytics</strong> – Data mining, statistical modelling, predictive analytics, data engineering.</li>
<li><strong>Natural Language Processing & Speech Technologies</strong> – Language modelling, sentiment analysis, machine translation, conversational AI.</li>
<li><strong>Cyber Security, Cryptography & Network Security</strong> – Cyber defence, intrusion detection, secure communication, blockchain security.</li>
<li><strong>Cloud, Edge & Distributed Computing</strong> – High-performance computing, grid computing, serverless architectures.</li>
<li><strong>Software Engineering & Quality Assurance</strong> – Software design, testing methodologies, DevOps, software project management.</li>
<li><strong>IoT, Embedded Systems & Smart Devices</strong> – Sensor networks, wearable technologies, smart environments, industrial IoT.</li>
<li><strong>Image Processing, Computer Vision & Pattern Recognition</strong> – Object detection, visual computing, biometric systems, video analytics.</li>
<li><strong>Computational Intelligence & Optimization Techniques</strong> – Evolutionary algorithms, swarm intelligence, fuzzy systems.</li>
<li><strong>Robotics, Automation & Control Systems</strong> – Autonomous navigation, robotic learning, industrial automation.</li>
<li><strong>Human-Computer Interaction & UX Design</strong> – Interaction design, AR/VR interfaces, usability studies.</li>
<li><strong>Emerging & Future Technologies</strong> – Quantum computing, neuromorphic computing, Industry 4.0 and 5.0 technologies.</li>
</ul>

<p>
The scope is dynamic and continually updated to reflect the evolving
landscape of Computer Science and Technology. IJACSI encourages
interdisciplinary studies that integrate computing with fields such as
engineering, healthcare, business, environmental science, and social
systems.
</p>
';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Journal of Computer Science</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div class="logo">
            <img src="image/College_logo.png" alt="BHC" width="40" height="50">
            BHC CS JOURNALS
        </div>

        <nav>
            <a href="index.php">JOURNALS</a>
            <a href="pages/organizational_structure.php">RESOURCES</a>
            <a href="pages/about.php">ABOUT</a>
            <a href="pages/contact.php">CONTACT</a>

        </nav>
    </header>

    <div class="container">

        <!-- LEFT SIDEBAR -->
        <div class="left-sidebar">
            <aside class="details">
                <img src="image/index.jpg" alt="Journal Image">
                <p><strong>Frequency:</strong> Half-yearly</p>
            </aside>

            <aside class="sidebar">
                <ul class="menu">
                    <li class="menu-item"><a href="/pro/pages/create_account.php">SUBMIT YOUR ARTICLE</a></li>
                    <li class="menu-item"><a href="pages/create_account.php">JOIN AS AN EDITOR</a></li>
                    <li class="menu-item"><a href="pages/current.php">CURRENT</a></li>
                    <li class="menu-item"><a href="pages/organizational_structure.php">ORGANIZATIONAL STRUCTURE</a></li>
                    <li class="menu-item"><a href="pages/guidelines.php">GUIDLINES</a></li>
                </ul>
            </aside>
        </div>

        <!-- MAIN CONTENT -->
        <main class="content">
            <h1>Journal of Computer Science</h1>
            <h2>International Journal of Advanced Computing Science and Innovation (IJACSI)</h2>

            <h3>AIM</h3>
            <div class="section-content" style="align:justfy">
                <p>
                    The main aim of this initiative is to inculcate Scientific Writing in our CS
                    students and providing them an avenue to publish their work. IJACSI aims
                    to publish high-quality, peer-reviewed research that advances the fields of
                    <strong>Computer Science, Artificial Intelligence, and Emerging Technologies</strong>,
                    fostering innovation and providing a platform for global knowledge exchange.
                </p>
            </div>

            <h3>FOCUS</h3>
            <div class="section-content">
                <p>
                    The Journal of Advanced Computing Science and Innovation (JACSI)
                    publishes high-quality research in core and emerging areas of Computer
                    Science. The journal welcomes original research, reviews, and case studies
                    across modern computing disciplines.
                </p>
            </div>

            <h3>SCOPE</h3>
            <div class="section-content"><?php echo $scope; ?></div>


            <!-- ANNOUNCEMENTS -->
            <div class="announcements">
                <h1>ANNOUNCEMENTS</h1>
                <?php if (!empty($announcements)): ?>
                    <?php foreach ($announcements as $ann): ?>
                        <div class="card">
                            <h4><?= htmlspecialchars($ann['title']) ?></h4>
                            <p><?= nl2br(htmlspecialchars($ann['description'])) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- ARTICLES -->
            <div class="articles">
                <h1>ARTICLES</h1>
                <?php if (!empty($articles)): ?>
                    <?php foreach ($articles as $art): ?>
                        <div class="card">
                            <p><strong><?= htmlspecialchars($art['article_type']) ?></strong> -
                                <?= htmlspecialchars($art['access_type']) ?>
                            </p>
                            <h3><?= htmlspecialchars($art['title']) ?></h3>
                            <p><em><?= htmlspecialchars($art['authors']) ?></em></p>
                            <p><?= htmlspecialchars($art['journal_info']) ?></p>
                            <p>Published: <?= date('d M Y', strtotime($art['published_date'])) ?></p>

                            <!--  <p>
                            <a href="admin/articals/download.php<?= urlencode($art['pdf_file']) ?>" target="_blank">
                                Download PDF
                            </a>
                        </p> -->
                            <!-- <p>
                                <a href="admin/articals/download.php?file=<?= urlencode($art['pdf_file']) ?>" target="_blank">
                                    Download PDF
                                </a>
                            </p> -->
                            <a href="admin/articals/download.php?id=<?= $art['id'] ?>" target="_blank">
                                Download PDF
                            </a>



                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </main>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>

</html>