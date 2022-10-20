$(document).ready(function() {
    $('#customers').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        language: {
            lengthMenu: 'Hiện _MENU_ mẫu tin trên trang',
            zeroRecords: 'Không tìm thấy mẫu tin nào',
            info: 'Hiện trang _PAGE_ trên _PAGES_ trang',
            infoEmpty: 'Không có mẫu tin nào',
            infoFiltered:'',
            search : "Tìm kiếm:",
            
            buttons: {
                colvis: 'Chọn cột',
                copyTitle: 'Sao chép thành công',
                copySuccess: "Đã sao chép %d dòng vào clipboard"
            },
            paginate: {
                next:       ">>",
                previous:   "<<"
              },
        },
        dom: 'Bflrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                  columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                  columns: ':visible'
                }
            },
            {
                extend: 'spacer',
                style: 'bar',
                text: 'Xuất files'
            },
            {
                extend: 'csv',
                exportOptions: {
                  columns: ':visible',
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                  columns: ':visible',
                }
            },
            {
                extend: 'colvis',
                collectionLayout: 'fixed columns',
                collectionTitle: 'Bỏ cột không muốn'
            }
        ],
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'admin-phl/modules/fetch_data_customers.php',
          'data': {
            customers : true
          },
            
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [10]
          },

        ]
      });

      // Xóa mẫu tin khách hàng
      $(document).on('click', '.deleteCustomers', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id_customers = $(this).data('id');
        if (confirm("Bạn chắc chắc có muốn xóa mẫu tin này")) {
          $.ajax({
            url: 'admin-phl/modules/delete_data_customers.php',
            data: {
              delete_customers : true,
              id_customers: id_customers
            },
            type: "post",
            success: function(data) {
              var json = JSON.parse(data);
              status = json.status;
              if (status == 1) {
                $("#" + id_customers ).closest('tr').remove();
              } else {
                alert('Có lỗi gì đó');
                return;
              }
            }
          });
        } else {
          return null;
        }
      })

      // Xem trạng thái đơn hàng
    $(document).on('click', '.editBtnStatus', function(event) {
      var id_customers = $(this).data('id');
          $.ajax({
              url: 'admin-phl/modules/view_data_customers.php',
              data: {
              view_customers_status : true,
              id_customers : id_customers
              },
              type: "post",
              success: function(data) {
                  $('#fchangeStatus').html(data);
              }
          });
      })

      //Chỉnh sửa trạng thái đơn hàng
      $("#fchangeStatus").on('submit', function(e){
              e.preventDefault();
                  $.ajax({
                  type: 'POST',
                  url: 'admin-phl/modules/edit_data_customers.php',
                  data: new FormData(this),
                  dataType : 'json',
                  contentType: false,
                  cache: false,
                  processData:false,
                  success: function(response){ 
                      if(response.status == 1){
                          alert(response.message);
                          window.location.reload();
                      }else{
                          alert(response.message);
                      }
                      
                  }
              })
      });

         // Xem trạng thái chăm sóc
    $(document).on('click', '.editBtnCare', function(event) {
      var id_customers = $(this).data('id');
          $.ajax({
              url: 'admin-phl/modules/view_data_customers.php',
              data: {
              view_customers_care : true,
              id_customers : id_customers
              },
              type: "post",
              success: function(data) {
                  $('#fchangeCare').html(data);
              }
          });
      })

      //Chỉnh sửa trạng thái chăm sóc
      $("#fchangeCare").on('submit', function(e){
              e.preventDefault();
                  $.ajax({
                  type: 'POST',
                  url: 'admin-phl/modules/edit_data_customers.php',
                  data: new FormData(this),
                  dataType : 'json',
                  contentType: false,
                  cache: false,
                  processData:false,
                  success: function(response){ 
                      if(response.status == 1){
                          alert(response.message);
                          window.location.reload();
                      }else{
                          alert(response.message);
                      }
                      
                  }
              })
      });

});
