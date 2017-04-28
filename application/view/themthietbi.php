
<form action="http://qltbnsinhvien.esy.es/?a=themthietbi_send" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="ten thiet bi">Ma thiet bi</label>
    <input type="text" name="ma_tb" value="" required>
  </div>
  <div class="form-group">
    <label for="ten thiet bi">Ten thiet bi</label>
    <input type="text" name="ten_tb" value="" required>
  </div>
  <div class="form-group">
    <label for="nha sx">Nha sx thiet bi</label>
    <select name="nha_sx">
    <?php
      while ($kq_model = $row['data']->fetch_assoc()) {
        # code...
      
    ?>
      <option value="<?php echo $kq_model['idnsx']?>"><?php echo $kq_model['tennsx']?></option>
    <?php
      }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="tinh_trang">Tinh trang</label>
    <input type="text" name="tinh_trang" value="" required>
  </div>
  <div class="form-group">
    <label for="so_luong">So luong </label>
    <input type="text" name="so_luong" value="" required>
  </div>
  <div class="form-group">
    <label for="mo_ta">Mo ta </label>
    <textarea name="mo_ta" required></textarea>
  </div>
  <div class="form-group">
    <label for="title">Hình thiet bi</label>
    <input type="file" class="form-control" name="hinh_anh" id="ImagePath1">
    <img src="" id='output1' width='300px' name='hinh_anh' height='300px' alt='hình sản phẩm'>
  </div>
  <input type="hidden" name="token" value="<?php echo $row['token'] ?>">
  <button type="submit" name="submit" class="btn btn-primary ">ADD</button>
</form>

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