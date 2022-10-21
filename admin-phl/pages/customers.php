<?php
     require_once '../../config/config.php';
     require_once '../../config/dbhelper.php';
     require_once('../modules/gettoken.php');
     require_once('../modules/validatetoken.php');

    //Lấy dữ liệu của token
    $users = getToken();
    $users = json_decode(json_encode($users), true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $base_url?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách hàng</title>
    <link rel="icon" sizes="32x32" href="https://aozoom.com.vn/wp-content/uploads/2021/07/cropped-cropped-aozoom-logo-32x32.png">
    <!-- fontawesome -->
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" rel="stylesheet" />
    <!-- fontawesome -->
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.css"/>

    <link rel="stylesheet" href="admin-phl/public/css/style.css">
</head>

<body>
<div class="container-admin">
    <!-- Sidebar -->
    <?php
        require_once '../pages/sidebar.php';
    ?>
       <!-- Main -->
        <div class="main">
           <?php
            require_once '../pages/topbar.php';
            require_once '../includes/main_customers.php';
           ?>
        </div>
    </div>

   <!-- Script -->
    <script src="admin-phl/public/js/main.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="admin-phl/public/js/customers.js"></script>
 
</body>

</html>