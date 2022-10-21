<?php
    require_once '../../config/config.php';
    require_once '../../config/dbhelper.php';
?>
<?php 
    if(isset($_POST['view_customers_status']) && !empty($_POST['id_customers'])){

        $id_customers = mysqli_real_escape_string($conn, $_POST['id_customers']);

        $sql = "SELECT `id_customers`,`status` FROM `customers` WHERE `id_customers` = '$id_customers'";
        $product = executeResult($sql);
        foreach($product as $pd){
?>
    <input type="hidden" class="form-control" name="id_customers" value="<?php echo $pd['id_customers']?>" >
    <div class="form-group">
        <label for="">Trạng thái xử lý :</label>
        <div class="custom-control custom-radio">
    <input type="radio" id="customRadio1" name="status" value="0"
    <?php $pd['status'] == 0 ? print 'checked' : print '' ?> class="custom-control-input">
    <label class="custom-control-label" for="customRadio1">Chưa thanh toán</label>
    </div>
    <div class="custom-control custom-radio">
    <input type="radio" id="customRadio2" name="status" value="1"
    <?php $pd['status'] == 1 ? print 'checked' : print '' ?> class="custom-control-input" >
    <label class="custom-control-label" for="customRadio2">Đã thanh toán</label>
    </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary text-left">Cập nhật</button>
    </div>
<?php 
    }
}
?>
<?php 
    if(isset($_POST['view_customers_care']) && !empty($_POST['id_customers'])){

        $id_customers = mysqli_real_escape_string($conn, $_POST['id_customers']);

        $sql = "SELECT `id_customers`,`care` FROM `customers` WHERE `id_customers` = '$id_customers'";
        $care = executeResult($sql);
        foreach($care as $cr){
?>
    <input type="hidden" class="form-control" name="id_customers" value="<?php echo $cr['id_customers']?>" >
    <div class="form-group">
        <label for="">Trạng thái xử lý :</label>
        <div class="custom-control custom-radio">
    <input type="radio" id="customRadio1" name="care" value="0"
    <?php $cr['care'] == 0 ? print 'checked' : print '' ?> class="custom-control-input">
    <label class="custom-control-label" for="customRadio1">Chưa chăm sóc</label>
    </div>
    <div class="custom-control custom-radio">
    <input type="radio" id="customRadio2" name="care" value="1"
    <?php $cr['care'] == 1 ? print 'checked' : print '' ?> class="custom-control-input" >
    <label class="custom-control-label" for="customRadio2">Đã chăm sóc</label>
    </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary text-left">Cập nhật</button>
    </div>
<?php 
    }
}
?>