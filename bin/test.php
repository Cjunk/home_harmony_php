<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
</head>

<body>
    <h1>Image Gallery</h1>

    <div class="image-container">
        <?php
        // Define the directory containing the images
        $imageDirectory = 'images/';

        // Get all image files from the directory
        $images = glob($imageDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        // Display each image
        foreach ($images as $image) {
            echo '<img src="' . $image . '" alt="Image" />';
        }
        ?>
    </div>
</body>

</html>