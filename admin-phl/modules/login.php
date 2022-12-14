<?php
    require_once '../../config/config.php';
    require_once '../../config/dbhelper.php';

    //JWT
    require_once '../../lib/php-jwt/src/BeforeValidException.php';
    require_once '../../lib/php-jwt/src/ExpiredException.php';
    require_once '../../lib/php-jwt/src/JWK.php';
    require_once '../../lib/php-jwt/src/JWT.php';
    require_once '../../lib/php-jwt/src/Key.php';
    require_once '../../lib/php-jwt/src/SignatureInvalidException.php';

    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = md5($password);
        
        $sql = "SELECT * FROM `admin` WHERE `users_name` = '$username' AND `password` = '$password'
        || `email` = '$username' AND `password` = '$password'";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        if($row != NULL){

            $count = mysqli_num_rows($result);
            if($count == 1) {

                $key = 'Thaideptrai';

                $payload = [
                    'id_admin' => $row['id_admin'],
                    'fullname' => $row['fullname'],
                    'image' => $row['image'],
                    'position' => $row['position'],
                ];
                
                $jwt = JWT::encode($payload, $key, 'HS256');
                $name = 'AccessToken';
                $value = $jwt;
                setcookie($name, $value, [
                    'expires' => time() + 43200,
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => true,
		            'samesite' => 'Strict',
                ]);
                echo json_encode(array(
                    'status' => 1,
                    'link' => $base_url.'admin-phl/pages/customers.php'
                ));
                exit();

        }
    }else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'M???t kh???u ho???c t??i kho???n kh??ng ????ng ho???c b??? v?? hi???u h??a'
        ));
        exit();
    }   
}
?>