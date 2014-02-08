<?
if (!($_SERVER['PHP_AUTH_USER'] == $CONFIG["user"] && $_SERVER['PHP_AUTH_PW'] == $CONFIG["pass"])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorization is required!';
    exit;
} 
?>