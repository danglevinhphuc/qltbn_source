

 <div class="container content-top">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                
                <div class="row">
                <h1 class="page-header">
                    <div class="col-xs-6 col-md-3">
                        <a href="product.php" class="thumbnail">
                            <p class="sr-only">Embedded</p>
                            <img data-src="holder.js/100%x180" src="img/embedded.png" alt="Thiết bị">
                        </a>
                        
                    </div>
                </h1>
                
                <?php if(isset($_SESSION['authenticate'])){
                    ?>   
                    <div class="col-xs-4 col-md-2 pull-right">
                    <a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=quanlythietbi"><i class="glyphicon glyphicon-file"></i> Quản Lý Thiết Bị</a>
                </div>
                    <?php }else{?>
                    <div class="col-xs-4 col-md-2 pull-right">
                    <a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=quanlythietbi"  onClick="javascript:return confirm('Bạn phải đăng nhập ' );"><i class="glyphicon glyphicon-file"></i> Quản Lý Thiết Bị</a>
                </div>
                    <?php }?>
                </div>
                
                
                <ol class="breadcrumb">
                    <li><a href="http://qltbnsinhvien.esy.es/">Home</a>
                    </li>
                    <li class="active">Embedded</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <hr>
        <?php
	
while ($kq_model = $row->fetch_assoc()) {
?>
        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="?c=trangchu&a=xemchitietthietbi&ten=<?php echo $kq_model['idthietbi'] ?>">
                    <img class="img-responsive img-hover" src="img/<?php echo $kq_model['hinhanh'] ?>" alt="Thiết bị" style="height: 300px;width: 500px;">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-news">Tên thiết bị:<?php echo $kq_model['tenthietbi'] ?></h3>
                <h4 class="open-san-con">Tình trạng: <?php echo $kq_model['tinhtrang'] ?></h4>
                <p class="text-justify open-san-con">
                    Mô tả:<?php echo $kq_model['mota'] ?>

                </p>
                <a class="btn btn-primary btn-lg" href="?c=trangchu&a=xemchitietthietbi&ten=<?php echo $kq_model['idthietbi'] ?>">Xem chi tiết thiết bị</a>
            </div>
        </div>

        <hr>
        <?php
	}
?>
