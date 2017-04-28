<?php 
    if(isset($_SESSION['duan'])){

?>
   <script type="text/javascript">
       $(document).ready(function() {
         $('#myModal').modal({
            show: true,
        })
     });
 </script>
<?php
    }
?>
 <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-     labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id="myModalLabel">Thông báo mới</h4>
       </div>
       <div class="modal-body">
            <?php
                if(isset($_SESSION['duan'])){
                    echo "Bạn vừa được thêm vào dự án : <b>".$_SESSION['duan']."</b>";
                }
            ?>
       </div>
       <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
   </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
 </div><!-- /.modal -->

<div class="loader container" >
        <div class="blob blob-0"></div>
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
        <div class="blob blob-4"></div>
        <div class="blob blob-5"></div>
    </div>
        

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide main">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('img/keyboard_letter-wallpaper-2880x1620.jpg');"></div>
                <div class="carousel-caption open-san-con">                    
                    <a href="https://www.electronicsweekly.com/news/embedded-world-your-electronics-weekly-guide-3-2017-03/" style="color: white;"><h2>Embedded World 2017: Get the full Electronics Weekly Guide</h2></a>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/ram_memory_chip-wallpaper-3554x1999.jpg');"></div>
                <div class="carousel-caption open-san-con">
                    <a href="https://www.electronicsweekly.com/market-sectors/internet-of-things/quick-starting-iot-node-design-just-got-easier-2017-03/" style="color: white;"><h1>Quick-starting your IoT node design just got easier</h1></a>
                </div>
            </div>
             <div class="item">
                <div class="fill" style="background-image:url('img/563186963-509280-binary-chip-computers-cpu-micro-microprocessors-motherboards-technology.jpg');"></div>
                <div class="carousel-caption open-san-con">
                    <a href="https://www.electronicsweekly.com/news/ew-dev-kits-tackle-iot-diversity-2017-03/" style="color: white;"><h2>EW: Dev kits tackle IoT diversity</h2>
                    </a>                    
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container main">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header news">
                    Thông báo mới
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h4 class="text-news"><i class="fa fa-fw fa-check"></i> Ngày hội việc làm CNTT 2017</h4>
                    </div>
                    <div class="panel-body open-san-con">
                        <p>Nhằm tạo cầu nối giữa doanh nghiệp-nhà tuyển dụng và sinh viên-nguồn nhân lực, qua đó làm tăng cơ hội việc làm cho sinh viên. Khoa Công nghệ Thông tin và Truyền thông, Trường Đại học Cần Thơ tổ chức ngày hội việc làm CNTT năm 2017</p>
                        <a href="http://www.cit.ctu.edu.vn/index.php/b-n-tin/tieu-di-m/380-ngay-h-i-vi-c-lam-cntt-2017" class="btn btn-info open-san-con">Chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h4 class="text-news"><i class="fa fa-fw fa-gift"></i> Thông tin tuyển sinh 2017</h4>
                    </div>
                    <div class="panel-body open-san-con">
                        <p>TUYỂN SINH ĐH CHÍNH QUY NĂM 2017 <br>Mã trường tuyển sinh:  TCT <br>TỔNG CHỈ TIÊU: 8.017 <br>Thời gian đăng ký xét tuyển: Theo lịch tuyển sinh hệ chính quy của Bộ GD và ĐT.</p>
                        <a href="http://tuyensinh.ctu.edu.vn/" class="btn btn-info open-san-con">Chi Tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-news"><i class="fa fa-fw fa-compass"></i> Giới thiệu khoa CNTT&amp;TT</h4>
                    </div>
                    <div class="panel-body open-san-con">
                        <p>Khoa CNTT&amp;TT - Trường Đại học Cần Thơ được thành lập năm 1994 trên cơ sở Trung tâm Điện tử và Tin học. Nhiệm vụ  của khoa là đào tạo đại học, sau đại học, nghiên cứu khoa học và chuyển giao công nghệ trong lĩnh vực CNTT&amp;TT</p>
                        <a href="http://www.cit.ctu.edu.vn/index.php/gi-i-thi-u" class="btn btn-info open-san-con">Đọc Thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header news">Thiết bị mới</h2>
            </div>
            <?php 
                $pivot = 0;
                while ($row1 = $row->fetch_assoc()) {
                    if($pivot < 3){
                        $pivot++;
                
            ?>
            <div class="col-md-4 col-sm-6 border-img" style="overflow: hidden;">
                <a href="?c=trangchu&a=xemchitietthietbi&ten=<?php echo $row1['idthietbi'] ?>">
                    <img class="img-responsive img-portfolio img-hover" src="img/<?php echo $row1['hinhanh'] ?>" alt="Thiết bị 1" style="height: 200px;width: 400px;">
                    <span class="txt font-30">
                        <i class="glyphicon glyphicon-play" style="font-size: 40px"></i>
                    </span>
        
                </a>
                <p class="name news"><?php echo $row1['tenthietbi'] ?></span></p>
            </div>
            <?php
                }else{
                    break;
                }}
            ?>    
        </div>
        <!-- /.row -->

       