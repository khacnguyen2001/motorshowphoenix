<div class="container-fluid">
  <div class="mb-3 mt-3 text-center">
    <h5 class="text-center mt-3 text-uppercase">Danh sách khách hàng</h5>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <table id="customers" class="table table-striped table-bordered" style="width: 100%;">
        <thead>
            <th>Id</th>
            <th>Mã dự thưởng</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Dòng xe</th>
            <th>Biến số xe</th>
            <th>Qr_code</th>
            <th>Trạng thái đơn hàng</th>
            <th>Trạng thái chăm sóc</th>
            <th>Thời gian gửi</th>
            <th>Thao tác</th>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>

<div class="modal fade" id="changeStatus" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật trạng thái đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="fchangeStatus" class="needs-validation" novalidate>
      
      </form>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="changeCare" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật trạng thái chăm sóc</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="fchangeCare" class="needs-validation" novalidate>
      
      </form>
      </div>
      </div>
    </div>
  </div>
</div>
