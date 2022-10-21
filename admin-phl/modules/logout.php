<?php
require_once '../../config/config.php';
require_once '../../config/dbhelper.php';

    if (isset($_COOKIE['AccessToken'])) {
        $name = 'AccessToken';
        $value = $_COOKIE['AccessToken'];
        setcookie($name, $value, [
            'expires' => time() - 43200,
            'path' => '/',
            'domain' => '',
            'secure' => true,
            'httponly' => true,
	        'samesite' => 'Strict',
        ]);
        header("Location: ".$base_url.'admin-phl');
    }
?>