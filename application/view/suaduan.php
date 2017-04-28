<?php
	// lay lai du lieu cu~
	$row1 = $row['data']->fetch_assoc();
?>

        <div class="container content-top">

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa dự án

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li class="active">Sửa dự án</li>
                        <li class="active"><?php echo $row1["tenproject"] ?></li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <form action="http://qltbnsinhvien.esy.es/?c=quanly&a=suaduan_send" method="POST" >
		<label for="ten_du_an">Ten du an</label>
		<input type="text" name="ten_du_an" class="form-control" value="<?php echo $row1["tenproject"] ?>" required><br>
		<label for="nguoi_phu_trach">Nguoi phu trach</label>
		<input type="text" name="nguoi_phu_trach" class="form-control" value="<?php echo $row1["nguoiphutrach"] ?>" required><br>
		<input type="hidden" name="ma_du_an" value="<?php echo $_GET["id"]?>">
		<input type="hidden" name="token" value="<?php echo $row['token'] ?>">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Sửa">
		
	</form>

        <!-- /.row -->
        

        <hr>
