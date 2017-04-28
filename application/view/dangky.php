<form action="http://qltbnsinhvien.esy.es/?c=quanly&a=signup" method="POST">
	<h1>DANG KY NGUOI DUNG</h1>
	<label>USERNAME</label>
	<input type="text"  name="username" required><br>
	<label>PASSWORD</label>
	<input type="password" name="password" required><br>
	<label>Nhap lai Password</label>
	<input type="password" name="password_again" required><br>
	<label>Ho</label>
	<input type="text"  name="ho"><br>
	<label>Ten</label>
	<input type="text"  name="ten"><br>
	<label>Ngay sinh</label>
	<input type="date"  name="ngaysinh" ><br>
	<label>SDT</label>
	<input type="number"  name="sdt" ><br>
	<label>Dia chi</label>
	<input type="text"  name="diachi" ><br>
	<label>Email</label>
	<input type="email"  name="email" ><br>
	<label>Don vi</label>
	<input type="text"  name="donvi" ><br>
	<label>Trinh do</label>
	<select name="trinhdo">
		<option value="hocsinh">Hoc sinh</option>
		<option value="tiensi">Tien si</option>
		<option value="thacsi">Thac si</option>
		<option value="phogiaosu">Pho giao su</option>
		<option value="giaosu">Giao su</option>
	</select><br>
	<input type="hidden" name="token" value="<?php echo $row ?>">
	<input type="submit" name="submit" value="DANG KY"> 
	<input type="reset" name="" value="reset form dang ky">
</form>