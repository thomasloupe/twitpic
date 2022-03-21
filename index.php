<?php
require_once('TwitterAPIExchange.php');
/** Set your tokens in config.php - see: https://dev.twitter.com/apps/ */
require_once('config.php');
/** Set variables to grab the tokens from config.php **/
$GLOBALS["settings"] = array(
    'oauth_access_token' => TWITTER_ACCESS_TOKEN,
    'oauth_access_token_secret' => TWITTER_ACCESS_TOKEN_SECRET,
    'consumer_key' => TWITTER_CONSUMER_KEY,
    'consumer_secret' => TWITTER_CONSUMER_SECRET
);

$GLOBALS['api_url'] = "https://api.twitter.com/1.1/account/update_profile_image.json";

/** Add each image into your images folder and name them in numerical order then add how many you have to this list */
$validImages = ['0', '1', '2', '3'];

/** Link HTML buttons to PHP functions */
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['buttonName']))
{
    $buttonName = $_POST['buttonName'];
    if (in_array($buttonName, $validImages)) {
        button($buttonName);
    }
}

/** When an image is clicked, call the POST function and update Twitter with the new image */
function button($buttonName){
    $postfields = array('image' => base64_encode(file_get_contents("images/" . $buttonName . ".jpg")));
    $twitter = new TwitterAPIExchange($GLOBALS["settings"]);
    $twitter->buildOauth($GLOBALS['api_url'], 'POST')
    ->setPostfields($postfields)
    ->performRequest();
}
?>

<!--BEGIN HTML-->
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="header">
            <img src="images/header_image.jpg"/>
        </div>
        <div class="text">
            <h2>
                To change my Twitter profile image, select one of the images below:
            </h2>
        </div>
        <!--ADD A BUTTON FOR EACH IMAGE YOU HAVE-->
        <div class="container">
            <div class="galleryItem">
                <form method="post">
                    <input type="hidden" name="buttonName" value="0" />
                    <button type="submit"><img src='images/0.jpg' name="button0" enctype="multipart/form-data"/>
                </form>
            </div>
            <div class="galleryItem">
                <form method="post">
                    <input type="hidden" name="buttonName" value="1" />
                    <button type="submit"><img src='images/1.jpg' name="button1" enctype="multipart/form-data"/>
                </form>
            </div>
            <div class="galleryItem">
                <form method="post">
                    <input type="hidden" name="buttonName" value="2" />
                    <button type="submit"><img src='images/2.jpg' name="button2" enctype="multipart/form-data"/>
                </form>
            </div>
            <div class="galleryItem">
                <form method="post">
                    <input type="hidden" name="buttonName" value="3" />
                    <button type="submit"><img src='images/3.jpg' name="button3" enctype="multipart/form-data"/>
                </form>
            </div>
            <!--ADD NEW BUTTONS HERE. CHANGE THE VALUE TO THE IMAGE'S NAME (Ex: 4) AND IMG SRC TO PATH+IMAGENAME+EXT (Ex: images/4.jpg)-->
        </div>
    </body>
</html>
<!--END HTML-->