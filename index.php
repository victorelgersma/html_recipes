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
                $with_images = [];
                $without_images = [];

                foreach ($files as $file) {
                    $slug = basename($file, ".html");
                    $title = ucwords(str_replace('-', ' ', $slug));
                    $thumbnail = "https://img.vjbe.net/$slug.webp";

                    // Check if image exists. 
                    // Note: @get_headers is a quick way to check external URLs, 
                    // but it can be slow if you have 100+ recipes.
                    $file_headers = @get_headers($thumbnail);
                    $has_image = ($file_headers && strpos($file_headers[0], '200') !== false);

                    $card_html = "
            <a href='recipe.php?name=$slug' class='recipe-card'>
                <div class='card-image' style='background-image: url(\"$thumbnail\"), url(\"img/placeholder.jpg\");'></div>
                <div class='card-content'>
                    <h3>$title</h3>
                    <span class='view-link'>View Recipe →</span>
                </div>
            </a>";

                    if ($has_image) {
                        $with_images[] = $card_html;
                    } else {
                        $without_images[] = $card_html;
                    }
                }

                // Output all recipes with images first
                echo implode('', $with_images);
                echo implode('', $without_images);
            }
            ?>
        </div>
    </article>
    <p>View this project on <a href="https://github.com/victorelgersma/html_recipes">Github</a></p>
</body>

</html>