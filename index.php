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
            $manifest_file = 'manifest.json';
            if (file_exists($manifest_file)) {
                $recipes = json_decode(file_get_contents($manifest_file), true);

                // Sort: Recipes with images (true) come before those without (false)
                usort($recipes, function ($a, $b) {
                    return $b['has_image'] - $a['has_image'];
                });

                foreach ($recipes as $recipe) {
                    $slug = $recipe['slug'];
                    $title = ucwords(str_replace('-', ' ', $slug));

                    // Point specifically to the thumbs directory on your image server
                    $thumbnail = "https://img.vjbe.net/thumbs/$slug.webp";

                    echo "
    <a href='recipe.php?name=$slug' class='recipe-card'>
        <div class='card-image' style='background-image: url(\"$thumbnail\"), url(\"img/placeholder.jpg\");'></div>
        <div class='card-content'>
            <h3>$title</h3>
            <span class='view-link'>View Recipe →</span>
        </div>
    </a>";
                }
            } else {
                echo "<p>No recipes found. Please run ./build first.</p>";
            }
            ?>
        </div>
    </article>
    <p>View this project on <a href="https://github.com/victorelgersma/html_recipes">Github</a></p>
</body>

</html>