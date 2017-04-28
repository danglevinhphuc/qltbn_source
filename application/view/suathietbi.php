<?php
if(!isset($_SESSION['authenticate'])){
  header('location:?c=trangchu&a=index');
}
?>

<?php
$row1 = $row["thong_tin_tb"]->fetch_assoc();
?>
<div class="container content-top">

  <!-- Page Heading/Breadcrumbs -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Sửa Thiết Bị

      </h1>
      <ol class="breadcrumb">
        <li><a href="http://qltbnsinhvien.esy.es/">Home</a>
        </li>
        <li class="active">Sửa dự án</li>
        <li class="active"><?php echo $row1["tenthietbi"] ?></li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <form action="http://qltbnsinhvien.esy.es/?a=suathietbi_send" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="ma_tb"  value="<?php echo $_GET["id"] ?>">
    <div class="form-group">
      <label for="ten thiet bi">Tên thiết bị</label>
      <input type="text" name="ten_tb"  class="form-control" value="<?php echo $row1["tenthietbi"] ?>" required>
    </div>
    <div class="form-group">
      <label for="nha sx">Nhà sản xuất thiết bị</label>
      <select name="nha_sx" class="form-control">
        <?php
        while ($ten_nsx = $row['getName_nhasx']->fetch_assoc()) {
         
          if($ten_nsx['idnsx'] === $row1["idnsx"]){
           echo "<option value='".$ten_nsx['idnsx']."' selected>".$ten_nsx['tennsx']." </option>" ;
         }else{
           echo "<option value='".$ten_nsx['idnsx']."'>".$ten_nsx['tennsx']." </option>" ;
         }
       }
       ?>
     </select>
   </div>
   <div class="form-group">
    <label for="tinh_trang">Tình trạng</label>
    <input type="text"  class="form-control" name="tinh_trang" value="<?php echo $row1["tinhtrang"]?>" required>
  </div>
  <div class="form-group">
    <label for="tinh_trang">Số lượng</label>
    <input type="text" name="con_lai"  class="form-control" value="<?php echo $row1["soluongconlai"]?>" required>
  </div>
  <div class="form-group">
    <label for="mo_ta">Mô tả</label>
    
    <textarea name="mo_ta"  class="form-control " rows="3"><?php echo $row1["mota"]?></textarea>
  </div>
  <div class="form-group">
    <label for="title">Hình thiết bị</label>
    <input type="file" class="form-control" name="hinh_anh" id="ImagePath1">
    <input type="hidden" name="hinh_anh_cu" value="<?php echo $row1["hinhanh"]?>">

    <img src="img/<?php echo $row1["hinhanh"]?>" id='output1' width='300px' name='hinh_anh' height='300px' alt='hình sản phẩm'>
  </div>
  <input type="hidden" name="token" value="<?php echo $row["token"]?>">
  <button type="submit" name="submit" class="btn btn-primary">Sửa thiết bị</button>
  
</form>


<!-- /.row -->

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
<!-- jQuery -->
