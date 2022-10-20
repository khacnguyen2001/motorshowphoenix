<?php
require_once '../config/config.php';
require_once '../config/dbhelper.php';
require_once '../lib/phpqrcode/qrlib.php';


if($_POST['fullname'] && $_POST['phone'] && $_POST['models'] && $_POST['number_car']){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $models = mysqli_real_escape_string($conn, $_POST['models']);
    $number_car = mysqli_real_escape_string($conn, $_POST['number_car']);
    $code = 'MTG-'.substr($number_car, -5);
    
    $url = 'uploads/qr/'.$code.'-'.time().'.png';
    $path = $base_url.$url;
	$name =  $path;
	QRcode::png($code,$name,'H',5,5);
    $qr_code = $url;
    
    $sql ="SELECT `phone` FROM `customers` WHERE `phone` = '$phone'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO `customers` (`code`,`fullname`,`phone`,`models`,`number_car`,`qr_code`) VALUES('$code','$fullname','$models','$number_car','$qr_code')";
        $result = mysqli_query($conn,$sql);
        echo json_encode(array(
            'status' => 1
            ));
        exit();
    }else{
        $sql = "UPDATE `customers` SET `code` = '$code', `fullname` = '$fullname', `phone` = '$phone',`models` = '$models', `number_car` = '$number_car', `qr_code` = '$qr_code' WHERE `phone` = $phone";
        $result = mysqli_query($conn,$sql);
        echo json_encode(array(
            'status' => 1
            ));
        exit();
    }

}