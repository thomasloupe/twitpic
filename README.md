# twitpic
Update your Twitter profile picture by selecting an image on a website.

Note: This repository uses twitter-api-php/TwitterAPIExchange.php located [here](https://github.com/J7mbo/twitter-api-php/blob/master/TwitterAPIExchange.php).
The file has been included in this release but credit goes to [J7mbo](https://github.com/J7mbo) for his great Twitter API.

# Getting Started
1. Visit the [Twitter Developer Website](https://developer.twitter.com/en/portal/dashboard) and set up an application.
1. Clone this repository and open config.php. Enter your tokens into each field [from here](https://developer.twitter.com/en/portal/projects-and-apps).
1. Replace the images inside the images folder with your desired images. Ensure all images are named in numerical order (IE: 0.jpg, 1.jpg, 2.jpg, ...).
1. Open index.php and change the array on line 16 to the total number of images you placed in the image folder.
1. Copy lines 53-58 in index.php and paste a copy for each new image you added, if applicable, below the last div on line 77 where the HTML comment is.
1. Change the value to the value of the button to the image that it belongs to in your images folder.
1. Change the value of the image source to match the filename of the image it belongs to in your images folder.
1. Upload your code to desired server and visit the index.php page. Click an image, and Twitter should update your profile image.