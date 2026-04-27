<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Recipes</title>
    <?php include 'style.php'; ?>
</head>

<body>
    <header class="index-header">
    <h1>Victor’s Kitchen</h1>
    <hr>
</header>
    <article class="container">
        <div class="recipe-grid">
            <?php
            $files = glob("html/*.html");
            if ($files) {
                foreach ($files as $file) {
                    $slug = basename($file, ".html");
                    $title = ucwords(str_replace('-', ' ', $slug));

                    echo "
            <a href='recipe.php?name=$slug' class='recipe-card'>
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
    <?php include 'footer.php'; ?>
</body>

</html>