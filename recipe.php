<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <link rel="stylesheet" href="style.css?v=<?php echo filemtime('style.css'); ?>">
</head>
<body>
    <div class="container">
        <p style="margin-bottom: 1rem;"><a href="index.php" style="color: var(--accent);">← Back to Index</a></p>
        <?php
        $name = basename($_GET['name'] ?? '');
        $path = "html/$name.html";
        if (!empty($name) && file_exists($path)) {
            // Look up how many images this recipe has (baked in at build
            // time by probing https://img.vjbe.net/<slug>1.webp, <slug>2.webp, ...)
            $imageCount = 0;
            if (file_exists('manifest.json')) {
                $manifest = json_decode(file_get_contents('manifest.json'), true) ?: [];
                foreach ($manifest as $r) {
                    if ($r['slug'] === $name) {
                        $imageCount = $r['image_count'] ?? 0;
                        break;
                    }
                }
            }
            // 1. Image Carousel — numbered 1..image_count, no guessing
            if ($imageCount > 0) {
                $baseUrl = "https://img.vjbe.net/$name";
                echo '<div class="carousel-container">
                        <div class="carousel-track">';
                for ($i = 1; $i <= $imageCount; $i++) {
                    echo "<img src='{$baseUrl}{$i}.webp' class='carousel-img' loading='lazy' onerror='this.remove()'>";
                }
                echo '  </div>
                        <div class="carousel-hint" id="carousel-hint">Swipe for more photos ↔</div>
                      </div>';
            }
            // 2. Recipe Content
            include($path);

            // 3. Small Script to hide hint if only one image exists,
            //    AND persist checklist state to localStorage per recipe.
            echo "
            <script>
                window.onload = function() {
                    const images = document.querySelectorAll('.carousel-img');
                    const hint = document.getElementById('carousel-hint');
                    if (hint && images.length <= 1) {
                        hint.style.display = 'none';
                    }
                };
            </script>";

            echo "
            <script>
            (function() {
                const recipeKey = 'checklist:' + " . json_encode($name) . ";
                const boxes = document.querySelectorAll('.container input[type=\"checkbox\"]');
                let saved = {};
                try { saved = JSON.parse(localStorage.getItem(recipeKey)) || {}; } catch (e) {}
                boxes.forEach((box) => {
                    const label = box.closest('label');
                    const text = label ? label.textContent.trim() : box.outerHTML;
                    if (saved[text] !== undefined) box.checked = saved[text];
                    box.addEventListener('change', () => {
                        saved[text] = box.checked;
                        localStorage.setItem(recipeKey, JSON.stringify(saved));
                    });
                });
            })();
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