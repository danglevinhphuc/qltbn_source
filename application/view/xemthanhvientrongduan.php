       
<!-- Page Content -->
<div class="container content-top">

	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Xem thành viên trong dự án

			</h1>
			<ol class="breadcrumb">
				<li><a href="http://qltbnsinhvien.esy.es/">Home</a>
            </li>
            <li><a href="http://qltbnsinhvien.esy.es/?c=quanly&a=taoDuan">Dự án</a>
            </li>
            <li class="active "><?php echo $_GET['tenduan'] ?></li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
	
	<hr>
	
	<div class="danhsachduan">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center">STT</th>
					<th class="text-center">Username</th>
					<th class="text-center">ACTION</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
				$i = 0;
				while ($danhsachthanhvientrongduan = $row->fetch_assoc()) {
					$i++;
						
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $danhsachthanhvientrongduan['username']?></td>
						<td>
							<a href="http://qltbnsinhvien.esy.es/?c=quanly&a=xoaduanthanhvien&idproject=<?php echo $danhsachthanhvientrongduan['idproject'] ?>&iduser=<?php echo $danhsachthanhvientrongduan['username']?>" onClick="javascript:return confirm('Bạn có muốn xoá sản phẩm: <?php echo $danhsachthanhvientrongduan['username'] ?>' );"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 25px"></i> </a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>