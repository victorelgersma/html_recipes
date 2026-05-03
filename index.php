<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Recipes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <article class="container">
        <!-- Added Search Bar -->
        <div class="search-container">
            <input type="text" id="recipeSearch" placeholder="Search recipes..." autocomplete="off">
        </div>

        <div class="recipe-grid" id="recipeGrid">
            <?php
            $manifest_file = 'manifest.json';
            if (file_exists($manifest_file)) {
                $recipes = json_decode(file_get_contents($manifest_file), true);

                usort($recipes, function ($a, $b) {
                    return $b['has_image'] - $a['has_image'];
                });

                foreach ($recipes as $recipe) {
                    $slug = $recipe['slug'];
                    $title = ucwords(str_replace('-', ' ', $slug));
                    $thumbnail = "https://img.vjbe.net/thumbs/$slug.webp";

                    echo "
    <a href='recipe.php?name=$slug' class='recipe-card' data-title='" . strtolower($title) . "'>
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

    <!-- Search Logic -->
    <script>
        const searchInput = document.getElementById('recipeSearch');
        const cards = document.querySelectorAll('.recipe-card');

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            
            cards.forEach(card => {
                const title = card.getAttribute('data-title');
                if (title.includes(query)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>