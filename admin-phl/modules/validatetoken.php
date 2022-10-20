<?php
    require_once('../modules/gettoken.php');

    if(!empty(getToken())){
    
    }else{
        header("Location: ".$base_url.'admin-phl');
    }

?>