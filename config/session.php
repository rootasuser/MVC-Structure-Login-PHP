<?php
session_start();

// Set secure session settings
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_only_cookies', 1);

// Regenerate session ID to prevent fixation attacks
session_regenerate_id(true);
?>
