<?php
//Lấy đường dẫn trang hiện tại
date_default_timezone_set('Asia/Ho_Chi_Minh');
function date_format_vn($date_time)
{
  $date = date_create($date_time);
  $date_format = date_format($date,'d \t\h\g\ m, Y - H:i');
  return $date_format;
}
?> 