# Twitpic

Automatically update your Twitter profile picture by selecting from a list of images on your website.

**Notice**: This project no longer works for automatic profile updates. X.com (Twitter) has moved profile image updates to their Pro/Enterprise API tiers which cost $42,000+ per month.

1. **Clone**

   ```bash
   git clone https://github.com/yourusername/twitpic.git
   ```

2. **Add Your Images**
   - Place your profile image options in the `images/` folder
   - Supported formats: JPG, JPEG, PNG, GIF, WebP, BMP
   - Name them anything you want (e.g., `profile1.jpg`, `casual.png`, etc.)

3. **Configure API Keys**
   - Open `config.php`
   - Replace placeholder values with your API credentials:

   ```php
   define ('API_KEY', 'your_api_key');
   define ('API_KEY_SECRET', 'your_api_secret');
   define ('ACCESS_TOKEN', 'your_access_token');
   define ('ACCESS_TOKEN_SECRET', 'your_access_token_secret');
   ```

4. **Upload**
   - Upload the entire folder to your web server
   - Visit `yoursite.tld/twitpic/index.php`
   - Browse your image options
   - Manually update your profile on [X.com](https://x.com/settings/profile)

## License

MIT License - feel free to use this code for your own projects.
