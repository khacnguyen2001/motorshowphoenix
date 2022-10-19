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

  $("#closeBtn").click(function () {
    $("#modal-form").hide();
  });

  $("#back").click(function () {
    $("#thongso").hide();
  });

  $("#back-rules").click(function () {
    $("#rules").hide();
  });

  $(document).on("click","#successBtn",function() {
    $('#success').show();
  });


  $(document).on("click","#thongsoBtn",function() {
    $('#thongso').show();
  });

  $("#thele").click(function () {
    $("#rules").show();
  });


});
// CLOSE FORM



