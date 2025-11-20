<?php
require_once('TwitterAPI.php');
/** Set your tokens in config.php - see: https://dev.twitter.com/apps/ */
require_once('config.php');
/** Set variables to grab the tokens from config.php **/
$GLOBALS["settings"] = array(
    'oauth_access_token' => ACCESS_TOKEN,
    'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
    'consumer_key' => API_KEY,
    'consumer_secret' => API_KEY_SECRET
);

/** Dynamically get all images from the images folder */
function getImages() {
    $images = [];
    $imageDir = 'images/';
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

    if (is_dir($imageDir)) {
        $files = scandir($imageDir);
        foreach ($files as $file) {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($extension, $allowedExtensions) && $file !== 'header_image.jpg') {
                $images[] = $file;
            }
        }
        sort($images, SORT_NATURAL);
    }
    return $images;
}

$validImages = getImages();
$message = '';
$messageType = '';

/** Link HTML buttons to PHP functions */
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['imageName']))
{
    $imageName = $_POST['imageName'];
    if (in_array($imageName, $validImages)) {
        $result = updateProfileImage($imageName);
        if ($result['success']) {
            $message = "Profile image updated successfully!";
            $messageType = 'success';
        } else {
            $message = "Error updating profile image: " . $result['error'];
            $messageType = 'error';
        }
    }
}

/** When an image is clicked, call the POST function and update Twitter with the new image */
function updateProfileImage($imageName){
    return ['success' => false, 'error' => 'This project no longer works because profile image updates require the Pro/Enterprise API tier for Twitter, which costs $42,000+/month.'];
}
?>

<!--BEGIN HTML-->
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="text">
            <h1 style="color: #00ff00;">
                To change my Twitter profile image, select one of the images below:
            </h1>
        </div>
        <?php if ($message): ?>
        <div class="message <?php echo $messageType; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <?php endif; ?>
        <div class="container">
            <?php foreach ($validImages as $image): ?>
            <div class="galleryItem">
                <form method="post">
                    <input type="hidden" name="imageName" value="<?php echo htmlspecialchars($image); ?>" />
                    <button type="submit">
                        <img src="images/<?php echo htmlspecialchars($image); ?>" alt="Profile option" />
                    </button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
<!--END HTML-->