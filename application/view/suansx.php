<?php
	// lay lai du lieu cu~
	$row1 = $row['data']->fetch_assoc();
?>

        <div class="container content-top">

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa nhà sản xuất

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="http://qltbnsinhvien.esy.es/">Home</a>
                        </li>
                        <li ><a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=themnsx">Quản lý thiết bị </a></li>
                        <li class="active"><?php echo $row1["tennsx"] ?></li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <form action="http://qltbnsinhvien.esy.es/?c=trangchu&a=suansx_send" method="POST" >
                        <label for="ten_nsx">Tên nsx <span class='bac-buoc'> *</span></label>
                        <input type="text" class="form-control" name="ten_nsx" value="<?php echo $row1['tennsx'] ?>" required><br>
                        <label for="dia_chi_nsx">Địa chỉ nsx <span class='bac-buoc'> *</span></label>
                        <input type="text" class="form-control" name="dia_chi_nsx" value="<?php echo $row1['diachinsx'] ?>" required><br>
                        <label for="quoc_gia">Quốc gia <span class='bac-buoc'> *</span></label>
                        <input type="text" class="form-control" name="quoc_gia" value="<?php echo $row1['quocgia'] ?>" required><br>
                        <label for="ma_buu_dien">Mã bưu điện</label>
                        <input type="text" class="form-control" name="ma_buu_dien" value="<?php echo $row1['mabuudien'] ?>" ><br>
                        <label for="so_tk_ngan_hang">Số tk ngân hàng</label>
                        <input type="text" class="form-control" name="so_tk_ngan_hang" value="<?php echo $row1['sotknganhang'] ?>" ><br>
                        <label for="sdt_nsx">SĐT <span class='bac-buoc'> *</span></label>
                        <input type="number" class="form-control" name="sdt_nsx" value="<?php echo $row1['sdt'] ?>" required><br>
                        <label for="email_nsx">Email <span class='bac-buoc'> *</span></label>
                        <input type="email" class="form-control" name="email_nsx" value="<?php echo $row1['email'] ?>" required><br>
                        <input type="hidden" name="ma_nsx" value="<?php echo $_GET['id'] ?>">
                        <input type="hidden" name="token" value="<?php echo $row["token"] ?>">
                        <input type="submit" name="submit" class="btn btn-primary" value="Sửa nhà sx">
                        <input type="reset" name="" class="btn btn-default" value="reset form">
		
	</form>

        <!-- /.row -->
        

        <hr>
