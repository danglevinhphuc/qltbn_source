       
<!-- Page Content -->
<div class="container content-top">

	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý dự án

			</h1>
			<ol class="breadcrumb">
				<li><a href="http://qltbnsinhvien.esy.es/">Home</a>
				</li>
				<li class="active">Dự án</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
	<!-- Trigger the modal with a button -->
	<a href="#" data-toggle="modal" data-target="#myModal" style="float: right; "><i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo dự án</a>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" >Tạo dự án mới</h4>
				</div>
				<div class="modal-body">
					
					<form action="http://qltbnsinhvien.esy.es/?c=quanly&a=taoduan_send" method="POST" >
						<label for="ma_du_an">Mã dự án</label>
						<input type="text" class="form-control" name="ma_du_an" required><br>
						<label for="ten_du_an">Tên dự án</label>
						<input type="text" class="form-control" name="ten_du_an" required><br>
						<label for="nguoi_phu_trach">Người phụ trách</label>
						<input type="text" class="form-control" name="nguoi_phu_trach" required><br>
						<input type="hidden" name="token" value="<?php echo $row["token"] ?>">
						<input type="submit" name="submit" class="btn btn-primary" value="Tao dự án">
						<input type="reset" name="" class="btn btn-default" value="reset form">
					</form>
				</div>
			</div>

		</div>
	</div>
	<!-- /.row -->
	
	<hr>
	
	<div class="danhsachduan">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center">STT</th>
					<th class="text-center">Tên dự án</th>
					<th class="text-center">Người phụ trách</th>
					<th class="text-center">Ngày tạo dự án</th>
					<th class="text-center">ACTION</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
				$i = 0;
				while ($danhsachduan = $row['data']->fetch_assoc()) {
					$i++;
						if($danhsachduan["tenproject"] != "KPJ"){
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><a href="http://qltbnsinhvien.esy.es/?c=quanly&a=chitietduan&id=<?php  echo $danhsachduan["idproject"]?>&tenproject=<?php  echo $danhsachduan["tenproject"]?>"><?php  echo $danhsachduan["tenproject"]?></a></td>
						<td><?php  echo $danhsachduan["nguoiphutrach"]?></td>
						<td><?php  echo $danhsachduan["ngaybatdau"]?></td>

						<td>
						<a href="http://qltbnsinhvien.esy.es/?c=quanly&a=quanlythanhvientrongduan&id=<?php echo $danhsachduan['idproject'] ?>&tenproject=<?php  echo $danhsachduan["tenproject"]?>" style="text-decoration: none"><i class="fa fa-plus" aria-hidden="true" style="font-size: 22px"></i> </a>
						<a href="http://qltbnsinhvien.esy.es/?c=quanly&a=suaduan&id=<?php echo $danhsachduan['idproject'] ?>"><i class="glyphicon glyphicon-edit" style="font-size: 22px"></i></a>
							<a href="http://qltbnsinhvien.esy.es/?c=quanly&a=xoaduan&id=<?php echo $danhsachduan['idproject'] ?>" onClick="javascript:return confirm('Bạn có muốn xoá sản phẩm: <?php echo $danhsachduan['idproject'] ?>' );"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 25px"></i> </a></td>
						</tr>
						<?php
					}}
					?>
				</tbody>
			</table>
		</div>