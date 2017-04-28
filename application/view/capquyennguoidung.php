

<!-- Page Content -->
<div class="container content-top">
   <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-news">Cấp Quyền Người Dùng
        </h1>
        <ol class="breadcrumb">
            <li><a href="http://qltbnsinhvien.esy.es/">Home</a>
            </li>
            <li class="active ">Tạo quyền cho người dùng từ ADMIN</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="http://qltbnsinhvien.esy.es/?c=quanly&a=capquyennguoidung_send" method="POST">
            
            <select class="form-control" name="username" style="width: 50%">
               <?php

               while ($kq_model = $row->fetch_assoc()) {
                    if($kq_model['username'] != $_COOKIE["User"]){
                ?>      
                <option value="<?php echo $kq_model['username'] ?>"><?php echo $kq_model['username'] ?></option>
                <?php
            }}
            ?>
        </select><br>
        <label for>Quyền được mượn thiết bị</label> 
        <input type="checkbox" name="quyennguoidung" value="1"><br><br>
        <label for>Quyền tạo sửa và xoá dự án</label> 
        <input type="checkbox" name="quyenduan" value="1"><br><br>
        <label for>Quyền tạo sửa và xoá thiết bị</label>
        <input type="checkbox" name="quyenthietbi" value="1"><br>
        <input type="submit" name="submit" value="CẤP QUYỀN" class="btn btn-primary">
    </form>
</div>
<div class="col-md-6">
    <h3 class="text-news" style="margin-top: -2px;">Hướng dẫn</h3>
    <p class="open-san-con">
        Username được cấp quyền sẽ toàn quyền thực hiện các hành động
        như thêm thiết bị , xoá thiết bị , sửa thiết bị, tương tự dự án
        và người dùng có thể có quyền vừa là thiết bị vừa là dự án.
        Còn lại những Username khác chỉ có thể xem nhưng không thực hiện 
        các hành động thêm thiết bị , xoá thiết bị , sửa thiết bị, tương tự dự án.
    </p>
</div>
</div>
