
<nav class="navbar navbar-inverse navbar-fixed-top" id="edit-again-menu" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://qltbnsinhvien.esy.es/">
                <div class="logo"></div>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form action="http://qltbnsinhvien.esy.es/" method="GET" id="tim_computer">
              <input type="text" name="search" class="search">
          </form>        
          <ul class="nav navbar-nav navbar-left menu-focus">
          <li>
                    <form action="http://qltbnsinhvien.esy.es/" method="GET" id="tim_mobie" >
                          <input type="text" name="search" class="btn btn-default" >
                      </form>   
                  </li><br>
            <li>
                <a href="http://qltbnsinhvien.esy.es/"><i class="fa fa-home" aria-hidden="true"></i> Trang Chủ</a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-th-large" style="font-size: 20px;"></i> Thao Tác
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=xemthongtin"><i class="fa fa-cubes" aria-hidden="true"></i> Thiết Bị</a>
                    </li>
                    <?php if(isset($_SESSION['authenticate'])){
                        ?>   
                        <li>
                            <a href="http://qltbnsinhvien.esy.es/?c=quanly&a=taoDuan"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Dự Án</a>
                        </li>
                        <?php }else{?>
                        <li>
                            <a href="http://qltbnsinhvien.esy.es/?c=quanly&a=taoDuan"   onClick="javascript:return confirm('Bạn phải đăng nhập ' );"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Dự Án</a>
                        </li>
                        <?php }
                        if(isset($_SESSION['admin'])){
                            ?>
                            <li>
                                <a href="http://qltbnsinhvien.esy.es/?c=quanly&a=capquyennguoidung"><i class="fa fa-users" aria-hidden="true"></i> Cấp Quyền Cho Người Dùng</a>
                            </li>
                            <?php }
                            if(isset($_SESSION['quyenthietbi'])){
                             ?>
                             <li>
                                <a href="http://qltbnsinhvien.esy.es/?c=quanly&a=danhsachmuon"><i class="fa fa-users" aria-hidden="true"></i> Danh sách mượn thiết bị</a>
                            </li>
                            <?php 
                        }?>
                    </ul>
                </li>



                <?php if(isset($_SESSION['authenticate'])){
                    ?>   
                    <li>

                        <a href="http://qltbnsinhvien.esy.es/?c=quanly&a=dangxuat"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng Xuất</a>
                    </li>
                    <li>

                        <a href="http://qltbnsinhvien.esy.es/?c=quanly&a=quanlynguoidung"><i class="fa fa-user" aria-hidden="true"></i> Chào Bạn <?php echo $_COOKIE['User'] ?></a>
                    </li>
                    <?php }else{?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#loginForm"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng Nhập</a>
                    </li>
                    <?php }?>
                    <li>
                        <a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=about"><i class="fa fa-info" aria-hidden="true"></i> Giới Thiệu</a>
                    </li>

              </ul>

          </div>
          <!-- /.navbar-collapse -->
      </div>
  </nav>
