
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
            include($path);
        } else {
            echo "<h1>Recipe not found</h1>";
        }
        ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
