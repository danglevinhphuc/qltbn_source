<script type="text/javascript">
    $(document).ready(function(){
        $("#dang_ky").click(function(){
            $("h4").text("Đăng Ký");
            $("#form_dangnhap").hide(500);
            $("#form_dangky").show(500);
        });
        $("#back").click(function(){
            $(".chang_title").text("Đăng Nhập");
            $("#form_dangnhap").show(500);
            $("#form_dangky").hide(500);
        });
    });
</script>
<!-- #loginForm -->
<div id="loginForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title chang_title" >Đăng Nhập</h4>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="borrowForm" id="form_dangnhap" accept="UTF-8" action="http://qltbnsinhvien.esy.es/?c=quanly&a=authenticate" method="POST">
                    <fieldset class="form-group">
                        <label class="control-label col-md-4" for="username">Username:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="username" required placeholder="Username">
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-4" for="password">Password:</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="password" required placeholder="Password">
                        </div>
                    </fieldset>

                    <fieldset class="form-group text-center">
                        <button type="submit" class="btn btn-primary col-md-offset-8" name="login">Đăng nhập</button>
                        <button type="button" class="btn btn-warning" id="dang_ky" name="register" data-toggle="modal" data-target="#registerForm">Đăng kí</button>
                    </fieldset>
                </form>
                <form class="form-horizontal" role="borrowForm" id="form_dangky" accept="UTF-8" action="http://qltbnsinhvien.esy.es/?c=quanly&a=signup" method="POST" style="display: none">
                        
                        <label>USERNAME <span class='bac-buoc'> *</span></label>
                        <input type="text"  class="form-control" name="username" required><br>
                        <label>PASSWORD <span class='bac-buoc'> *</span></label>
                        <input type="password" class="form-control" name="password" required><br>
                        <label>Nhập lại PASSWORD <span class='bac-buoc'> *</span></label>
                        <input type="password" class="form-control" name="password_again" required><br>
                        <label>Họ <span class='bac-buoc'> *</span></label>
                        <input type="text" class="form-control"  name="ho"><br>
                        <label>Tên <span class='bac-buoc'> *</span></label>
                        <input type="text" class="form-control" name="ten"><br>
                        <label>Ngày sinh <span class='bac-buoc'> *</span></label>
                        <input type="date" class="form-control"  name="ngaysinh" ><br>
                        <label>SĐT <span class='bac-buoc'> *</span></label>
                        <input type="number" class="form-control"  name="sdt" ><br>
                        <label>Địa chỉ <span class='bac-buoc'> *</span></label>
                        <input type="text" class="form-control"  name="diachi" ><br>
                        <label>Email <span class='bac-buoc'> *</span></label>
                        <input type="email" class="form-control"  name="email" ><br>
                        <label>Đơn vị <span class='bac-buoc'> *</span></label>
                        <input type="text" class="form-control"  name="donvi" ><br>
                        <label>Trình độ <span class='bac-buoc'> *</span></label>
                        <select name="trinhdo" class="form-control">
                            <option value="Sinh viên">Sinh viên</option>
                            <option value="Tiến sĩ">Tiến sĩ</option>
                            <option value="Thạc sĩ">Thạc sĩ</option>
                            <option value="Phó giáo sư">Phó giáo sư</option>
                            <option value="Giáo sư">Giáo sư</option>
                        </select><br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Đăng Ký"> 
                        <input type="reset" class="btn btn-warning" name="" value="Quay Lại" id="back">
                </form>
            </div>
        </div>
    </div>
</div>