<?php
require_once('../../config/config.php');
require_once('../../config/dbhelper.php');

    //xóa khách hàng
    if(isset($_POST['delete_customers']) && isset($_POST['id_customers'])){
        $id_customers = $_POST['id_customers'];

        $sql = "SELECT `qr_code` FROM `customers` WHERE `id_customers` = '$id_customers'";
        $customers = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($customers) != 0){
            while($rows = mysqli_fetch_array($customers)){
                $sql = "DELETE FROM `customers` WHERE `id_customers` = '$id_customers'";
                $result =mysqli_query($conn,$sql);
                if($result) {
                    unlink('../../'.$rows['qr_code']);
                    echo json_encode(array(
                        'status' => 1,
                        ));
                        exit();
                }else{
                    echo json_encode(array(
                        'status' => 0,
                        ));
                        exit();
                }
            }
        }
    }

?>