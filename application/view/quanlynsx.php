       
<!-- Page Content -->
<div class="container content-top">

	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý nhà sản xuất

			</h1>
			<ol class="breadcrumb">
				<li><a href="http://qltbnsinhvien.esy.es/">Home</a>
				</li>
				<li><a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=quanlythietbi">Thiết bị</a>
				</li>
				<li class="active">Nhà sản xuất</li>

			</ol>
		</div>
	</div>
	<!-- /.row -->
	<!-- Trigger the modal with a button -->
	<a href="#" data-toggle="modal" data-target="#myModal" style="float: right; "><i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo nsx mới</a>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" >Tạo nhà sản xuất mới</h4>
				</div>
				<div class="modal-body">
					
					<form action="http://qltbnsinhvien.esy.es/?c=trangchu&a=themnsx_send" method="POST" >
						<label for="ma_nsx">Mã nsx <span class='bac-buoc'> *</span></label>
						<input type="text" class="form-control" name="ma_nsx" required><br>
						<label for="ten_nsx">Tên nsx <span class='bac-buoc'> *</span></label>
						<input type="text" class="form-control" name="ten_nsx" required><br>
						<label for="dia_chi_nsx">Địa chỉ nsx <span class='bac-buoc'> *</span></label>
						<input type="text" class="form-control" name="dia_chi_nsx" required><br>
						<label for="quoc_gia">Quốc gia <span class='bac-buoc'> *</span></label>
						<input type="text" class="form-control" name="quoc_gia" required><br>
						<label for="ma_buu_dien">Mã bưu điện</label>
						<input type="text" class="form-control" name="ma_buu_dien" ><br>
						<label for="so_tk_ngan_hang">Số tk ngân hàng</label>
						<input type="text" class="form-control" name="so_tk_ngan_hang" ><br>
						<label for="sdt_nsx">SĐT <span class='bac-buoc'> *</span></label>
						<input type="number" class="form-control" name="sdt_nsx" required><br>
						<label for="email_nsx">Email <span class='bac-buoc'> *</span></label>
						<input type="email" class="form-control" name="email_nsx" required><br>
						<input type="hidden" name="token" value="<?php echo $row["token"] ?>">
						<input type="submit" name="submit" class="btn btn-primary" value="Tạo nhà sản xuất">
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
					<th class="text-center">Tên NSX</th>
					<th class="text-center">Địa chỉ NSX</th>
					<th class="text-center">Quốc gia</th>
					<th class="text-center">Mã bưu điện</th>
					<th class="text-center">Số tk ngân hàng</th>
					<th class="text-center">SĐT</th>
					<th class="text-center">Email</th>
					<th class="text-center">ACTION</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
				$i = 0;
				while ($danhnsx = $row['data']->fetch_assoc()) {
					$i++;
						
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php  echo $danhnsx["tennsx"]?></td>
						<td><?php  echo $danhnsx["diachinsx"]?></td>
						<td><?php  echo $danhnsx["quocgia"]?></td>
						<td><?php  echo $danhnsx["mabuudien"]?></td>
						<td><?php  echo $danhnsx["sotknganhang"]?></td>
						<td><?php  echo $danhnsx["sdt"]?></td>
						<td><?php  echo $danhnsx["email"]?></td>
						<td><a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=suansx&id=<?php echo $danhnsx['idnsx'] ?>"><i class="glyphicon glyphicon-edit" style="font-size: 22px"></i></a>
							<a href="http://qltbnsinhvien.esy.es/?c=trangchu&a=xoansx&id=<?php echo $danhnsx['idnsx'] ?>" onClick="javascript:return confirm('Bạn có muốn xoá sản phẩm: <?php echo $danhnsx['idnsx'] ?>' );"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 25px"></i> </a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>