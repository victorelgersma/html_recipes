<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Recipes</title>
    <?php include 'style.php'; ?>
</head>

<body>
    <article class="container">
        <div class="recipe-grid">
            <?php
            $files = glob("html/*.html");
            if ($files) {
                foreach ($files as $file) {
                    $slug = basename($file, ".html");
                    $title = ucwords(str_replace('-', ' ', $slug));

                    // Construct URL for your external CDN
                    $thumbnail = "https://img.vjbe.net/$slug.webp";

                    echo "
        <a href='recipe.php?name=$slug' class='recipe-card'>
            <div class='card-image' style='background-image: url(\"$thumbnail\"), url(\"img/placeholder.jpg\");'></div>
            <div class='card-content'>
                <h3>$title</h3>
                <span class='view-link'>View Recipe →</span>
            </div>
        </a>";
                }
            }
            ?>
        </div>
    </article>
</body>

</html>