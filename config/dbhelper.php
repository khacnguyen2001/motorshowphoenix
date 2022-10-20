<?php 
	require_once('config.php');
	//Đường dẫn mặc định trang web
	$base_url = 'http://localhost/motorshowphoenix/';
	//Đường dẫn mặc định trang web
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	date_default_timezone_set("Asia/Ho_Chi_Minh"); // Thiết lập múi giờ chuẩn
/*
	insert , update , delete -> sử dụng function
*/
	function execute($sql){
		// create connection tới database
		$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
		mysqli_set_charset($conn,'utf8');
		// query
		mysqli_query($conn,$sql);
		//đóng connection
		mysqli_close($conn);
	}
	function executeResult($sql){
		// create connection tới database
		$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
		mysqli_set_charset($conn,'utf8');
		// query
		$resultset = mysqli_query($conn,$sql);
		$list = [];
		while ($row = mysqli_fetch_array($resultset ,1)){
			$list[] = $row;
		}
		//đóng connection
		mysqli_close($conn);

		return $list;
	}
 ?>