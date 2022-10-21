$(document).ready(function () {
  $.validator.addMethod(
    "phoneVN",

    function (value, element) {
      return (
        this.optional(element) || /((09|03|07|08|05)+([0-9]{8})\b)/g.test(value)
      );
    },

    "Vui lòng nhập đúng số điện thoại"
  );

  $("#form-contact").validate({
    rules: {
      fullname: {
        required: true,

        maxlength: 30,
      },

      phone: {
        required: true,

        number: true,

        nowhitespace: true,

        maxlength: 10,

        phoneVN: true,
      },

      models: {
        required: true,
      },

      number_car: {
        required: true,

        maxlength: 8,
      },
    },

    messages: {
      fullname: {
        required: "Vui lòng nhập họ và tên",

        maxlength: "Vui lòng nhập không quá 30 ký tự",
      },

      phone: {
        required: "Vui lòng nhập số điện thoại",

        maxlength: "Vui lòng nhập không quá 10 số",

        nowhitespace: "Vui lòng không nhập khoảng trắng",

        number: "Vui lòng không nhập số",
      },

      models: {
        required: "Vui lòng chọn dòng xe",
      },

      number_car: {
        required: "Vui lòng nhập biển số xe",

        maxlength: "Vui lòng nhập không quá 8 ký tự",
      },
    },

    submitHandler: function (form) {
      $.ajax({
        dataType: "json",

        type: "POST",

        url: "modules/add_data_customers.php",

        data: $(form).serializeArray(),

        success: function (data) {
          if (data.status == 1) {
            $("#success").css("display", "block");

            $("#success .fullname").text(data.fullname);

            $("#success .code").text(data.code);

            $("#success .models").text(data.models);

            $("#success .phone").text(data.phone);

            $("#success .number_car").text(data.number_car);

            $("#success .qr_code").attr("src", data.qr_code);

            $("#success .download-img").attr("href", data.qr_code);
          }
        },
      });
    },
  });
});
