<!-- Page Content -->
<div class="container content-top">

	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Xem chi tiết dự án

			</h1>
			<ol class="breadcrumb">
				<li><a href="http://qltbnsinhvien.esy.es/">Home</a>
				</li>
				<li><a href="http://qltbnsinhvien.esy.es/?c=quanly&a=taoDuan">Dự án</a>
				</li>
				<li class="active"><?php echo $_GET['tenproject'] ?></li>
			</ol>
		</div>
	</div>

	
	<hr>
	
	<div class="danhsachduan">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center">STT</th>
					<th class="text-center">Tên thiết bị</th>
					<th class="text-center">Mô tả thiết bị</th>
					<th class="text-center">Hình ảnh thiết bị</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
				$i = 0;
				while ($danhsachthietbi = $row->fetch_assoc()) {
					$i++;
						
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $danhsachthietbi["tenthietbi"]; ?></td>
						<td><?php echo $danhsachthietbi["mota"]; ?></td>
						<td><img src="./img/<?php echo $danhsachthietbi["hinhanh"]; ?>" width="100px" height="100px"></td>
					</tr>
					<?php
					}
					?>
			</tbody>
			</table>
		</div>