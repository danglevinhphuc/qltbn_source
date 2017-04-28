<?php
if(!isset($_SESSION['authenticate'])){
  header('location:?c=trangchu&a=index');
}
?>

<script type="text/javascript">
	function select(x){
     for(i = 1 ; i <= 3 ; i++){
        if(i == x){
           $('#ac'+i).animate({padding: "10px 10px 10px 55px"})
           .css({
              'background-color': '#337AB7',
              'color':'#fff'
          });
           $('#info'+i).css("display", "block");
       }else{
           $('#ac'+i).animate({padding: "10px"})
           .css({
              "color": "#2196f3",
              "background-color":"#fff"
          });
           $('#info'+i).css("display", "none");
       }				
   }
}
</script>
<style type="text/css">
	span{
		cursor: pointer;
	}
</style>
<div class="container content-top">
  <!-- Page Heading/Breadcrumbs -->
  <div class="row">
    <div class="col-lg-12">
        <div class="row">
           <h1 class="page-header">
               <div class="col-xs-6 col-md-4">
                   <h1><i class="fa fa-user" aria-hidden="true"></i> User: <?php echo $_COOKIE['User']?></h1>
               </a>
               <!--<small>Subheading</small>-->
           </div>
       </h1>
   </div>


   <ol class="breadcrumb">
    <li><a href="http://qltbnsinhvien.esy.es/">Home</a>
    </li>
    <li class="active">Quản Lý Người Dùng</li>
</ol>
</div>
</div>
<!-- /.row -->

<hr>
<div class="row">
   <div class="col-md-4">
      <ul  class="nav nav-pills nav-stacked">
         <li><a href="#" giatri="thongtinchung" style="padding-left: 55px; color: #fff; background-color: #337AB7;" id="ac1" onclick="select(1)"><i class="fa fa-info" aria-hidden="true"></i> Thông tin cá nhân</a></li>
         <li><a href="#" giatri="lichsumuon"  style="color: #2196f3;" id="ac2" onclick="select(2)"><i class="fa fa-history" aria-hidden="true"></i> Lịch Sử Mượn</a></li>
         <li><a href="#" giatri="doimatkhau" style="color: #2196f3;" id="ac3" onclick="select(3)"><i class="fa fa-exchange" aria-hidden="true"></i> Đổi Mật Khẩu</a></li>
     </ul>
 </div>
 <div class="col-md-8" style="border-left:1px solid #000">
  <section>
     <div id="info1">
        <?php
							// XUat du lieu ve nguoi dung thong tin ca nhan
        $row1 = $row["result_user"]->fetch_assoc();
        echo "<span class='title'> Họ và tên: </span>".$row1["ho"]." ".$row1["ten"]."<br>";
        echo "<span class='title'> Ngày sinh: </span>".$row1["ngaysinh"]."<br>";
        echo "<span class='title'> Địa chỉ: </span>".$row1["diachi"]."<br>";
        echo "<span class='title'> SĐT: </span>".$row1["sdt"]."<br>";
        echo "<span class='title'> Email: </span>".$row1["email"]."<br>";
        echo "<span class='title'> Đơn vị: </span>".$row1["donvi"]."<br>";
        echo "<span class='title'> Trình độ: </span>".$row1["trinhdo"]."<br>";
        ?>
    </div>
    <div id="info2" style="display: none">

        <?php
		//XUat lich su nguoi dung da muon dung cu
        if($row["result_history"]->num_rows >0){
            echo "<table class='table table-bordered'>" ;
            echo '<thead >';
            echo '    <tr>';
            echo '        <th class="text-center">Số lần</th>';
            echo '        <th class="text-center">Thiết bị</th>';
            echo '        <th class="text-center">Số lượng đã mượn</th>';
            echo '        <th class="text-center">Ngày mượn</th>';
            echo '        <th class="text-center">Hình ảnh</th>';
            echo '        <th class="text-center">Trả thiết bị</th>';
            echo '    </tr>';
            echo '</thead>';
            echo '<tbody>';
            $i = 0;
            while ($row2 = $row["result_history"]->fetch_assoc()) {
                                # code...
                $i++;
               echo '<tr class="text-center">';
               echo "<td>".$i."</td>";
               echo "<td>".$row2["tenthietbi"]."</td>";
               echo "<td>".$row2["soluong"]."</td>";
               echo "<td>".$row2["ngaymuon"]."</td>";
               echo "<td>"."<img src='img/".$row2["hinhanh"]."' width='100px' height='100px'></td>";
               if(intval($row2["soluong"]) === 0 ){
                   echo "<td><i class='fa fa-check-circle-o' aria-hidden='true' style='color:green ; font-size:25px'></i></td>";
               }else{
                    echo "<td><i class='fa fa-ban' aria-hidden='true' style='color:red ; font-size:25px'></i></td>";
               }
               echo '</tr>';
           }
           echo '</tbody>';
           echo "</table>" ;
       }else{
           echo "<p class='text-news'>KHÔNG CÓ MƯỢN THIẾT BỊ LẦN NÀO</p>";
       }
       ?>
   </div>
   <div id="info3" style="display: none">
    <h2 class="text-news">Đổi Mật Khẩu</h2>
    <form class="form" action="http://qltbnsinhvien.esy.es/?c=quanly&a=doimatkhau" method="POST">
       <label>Mật khẩu mới </label>
       <input type="password" class="form-control" name="password"><br>
       <label>Nhập lại mật khẩu </label>
       <input type="password" class="form-control" name="password_again"><br>
       <label>Email xác nhận </label>
       <input type="email" class="form-control" name="email">
       <input type="hidden" class="form-control" name="username" value="<?php echo $_COOKIE['User']?>">
       <br><input type="submit" class="btn btn-danger" name="submit" value="Đổi Mật Khẩu">
   </form>
</div>
</section>
</div>
</div>