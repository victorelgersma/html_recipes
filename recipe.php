<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipe</title>
    <link rel="stylesheet" href="https://vjbe.net/tufte.css"/>
</head>
<body>
    <article>
        <p><a href="index.php">← Back to Index</a></p>
        <?php
        $name = $_GET['name'] ?? '';
        // Sanitize input to prevent directory traversal
        $name = basename($name); 
        $path = "html/$name.html";

        if (!empty($name) && file_exists($path)) {
            include($path);
        } else {
            echo "<h1>Recipe not found</h1>";
            echo "<p>Sorry, that recipe doesn't exist yet.</p>";
        }
        ?>
    </article>
</body>
</html>