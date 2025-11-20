<?php
// Prevent direct access to this file
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('Direct access not permitted');
}

// X.com API Credentials
define ('API_KEY', 'enter_your_api_key_here');
define ('API_KEY_SECRET', 'enter_your_api_key_secret_here');
define ('BEARER_TOKEN', 'enter_your_bearer_token_here');

// User Access Tokens
// For profile updates generate these through OAuth flow
define ('ACCESS_TOKEN', 'enter_your_access_token_here');
define ('ACCESS_TOKEN_SECRET', 'enter_your_access_token_secret_here');