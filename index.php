<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Recipes</title>
    <link rel="stylesheet" href="https://vjbe.net/tufte.css"/>
</head>
<body>
    <article>
        <h1>Recipe Index</h1>
        <ul>
            <?php
            $files = glob("html/*.html");
            if ($files) {
                foreach ($files as $file) {
                    $slug = basename($file, ".html");
                    $title = str_replace('-', ' ', $slug);
                    // Link to the PHP wrapper instead of the static HTML
                    echo "<li><a href='recipe.php?name=$slug'>$title</a></li>";
                }
            } else {
                echo "<li>No recipes found. Run ./build first!</li>";
            }
            ?>
        </ul>
    </article>
</body>
</html>