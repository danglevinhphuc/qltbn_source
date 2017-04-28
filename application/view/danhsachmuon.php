       
<!-- Page Content -->
<div class="container content-top">

	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh sách mượn

			</h1>
			<ol class="breadcrumb">
				<li><a href="http://qltbnsinhvien.esy.es/">Home</a>
				</li>
				<li class="active">Quản lý mượn
				</li>
			</ol>
		</div>
	</div>

	<!-- Modal -->
	<!-- /.row -->
	
	<hr>
	
	<div class="danhsachduan">
		<table class="table table-bordered" >
			<thead >
				<tr >
					<th class="text-center">STT</th>
					<th class="text-center">Username</th>
					<th class="text-center">Tên dự án tham gia</th>
					<th class="text-center">Tên thiết bị</th>
					<th class="text-center">Ngày mượn</th>
					<th class="text-center">Số lượng mượn</th>
					<th class="text-center">Trả</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
				$i = 0;
				while ($danhmuon = $row->fetch_assoc()) {
					$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php  echo $danhmuon["username"]?></td>
						<td><?php  echo $danhmuon["tenproject"]?></td>
						<td><?php  echo $danhmuon["tenthietbi"]?></td>
						<td><?php  echo $danhmuon["ngaymuon"]?></td>
						<td ><?php  echo $danhmuon["soluong"]?></td>
						<td><a style=" color: red;" href="http://qltbnsinhvien.esy.es/?c=quanly&a=thanhtoan&id=<?php echo $danhmuon['idborrow'] ?>&tb=<?php echo $danhmuon['idthietbi'] ?>&sl=<?php echo $danhmuon['soluong'] ?>" onClick="javascript:return confirm('Bạn có muốn xác nhận <?php echo $danhmuon["username"]?> đã trả thiết bị : <?php echo $danhmuon['tenthietbi'] ?> vào ngày mượn <?php echo $danhmuon["ngaymuon"]  ?>'  );" ><i class="fa fa-ban" aria-hidden="true" style="font-size: 30px;"></i> </a></td>
						</tr>
						<?php
					}
					?>
			</tbody>
		</table>
	</div>