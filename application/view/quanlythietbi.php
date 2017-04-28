
<!-- Page Content -->
<div class="container content-top">

  <!-- Page Heading/Breadcrumbs -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Quản lý thiết bị
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://qltbnsinhvien.esy.es/">Home</a>
        </li>
        <li class="active ">Thiết bị</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <!-- Trigger the modal with a button -->
  <a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=themnsx"   style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Quản lý nhà sản xuất</a><br>
  <a href="#"  data-toggle="modal" data-target="#myModal" style="float: right; "><i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo thiết bị</a>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Tạo dự thiết bị</h4>
        </div>
        <div class="modal-body">
          
          <form action="http://qltbnsinhvien.esy.es/?a=themthietbi_send" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
              <label for="ten thiet bi">Mã thiết bị</label>
              <input type="text" class="form-control" name="ma_tb" value="" required>
            </div>
            <div class="form-group">
              <label for="ten thiet bi">Tên thiết bị</label>
              <input type="text" class="form-control" name="ten_tb" value="" required>
            </div>
            <div class="form-group">
              <label for="nha sx">Nhà sản xuất thiết bị</label>
              <select name="nha_sx" class="form-control">
                <?php
                  while($nsx = $row['nsx']->fetch_assoc()){
                ?>
                
                <option value="<?php echo $nsx['idnsx'] ?>"><?php echo $nsx['tennsx'] ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="tinh_trang">Tình trạng</label>
              <input type="text" class="form-control" name="tinh_trang" value="" required>
            </div>
            <div class="form-group">
              <label for="so_luong">Số lượng</label>
              <input type="number" class="form-control" name="so_luong" value="" required>
            </div>
            <div class="form-group">
              <label for="mo_ta">Mô tả thông tin thêm</label>
              <textarea name="mo_ta" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="title">Hình thiết bị</label>
              <input type="file" class="form-control" name="hinh_anh" id="ImagePath1">
              <img src="" id='output1' width='300px' name='hinh_anh' height='300px' alt='hình sản phẩm'>
            </div>
            <input type="hidden" name="token" value="<?php echo $row['token'] ?>">
            <button type="submit" name="submit" class="btn btn-primary ">Thêm thiết bị</button>
          </form>

        </div>

      </div>
    </div>
  </div>


  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">STT</th>
        <th class="text-center">Tên thiết bị</th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Số lượng còn lại</th>
        <th class="text-center">Mô tả</th>
        <th class="text-center">Nhà sản xuất</th>
        <th class="text-center">Hình ảnh minh hoạ</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php
      $i = 0;
      while ($kq_model = $row['data']->fetch_assoc()) {
        $i++;
        ?>      
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $kq_model['tenthietbi'] ?></td>
          <td><?php echo $kq_model['tinhtrang'] ?></td>
          <td><?php echo $kq_model['soluongconlai'] ?></td>
          <td><?php echo $kq_model['mota'] ?></td>
          <td><?php echo $kq_model['tennsx'] ?></td>
          <td><img src="img/<?php echo $kq_model['hinhanh'] ?>" width="100px" height="100px"></td>
          <td><a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=suathietbi&id=<?php echo $kq_model['idthietbi'] ?>"><i class="glyphicon glyphicon-edit" style="font-size: 22px"></i></a>
            <a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=deleteThietbi&id=<?php echo $kq_model['idthietbi'] ?>
              " onClick="javascript:return confirm('Bạn có muốn xoá sản phẩm: <?php echo $kq_model['tenthietbi'] ?>' );"> <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 25px"></i> </a></td>
            </tr>
            <?php
          }
          ?>
          
        </tbody>
      </table>
      <!-- /.row -->
      
      <hr>
      
      <!-- ./#loginForm-->



      <!-- /.container -->

      <script type="text/javascript">
        var openFile = function(event,name) {
          var input = event.target;

          var reader = new FileReader();
          reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById(name);
            output.src = dataURL;
          };
          reader.readAsDataURL(input.files[0]);
        };
        $("#ImagePath1").change(function(e){
          openFile(event,'output1');
        });

      </script>
