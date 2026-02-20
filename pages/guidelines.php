<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Author Guidelines</title>
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .guidelines-wrapper {
            max-width: 90rem;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .guidelines-wrapper h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .download-box {
            text-align: center;
            margin-bottom: 20px;
        }

        .download-box a {
            display: inline-block;
            padding: 10px 18px;
            background: #06557c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .download-box a:hover {
            background: #043f5d;
        }

        .pdf-viewer {
            width: 100%;
            height: 700px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="guidelines-wrapper">

        <h1>Author Guidelines</h1>

        <!-- Word Download Button -->
        <div class="download-box">
            <a href="../uploads/guidelines/author_guidelines.docx" download>
                ⬇ Download Guidelines (Word)
            </a>
        </div>

        <!-- PDF Viewer -->
        <iframe src="../uploads/guidelines/author_guidelines.pdf" class="pdf-viewer">
        </iframe>

        <!-- If iframe fails -->
        <p style="text-align:center; margin-top:15px;">
            If the PDF is not visible,
            <a href="../uploads/guidelines/author_guidelines.pdf" target="_blank">
                click here to open it.
            </a>
        </p>

    </div>

    <?php include '../includes/footer.php'; ?>

</body>

</html>