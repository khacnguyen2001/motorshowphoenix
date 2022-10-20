(function () {

   
    const second = 1000,
          minute = second * 60,
          hour = minute * 60,
          day = hour * 24;
  
    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = "10/21/",
        birthday = dayMonth + yyyy;
    
    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
      birthday = dayMonth + nextYear;
    }
    //end
    
    const countDown = new Date(birthday).getTime(),
        x = setInterval(function() {    
  
          const now = new Date().getTime(),
                distance = countDown - now;
  
          document.getElementById("days").innerText = Math.floor(distance / (day)),
            document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
            document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
            document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
        }, 0)
    }());
//ĐÓNG PHẦN HIỂN THỊ THÔNG BÁO
// CLICK SHOW FORM O PCy
$(document).ready(function () {
  $("#Mybtn-click").click(function () {
    $("#modal-form").show();
  });
// DONG FORM
  $("#closeBtn").click(function () {
    $("#modal-form").hide();
  });
// DONG THONG SO 
  $(document).on("click","#back",function() {
    $('#thongso1').hide();
    $('#thongso2').hide();
    $('#thongso3').hide();
    $('#thongso4').hide();
    $('#thongso5').hide();
  });
// DONG THE LE
  $("#back-rules").click(function () {
    $("#rules").hide();
  });

// HIEN THONG SO
  // $(document).on("click","#thongsoBtn",function() {
  //   $('#thongso').show();
  // });
// HIEN THE LE
  $("#thele").click(function () {
    $("#rules").show();
  });
// SHOW THONG SO MOBILE
  $(document).on("click","#clickBtn1",function() {
    $('#thongso1').toggle();
    $('.clickI').toggleClass('rotate');
  });

  $(document).on("click","#clickBtn2",function() {
    $('#thongso2').toggle();
    $('.clickI').toggleClass('rotate');
  });

  $(document).on("click","#clickBtn3",function() {
    $('#thongso3').toggle();
    $('.clickI').toggleClass('rotate');
  });

  $(document).on("click","#clickBtn4",function() {
    $('#thongso4').toggle();
    $('.clickI').toggleClass('rotate');
  });

  $(document).on("click","#clickBtn5",function() {
    $('#thongso5').toggle();
    $('.clickI').toggleClass('rotate');
  });

  // PC
  $(document).on("click","#thongsoBtn1",function() {
    $('#thongso1').toggle();
  });

  $(document).on("click","#thongsoBtn2",function() {
    $('#thongso2').toggle();
  });

  $(document).on("click","#thongsoBtn3",function() {
    $('#thongso3').toggle();
  });

  $(document).on("click","#thongsoBtn4",function() {
    $('#thongso4').toggle();
  });

  $(document).on("click","#thongsoBtn5",function() {
    $('#thongso5').toggle();
  });
});
// CLOSE FORM



