<?php
require_once '../../config/config.php';
require_once '../../config/dbhelper.php';
require_once '../../class/function.php';
require_once '../modules/gettoken.php';
require_once '../modules/validatetoken.php';
//Lấy dữ liệu của token
$users = getToken();
$users = json_decode(json_encode($users), true);

    if(isset($_POST['customers'])){
        $output= array();
        $sql = "SELECT * FROM `customers`";
    
        $totalQuery = mysqli_query($conn,$sql);
        $total_all_rows = mysqli_num_rows($totalQuery);
       
        $columns = array(
            0 => 'id_customers',
            1 => 'code',
            2 => 'fullname',
            3 => 'phone',
            4 => 'models',
            5 => 'number_car',
            6 => 'qr_code',
            7 => 'status',
            8 => 'care',
            9 => 'date'
        );
        
        if(isset($_POST['search']['value']))
        {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE `code` like '%".$search_value."%'";
            $sql .= " OR `fullname` like '%".$search_value."%'";
            $sql .= " OR `phone` like '%".$search_value."%'";
            $sql .= " OR `models` like '%".$search_value."%'";
            $sql .= " OR `number_car` like '%".$search_value."%'";
        }
    
        if(isset($_POST['order']))
        {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
        }
        else
        {
            $sql .= " ORDER BY `date` ASC";
        }
    
        if($_POST['length'] != -1)
        {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $sql .= " LIMIT  ".$start.", ".$length;
        }	
       
        $query = mysqli_query($conn,$sql);
        $count_rows = mysqli_num_rows($query);
        $data = array();
    
        while($row = mysqli_fetch_assoc($query))
        {
            $sub_array = array();
            $sub_array[] = $row['id_customers'];
            $sub_array[] = $row['code'];
            $sub_array[] = $row['fullname'];
            $sub_array[] = $row['phone'];
            $sub_array[] = $row['models'];
            $sub_array[] = $row['number_car'];
            $sub_array[] = '<img src="'.$row['qr_code'].'" alt="qr"/>';
            $sub_array[] = $row['status'] == 0 ? '<span class="text-danger">Chờ thanh toán</span>'  : '<span class="text-success">Đã thanh toán</span>';
            $sub_array[] = $row['care'] == 0 ? '<span class="text-danger">Chưa chăm sóc</span>'  : '<span class="text-success">Đã chăm sóc</span>';
            $sub_array[] = date_format_vn($row['date']);
            $sub_array[] = 
            '
            '.$users['position'] == 0 ? ' <a title="Xóa" href="javascript:void();" data-id="'.$row['id_customers'].'"  
            class="btn btn-danger btn-sm deleteCustomers" >
            <i class="fas fa-trash-alt"></i>
            </a><a title="Chăm sóc" href="javascript:void();" data-id="'.$row['id_customers'].'" data-toggle="modal" data-target="#changeStatus" class="btn btn-warning btn-sm editBtnStatus">
            <i class="fas fa-thumbs-up"></i>
        </a>' : ' <a title="Xóa" href="javascript:void();" data-id="'.$row['id_customers'].'"  
        class="btn btn-danger btn-sm deleteCustomers" >
        <i class="fas fa-trash-alt"></i>
        </a><a title="Thanh toán" href="javascript:void();" data-id="'.$row['id_customers'].'" data-toggle="modal" data-target="#changeCare" class="btn btn-success btn-sm editBtnCare">
        <i class="far fa-check"></i>
    </a>'.'
            ';
            $data[] = $sub_array;
        }
    
        $output = array(
            'draw'=> intval($_POST['draw']),
            'recordsTotal' =>$count_rows ,
            'recordsFiltered'=>   $total_all_rows,
            'data'=>$data,
        );
        echo  json_encode($output);
    
    }
?>