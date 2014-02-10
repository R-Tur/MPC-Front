<?
if (!(strcmp($_SERVER['PHP_AUTH_USER'],$CONFIG["user"]) == 0 && strcmp($_SERVER['PHP_AUTH_PW'],$CONFIG["pass"]) == 0)) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
} 
?>