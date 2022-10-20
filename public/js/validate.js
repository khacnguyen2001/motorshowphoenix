
$(document).ready(function () {
    var form = $(".form-az");
    for (let i = 0; i < form.length; i++) {
        const element = form[i];
        $.validator.addMethod("phoneVN", function (value, element) {
            return this.optional(element) || /((09|03|07|08|05)+([0-9]{8})\b)/g.test(value)
        }, "Vui lòng nhập đúng số điện thoại");
        $(element).validate({
            rules: {
                fullname: {
                    required: true,
                    maxlength: 30
                },
                'data[phone]': {
                    required: true,
                    number: true,
                    nowhitespace: true,
                    maxlength: 10,
                    phoneVN: true
                },
                'data[location]': {
                    required: true,
                }
            },
            messages: {
                'data[name]': {
                    required: "Vui lòng nhập họ và tên",
                    maxlength: "Vui lòng nhập không quá 30 ký tự"
                },
                'data[phone]': {
                    required: "Vui lòng nhập số điện thoại",
                    maxlength: "Vui lòng nhập không quá 10 số",
                    nowhitespace: "Vui lòng không nhập khoảng trắng",
                    number: "Vui lòng không nhập số"
                },
                'data[location]': {
                    required: "Vui lòng chọn dòng xe"
                }
            }, submitHandler: function (form) {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: "",
                    data: $(form).serializeArray(),
                    success: function (data) {
                        console.log(data);
                    },
                });
            },
        });
    }
    
});

