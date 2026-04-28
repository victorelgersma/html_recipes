<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <?php include 'style.php'; ?>
</head>

<body>
    <div class="container">
        <p style="margin-bottom: 1rem;"><a href="index.php" style="color: var(--accent);">← Back to Index</a></p>

        <?php
        $name = basename($_GET['name'] ?? '');
        $path = "html/$name.html";

        if (!empty($name) && file_exists($path)) {
            $baseUrl = "https://img.vjbe.net/$name";

            // 1. Image Carousel (Checks for slug.webp, slug2.webp, slug3.webp, etc.)
            echo '<div class="carousel-container">
                    <div class="carousel-track">';

            // Primary Image
            echo "<img src='$baseUrl.webp' class='carousel-img' onerror='this.remove()'>";

            // Potential Gallery Images (Checks up to 5)
            for ($i = 2; $i <= 5; $i++) {
                echo "<img src='{$baseUrl}{$i}.webp' class='carousel-img' onerror='this.remove()'>";
            }

            echo '  </div>
                    <div class="carousel-hint" id="carousel-hint">Swipe for more photos ↔</div>
                  </div>';

            // 2. Recipe Content
            include($path);

            // 3. Small Script to hide hint if only one image exists
            echo "
            <script>
                window.onload = function() {
                    const images = document.querySelectorAll('.carousel-img');
                    const hint = document.getElementById('carousel-hint');
                    if (images.length <= 1) {
                        hint.style.display = 'none';
                    }
                };
            </script>";

        } else {
            echo "<h1>Recipe not found</h1>";
        }
        ?>
    </div>
    <?php
    $edit_name = $name; // From your existing $name variable
    include 'footer.php';
    ?>
</body>

</html>