<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Recipes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <article class="container">
        <!-- Added Search Bar -->
        <div class="search-container">
            <input type="text" id="recipeSearch" placeholder="Search recipes..." autocomplete="off">
        </div>

        <div class="recipe-list" id="recipeGrid">
            <?php
            $manifest_file = 'manifest.json';
            if (file_exists($manifest_file)) {
                $recipes = json_decode(file_get_contents($manifest_file), true);

                usort($recipes, function ($a, $b) {
                    return strcmp($a['slug'], $b['slug']);
                });

                foreach ($recipes as $recipe) {
                    $slug = $recipe['slug'];
                    $title = ucwords(str_replace('-', ' ', $slug));

                    echo "
    <a href='recipe.php?name=$slug' class='recipe-card' data-title='" . strtolower($title) . "'>
        <h3>$title</h3>
        <span class='view-link'>View Recipe →</span>
    </a>";
                }
            } else {
                echo "<p>No recipes found. Please run ./build first.</p>";
            }
            ?>
        </div>
    </article>

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