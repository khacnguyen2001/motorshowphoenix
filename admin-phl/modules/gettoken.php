<?php
require_once '../../lib/php-jwt/src/BeforeValidException.php';
require_once '../../lib/php-jwt/src/ExpiredException.php';
require_once '../../lib/php-jwt/src/JWK.php';
require_once '../../lib/php-jwt/src/JWT.php';
require_once '../../lib/php-jwt/src/Key.php';
require_once '../../lib/php-jwt/src/SignatureInvalidException.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

    function getToken()

    {
        if(!empty($_COOKIE['AccessToken'])){
            $token = $_COOKIE['AccessToken'];
            $key = "Thaideptrai";
            $data = JWT::decode($token, new Key($key, 'HS256'));

            return $data;
        }
    }
?>