

<!-- Page Content -->
<div class="container content-top">
   <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-news">Thêm thành viên vào dự án
        </h1>
        <ol class="breadcrumb">
            <li><a href="http://qltbnsinhvien.esy.es/">Home</a>
            </li>
            <li><a href="http://qltbnsinhvien.esy.es/?c=quanly&a=taoDuan">Dự án</a>
            </li>
            <li class="active "><?php echo $_GET['tenproject'] ?></li>
        </ol>
    </div>
</div>
<a href="http://qltbnsinhvien.esy.es/?c=quanly&a=xemthanhvien&idproject=<?php echo $_GET['id'] ?>&tenduan=<?php echo $_GET['tenproject'] ?>"  style="float: right; "><i class="fa fa-plus-circle" aria-hidden="true"></i> Xem dánh sách thành viên dự án này</a>
<div class="row">
    <div class="col-md-6">
        <form action="http://qltbnsinhvien.esy.es/?c=quanly&a=quanlythanhvientrongduan_send" method="POST">
            <select class="form-control" name="username" style="width: 50%" required>
               <?php
               while ($kq_model = $row->fetch_assoc()) {
                    if($kq_model['username'] != $_COOKIE["User"] && $kq_model['username'] !=  "admin"){
                ?>      
                <option value="<?php echo $kq_model['username'] ?>"><?php echo $kq_model['username'] ?></option>
                <?php
            }}
            ?>
        </select><br>
        <input type="hidden" name="idproject" value="<?php echo $_GET['id'] ?>">
        <input type="submit" name="submit" value="THÊM THÀNH VIÊN VÀO" class="btn btn-primary">

    </form>
</div>
<div class="col-md-6">
    <h3 class="text-news" style="margin-top: -2px;">Hướng dẫn</h3>
    <p class="open-san-con">
        Người quản lý dự án sẽ toàn quyền thêm thành viên vào một dự án nào đó,
        thành viên được thêm vào dự án sẽ được tham gia dự án , mượn thiết bị.
    </p>
</div>
</div>
