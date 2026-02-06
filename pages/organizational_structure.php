<?php
include '../config/db.php';   // DB connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organizational Structure | Journal of Computer Science</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .editorial-section {
            max-width: 1100px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .editorial-section h2 {
            margin-top: 35px;
            color: #0b3c5d;
            border-bottom: 2px solid #e3e3e3;
            padding-bottom: 8px;
        }

        .editorial-section ul {
            list-style: none;
            padding-left: 0;
            margin-top: 15px;
        }

        .editorial-section ul li {
            padding: 8px 0;
            font-size: 16px;
            border-bottom: 1px dashed #ddd;
        }

        .editorial-section ul li strong {
            color: #333;
        }

        .category-label {
            font-size: 13px;
            color: #fff;
            background: #007bff;
            padding: 3px 8px;
            border-radius: 4px;
            margin-left: 8px;
        }

        .empty-text {
            font-style: italic;
            color: #777;
            margin-top: 10px;
        }
    </style>
</head>

<body>

<?php include '../includes/header.php'; ?>

<div class="editorial-section">

    <h1>Organizational Structure</h1>

    <?php
    $query = "SELECT * FROM organizational_members ORDER BY section, id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $currentSection = '';

        while ($row = mysqli_fetch_assoc($result)) {

            if ($currentSection !== $row['section']) {
                if ($currentSection !== '') {
                    echo "</ul>";
                }

                echo "<h2>{$row['section']}</h2>";
                echo "<ul>";

                $currentSection = $row['section'];
            }

            echo "<li>";

            if (!empty($row['role'])) {
                echo "<strong>{$row['role']}:</strong> ";
            }

            echo htmlspecialchars($row['name']);

            if (!empty($row['category']) && $row['category'] !== 'Internal') {
                echo "<span class='category-label'>{$row['category']}</span>";
            }

            echo "</li>";
        }

        echo "</ul>";

    } else {
        echo "<p class='empty-text'>Organizational details will be updated soon.</p>";
    }
    ?>

</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
