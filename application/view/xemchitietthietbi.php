

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
                        <!--<small>Subheading</small>-->
                    </div>
                </h1>
                <div class="col-xs-4 col-md-2 pull-right">
                    <a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=quanlythietbi" ><i class="glyphicon glyphicon-file"></i>  Quản Lý Thiết Bị</a>
                </div>
            </div>


            <ol class="breadcrumb">
                <li><a href="index.html">Home</a>
                </li>
                <li class="active">Embedded</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <hr>
    <?php

    while ($kq_model = $row['ketqua']->fetch_assoc()) {
        ?>
        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                
                    <img class="img-responsive img-hover" src="img/<?php echo $kq_model['hinhanh'] ?>" alt="Thiết bị" style="height: 500px;width: 600px;">
                
            </div>
            <div class="col-md-5">
                <h3 class="text-news">Tên thiết bị:<?php echo $kq_model['tenthietbi'] ?></h3>
                <p class="text-justify open-san-con">
                    Mô tả:<?php echo $kq_model['mota'] ?>
                </p>
                <h3 class="text-news">Thông tin thêm</h3>
                <ul class="open-san-con">
                    <li>Số lượng: <?php echo $kq_model['soluongconlai'] ?></li>
                    <?php if($kq_model['soluongconlai'] > 0){
                        ?>
                    <li>Tình trạng: <?php echo $kq_model['tinhtrang'] ?></li>
                    <?php
                        }else{
                           echo '<li>Tình trạng: Số lượng đã hết không thể mượn</li>';
                        }
                    ?>
                    
                    <li>Nhà sản xuất: <?php echo $kq_model['tennsx'] ?></li>
                </ul>
                <div class="row">

                    <div class="col-md-8 " style="float: right;">
                    <?php
                        if(isset($_SESSION['authenticate'])){                    ?>
                        <a href="#" data-toggle="modal" data-target="#borrowForm" class="btn btn-lg btn-success">Mượn thiết bị</a>
                    <?php
                        }else{


                    ?>
                        <button class="btn btn-success btn-lg"    onClick="javascript:return confirm('Bạn phải đăng nhập ' );">Mượn thiết bị</button>
                    <?php
                        }
                    ?>
                    <?php if(isset($_SESSION['authenticate'])){
                    ?>   
                    <a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=deleteThietbi&id=<?php echo $_GET['ten'] ?>
" onClick="javascript:return confirm('Bạn có muốn xoá sản phẩm này');" class="btn btn-danger btn-lg">Xoá thiết bị</a>
                    <?php }else{?>
                    <a href="http://qltbnsinhvien.esy.es/" class="btn btn-danger btn-lg"    onClick="javascript:return confirm('Bạn phải đăng nhập ' );">Xoá thiết bị</a>
                    <?php }?>
                        
                    </div>
                </div>
                
            </div>
        </div>


        <?php
    }
    ?>
    <!-- /.row -->

    <hr>
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header news">Một số thiết bị khác</h3>
        </div>
        <?php 
        $pivot = 0;
        while ($thietbilienquan = $row['thietbilienquan']->fetch_assoc()) {
            if($pivot <4){

                $pivot++;
         ?>
        <div class="col-sm-3 col-xs-6 border-img chitiet" style="overflow: hidden;">
            
                <a  href="?c=trangchu&a=xemchitietthietbi&ten=<?php echo $thietbilienquan['idthietbi'] ?>"><img class="img-responsive img-hover img-related" src="img/<?php echo $thietbilienquan['hinhanh'] ?>" style="width: 250px  ;height: 200px;" alt="">
                <span class="txt font-30">

                        <i class="glyphicon glyphicon-play" style="font-size: 40px ; margin-left: 100px"></i>
                </span>
                    </a>

            <p class="name news"><?php echo $thietbilienquan['tenthietbi'] ?></span></p>
        </div>
        <?php
            }else{
                break;
            }
        }
        ?>

    </div>
    <!-- /.row -->

    <!-- Borrow Form -->
    <div id="borrowForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Mượn Thiết Bị</h4>
        </div>
        <div class="modal-body">
            <form action="http://qltbnsinhvien.esy.es/?c=thanhvien&a=muonthietbi_send" method="post" accept="utf-8">
                <label for="username">Username:</label>
                <?php 
                    if(isset($_COOKIE['User'])){

                    
                ?>
                <input type="text" name="username" class="form-control" value="<?php echo $_COOKIE['User'] ?>"  required><br>
                <?php
                    }else{


                ?>
                <input type="text" name="username" class="form-control" value=""  required><br>
                <?php
                    }
                ?>
                <label for="muon__du_an">Mượn cho dự án:</label>
                <select name="idproject" class="form-control">
                    <option value="KPJ">Không cho dự án</option>
                    <?php
                    while ($row1 = $row['data']->fetch_assoc()) {
                # code...
                        if($row1["idproject"] != "KPJ"){
                        ?>
                        <option value="<?php echo $row1["idproject"] ?>"><?php echo $row1["tenproject"]?></option>
                        <?php
                    }}
                    ?>
                </select><br>
                <label for="soluong">Số Lượng:</label>
                <input type="number" name="soluong" class="form-control" required><br>
                <input type="hidden" name="idThietbi" value="<?php echo $_GET['ten']?>">
                <input type="hidden" name="token" value="<?php echo $row['token'] ?>">
                <input type="submit" name="submit" class="btn btn-primary" value="Đăng Ký Mượn">
                <input type="reset" name="reset" class="btn btn-default" value="Reset Form">
            </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
</div>
                <!-- /.borrowForm -->