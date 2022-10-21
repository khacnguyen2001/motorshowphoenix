<?php
    require_once '../config/config.php';
    require_once '../config/dbhelper.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $base_url?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
    <link rel="icon" href="https://aozoom.com.vn/wp-content/uploads/2021/07/cropped-cropped-aozoom-logo-32x32.png"
        sizes="32x32" />
    <link rel="stylesheet" href="admin-phl/public/css/login.css">
</head>

<body>

    <div class="panda">
        <div class="ear"></div>
        <div class="face">
            <div class="eye-shade"></div>
            <div class="eye-white">
                <div class="eye-ball"></div>
            </div>
            <div class="eye-shade rgt"></div>
            <div class="eye-white rgt">
                <div class="eye-ball"></div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
        </div>
        <div class="body"> </div>
        <div class="foot">
            <div class="finger"></div>
        </div>
        <div class="foot rgt">
            <div class="finger"></div>
        </div>
    </div>
    <form id="form-login">
        <div class="hand"></div>
        <div class="hand rgt"></div>
        <div class="box-logo"><img src="https://aozoom.com.vn/wp-content/uploads/2021/07/Untitled-2.png" alt="logo">
        </div>
        <div class="form-group">
            <label class="form-label">Tên tài khoản / Email</label>
            <input type="text" class="form-control" name="username" />

        </div>
        <div class="form-group">
            <label class="form-label">Mật khẩu</label>
            <input id="password" type="password" name="password" class="form-control" />

            <p class="error" id="error"></p>
            <button type="submit" class="btn">Đăng nhập</button>
        </div>
        <a class="forget">Quên mật khẩu</a>
    </form>

    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script>
    $(document).ready(function() {
        //UP DOWN PANDA
        $('#password').focusin(function() {
            $('form').addClass('up')
        });
        $('#password').focusout(function() {
            $('form').removeClass('up')
        });

        // Panda Eye move
        $(document).on("mousemove", function(event) {
            var dw = $(document).width() / 15;
            var dh = $(document).height() / 15;
            var x = event.pageX / dw;
            var y = event.pageY / dh;
            $('.eye-ball').css({
                width: x,
                height: y
            });
        });
        //FORM LOGIN ADMIN
        $("#form-login").validate({
            rules: {
                username: {
                    required: true,
                    nowhitespace: true,
                    maxlength: 50,
                },
                password: {
                    required: true,
                    nowhitespace: true,
                    minlength: 8,
                },
            },
            messages: {
                username: {
                    required: "Vui lòng nhập Tên tài khoản / Email",
                    nowhitespace: "Vui lòng không nhập khoảng trắng",
                    maxlength: "Vui lòng không nhập quá 50 ký tự"
                },
                password: {
                    required: "Vui lòng nhập mật khẩu",
                    nowhitespace: "Vui lòng không nhập khoảng trắng",
                    minlength: "Vui lòng nhập ít nhất 8 ký tự",
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "admin-phl/modules/login.php",
                    data: $(form).serializeArray(),
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 1) {
                            window.location = res.link;
                        } else {
                            $('#error').text(res.message);
                        }
                    },
                });
            },
        });
    })
    </script>
    <!-- javascript -->
</body>

</html>