<?php
    require_once('../../config/config.php');
    require_once('../../config/dbhelper.php');

    if(isset($_POST['status']) && !empty($_POST['id_customers'])){
        $id_customers = mysqli_real_escape_string($conn, $_POST['id_customers']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
    
        $sql = "UPDATE `customers` SET `status` = '$status' WHERE `id_customers` = '$id_customers'";
        $result = mysqli_query($conn,$sql);
        if($result == true){
            echo json_encode(array(
                'status' => 1,
                'message' => 'Cập nhật trạng thái đơn hàng thành công'
            ));
            exit();
        }else{
            echo json_encode(array(
                'status' => 0,
                'message' => 'Cập nhật trạng thái đơn hàng thất bại'
            ));
            exit();
        }
    }

    if(isset($_POST['care']) && !empty($_POST['id_customers'])){
        $id_customers = mysqli_real_escape_string($conn, $_POST['id_customers']);
        $care = mysqli_real_escape_string($conn, $_POST['care']);
    
        $sql = "UPDATE `customers` SET `care` = '$care' WHERE `id_customers` = '$id_customers'";
        $result = mysqli_query($conn,$sql);
        if($result == true){
            echo json_encode(array(
                'status' => 1,
                'message' => 'Cập nhật trạng thái chăm sóc thành công'
            ));
            exit();
        }else{
            echo json_encode(array(
                'status' => 0,
                'message' => 'Cập nhật trạng thái chăm sóc thất bại'
            ));
            exit();
        }
    }
?>