<?php
class Model{
	private $db;
	private $classname;
	function __construct(){
		$this->db= new Database();
		$this->classname = get_class($this);
	}
	// hàm mặc định quay lại trang
	public static function  back($noidung){
		echo "<script>";
		echo "
		time = null;
		function move(){
			window.history.back()
		}
		timer=setTimeout('move()',2000)
		";
		echo "</script>";
		echo "<center><h1 style='color:blue'>".$noidung."</h1></center>";
	}
	public function getDatabase_full(){
		$talbe = strtolower($this->classname);
		$sql = "SELECT * FROM `$talbe`";
		 $query = $this->db->Thucthi($sql);
		 return $query;
	}
	// Ham xem thong tin thiet bi
	public function xemThongtin($idsp = null,$tim = null ,$name_table_join =null){
		$fix_id= trim($idsp);
		// chong sql injection
		$fix_id = $this->db->real_escape_string($fix_id);
		$talbe = strtolower($this->classname);
		if($idsp && !$tim  ){
			$sql = "SELECT  * FROM `$talbe`,`$name_table_join` where idthietbi = '".$fix_id."' and `$talbe`.idnsx= `$name_table_join`.idnsx ORDER BY idthietbi  DESC";
			$ketqua = $this->db->Thucthi($sql);
		}elseif($idsp && $tim || !$idsp  && $tim){
			$sql = "SELECT  * FROM `$talbe`,`$name_table_join` where tenthietbi like '%".$tim."%' and `$talbe`.idnsx= `$name_table_join`.idnsx ORDER BY idthietbi  DESC";
			$ketqua = $this->db->Thucthi($sql);
		}
		else{
			$sql = "SELECT  * FROM `$talbe`,`$name_table_join` where  `$talbe`.idnsx= `$name_table_join`.idnsx  ORDER BY idthietbi  DESC ";
			$ketqua = $this->db->Thucthi($sql);
		}
		return $ketqua;
	}
	public function xemThongtin_sanphamlienquan(){
		$talbe = strtolower($this->classname);
		$sql = "SELECT  * FROM `$talbe` ORDER BY rand() ";
			$ketqua = $this->db->Thucthi($sql);
		return $ketqua;
	}
	// Ham them thiet bi
	public function addThietbi($thietbi = array()){
		$fix_ma_tb= trim($thietbi["ma_tb"]);
		$fix_mo_ta= trim($thietbi["mo_ta"]);
		$fix_ten_sp= trim($thietbi["ten_tb"]);
		$fix_nha_sx= trim($thietbi["nha_sx"]);
		$fix_tinh_trang= trim($thietbi["tinh_trang"]);
		$fix_con_lai= trim($thietbi["con_lai"]);
		$fix_hinh_and= trim($thietbi["hinh_anh"]);


		$fix_ma_tb = $this->db->real_escape_string($fix_ma_tb);
		$fix_mo_ta = $this->db->real_escape_string($fix_mo_ta);
		$fix_ten_sp = $this->db->real_escape_string($fix_ten_sp);
		$fix_nha_sx = $this->db->real_escape_string($fix_nha_sx);
		$fix_tinh_trang = $this->db->real_escape_string($fix_tinh_trang);
		$fix_hinh_and = $this->db->real_escape_string($fix_hinh_and);
		$talbe = strtolower($this->classname);
		
		$sql = "insert into `$talbe` values('$fix_ma_tb','$fix_ten_sp','$fix_nha_sx','$fix_tinh_trang','','$fix_con_lai','$fix_mo_ta','$fix_hinh_and')";
		$query = $this->db->Thucthi($sql);
		if($query){
			// gan bien quay lại
			$this::back("Thêm thành công");
		}else{
			// gan bien quay lại
			$this::back("Thiết bị đã tồn tại hãy chọn tên khác");
		}
	}
	// Ham xoa thiet bi
	public function xoaThietbi($id){
		$id_tb= trim($id);
		$id_tb = $this->db->real_escape_string($id_tb);
		$talbe = strtolower($this->classname);
		$sql = "DELETE FROM `$talbe` where  idthietbi= '$id_tb'";
		$query = $this->db->Thucthi($sql);
		if($query){
			// gan bien quay lại
			$this::back("Xoá thành công");
		}else{
			// gan bien quay lại
			$this::back("Thiết bị không được toàn quyền xoá  hãy chọn tên khác");
		}
	}
	public function suaThietbi($id_tb){
		$id_tb= trim($id_tb);
		$id_tb = $this->db->real_escape_string($id_tb);
		$talbe = strtolower($this->classname);
		$sql = "SELECT  * FROM `$talbe` where idthietbi = '".$id_tb."' ";
		$ketqua = $this->db->Thucthi($sql);
		return $ketqua;
	}
	public function suaThietbi_value($thietbi = array()){
		$fix_id = trim($thietbi["ma_tb"]);
		$fix_ten_sp= trim($thietbi["ten_tb"]);
		$fix_nha_sx= trim($thietbi["nha_sx"]);
		$fix_tinh_trang= trim($thietbi["tinh_trang"]);
		$fix_con_lai= trim($thietbi["con_lai"]);
		$fix_mo_ta = trim($thietbi["mo_ta"]);
		$fix_hinh_anh= trim($thietbi["hinh_anh"]);

		$fix_ten_sp = $this->db->real_escape_string($fix_ten_sp);
		$fix_nha_sx = $this->db->real_escape_string($fix_nha_sx);
		$fix_tinh_trang = $this->db->real_escape_string($fix_tinh_trang);
		$fix_hinh_and = $this->db->real_escape_string($fix_hinh_anh);
		$talbe = strtolower($this->classname);
		
		$sql = "UPDATE `$talbe` SET tenthietbi = '$fix_ten_sp', idnsx='$fix_nha_sx',tinhtrang='$fix_tinh_trang',soluongconlai='$fix_con_lai' ,mota='$fix_mo_ta',hinhanh='$fix_hinh_anh' where idthietbi ='$fix_id'";
		
		$query = $this->db->Thucthi($sql);
		if($query){
			// gan bien quay lại
			$this::back("Sửa thành công");
		}else{
			// gan bien quay lại
			$this::back("Thiết bị không tồn tại hãy chọn tên khác");
		}
	}
	/*** 
		Lay danh sach nha sx
	***/
	public function getName_nhasx(){
		$sql = "SELECT idnsx, tennsx FROM provider ";
		
		$query = $this->db->Thucthi($sql);
		return $query;
	}
	/*** 
		Lay tat ca du an ra
	**/
	public function getDuan($id=null){
		$talbe = strtolower($this->classname);
		if($id){
			$sql = "SELECT * FROM `$talbe` where idproject = '".$id."' ";	
		}else{
			$sql = "SELECT * FROM `$talbe` ";	
		}
		
		$query = $this->db->Thucthi($sql);
		return $query;
	}
	/** 
		Tao du an
	**/
	public function createProject($thongtin_project= array()){
		// chong sql injection
		$fix_ma_du_an= trim($thongtin_project["ma_du_an"]);
		$fix_ten_du_an= trim($thongtin_project["ten_du_an"]);
		$fix_nguoi_phu_trach= trim($thongtin_project["nguoi_phu_trach"]);
		$fix_ngay_tao= trim($thongtin_project["ngay_tao"]);

		$fix_ma_du_an = $this->db->real_escape_string($fix_ma_du_an);
		$fix_ten_du_an = $this->db->real_escape_string($fix_ten_du_an);
		$fix_nguoi_phu_trach = $this->db->real_escape_string($fix_nguoi_phu_trach);
		$fix_ngay_tao = $this->db->real_escape_string($fix_ngay_tao);

		$talbe = strtolower($this->classname);
		
		$sql = "insert into `$talbe` values('$fix_ma_du_an','$fix_ten_du_an','$fix_nguoi_phu_trach','$fix_ngay_tao')";
		$query = $this->db->Thucthi($sql);
		if($query){
			// gan bien quay lại
			$this::back("Tạo dự án thành công");
		}else{
			// gan bien quay lại
			$this::back("Dự án đã tồn tại hãy chọn tên khác");
		}
	}
	/** 
		Sua du an
	**/
	public function editProject($thongtin_project= array()){
		// chong sql injection
		$fix_ma_du_an= trim($thongtin_project["ma_du_an"]);
		$fix_ten_du_an= trim($thongtin_project["ten_du_an"]);
		$fix_nguoi_phu_trach= trim($thongtin_project["nguoi_phu_trach"]);
		

		$fix_ma_du_an = $this->db->real_escape_string($fix_ma_du_an);
		$fix_ten_du_an = $this->db->real_escape_string($fix_ten_du_an);
		$fix_nguoi_phu_trach = $this->db->real_escape_string($fix_nguoi_phu_trach);
		

		$talbe = strtolower($this->classname);
		
		$sql = "UPDATE `$talbe` SET tenproject = '$fix_ten_du_an', nguoiphutrach='$fix_nguoi_phu_trach' where idproject ='$fix_ma_du_an'";
		$query = $this->db->Thucthi($sql);
		if($query){
			// gan bien quay lại
			$this::back("Sửa dự án thành công");
		}else{
			// gan bien quay lại
			$this::back("Dự án không tồn tại hãy chọn tên khác");
		}
	}
	/** 
		Xoa du an
	**/
	public function xoaduan_send($id){
		$id_da= trim($id);
		$id_da = $this->db->real_escape_string($id_da);
		$talbe = strtolower($this->classname);
		$sql = "DELETE FROM `$talbe` where  idproject= '$id_da'";
		$query = $this->db->Thucthi($sql);
		if($query){
			// gan bien quay lại
			$this::back("Xoá thành công");
		}else{
			// gan bien quay lại
			$this::back("Dự án không được toàn quyền xoá hãy chọn tên khác");
		}
	}
	public function checkData($data,$table,$key){
		 $sql = "SELECT * FROM `$table` where $key = '$data'";
		 $query = $this->db->Thucthi($sql);
		 return $query;
	}
	public function dangkymuon($thongtinmuon = array()){
		// chong sql injection
		$fix_username= trim($thongtinmuon["username"]);
		$fix_idproject= trim($thongtinmuon["idproject"]);
		$fix_idThietbi= trim($thongtinmuon["idThietbi"]);
		$fix_ngay_muon= trim($thongtinmuon["ngay_muon"]);
		$soluong = $thongtinmuon["soluong"];

		$fix_username = $this->db->real_escape_string($fix_username);
		$fix_idproject = $this->db->real_escape_string($fix_idproject);
		$fix_idThietbi = $this->db->real_escape_string($fix_idThietbi);
		$fix_ngay_muon = $this->db->real_escape_string($fix_ngay_muon);
		//LAy bang
		$talbe = strtolower($this->classname);
		// kiem tra ton tai massv khong
		$check_mssv = $this->checkData($fix_username,'user','username');
		if($check_mssv->num_rows > 0){
			$get_data_project = $this->checkData($fix_idproject,'project','idproject');
			//print_r($get_data_project->fetch_assoc());
			// xuat du lieu tu project gom co ten va ngay ket thuc
			$get_info_project = $get_data_project->fetch_assoc();
			
			// Kiem tra ngay neu ngay muon ma tre~ hon ngay dang ky thi k thuc hien
				/*
					lay du lieu thuc thiet bi
					check dieu kien va update lai thong tin cho thiet bi
				*/
				$get_data_devices = $this->checkData($fix_idThietbi,'devices','idthietbi');
				$get_info_devices = $get_data_devices->fetch_assoc();
				$get_soluongconlai = $get_info_devices["soluongconlai"];
				$get_soluongdamuon = $get_info_devices["soluongdamuon"];
				if($soluong <= $get_soluongconlai){
					$get_soluongconlai= $get_soluongconlai - $soluong;
					$get_soluongdamuon = $get_soluongdamuon+$soluong;
					$sql_devices = "UPDATE `devices` SET soluongdamuon = $get_soluongdamuon, soluongconlai=$get_soluongconlai where idthietbi ='$fix_idThietbi'";
					$query = $this->db->Thucthi($sql_devices);
					// neu thuc hien thanh cong viec thay doi thi them vao
					if($query){
						$sql_borrow = "INSERT into `$talbe` values('','$fix_username','$fix_idproject','$fix_idThietbi','$fix_ngay_muon',$soluong)";
						$this->db->Thucthi($sql_borrow);
						$this::back("Đăng ký thành công");
					}else{
						
						$this::back("Đăng ký không thành công");
					}
				}else{
					$this::back("Số lượng không đủ để mượn hiện tại chỉ còn: $get_soluongconlai");	
				}

				//$query = $this->db->Thucthi($sql);
			
		}else{
			
			$this::back("Mssv không tồn tại");
		}
	}
	/*** 
		CHung thuc username & password
	***/
	public function authenticate($thongtindangnhap = array()){
				// chong sql injection
		$fix_username= trim($thongtindangnhap["username"]);
		$fix_password= trim($thongtindangnhap["password"]);


		$fix_username = $this->db->real_escape_string($fix_username);
		$fix_password = $this->db->real_escape_string($fix_password);
		$talbe = strtolower($this->classname);
		$sql = "SELECT * FROM `$talbe` where username = '$fix_username' and password ='$fix_password'";

		$query = $this->db->Thucthi($sql);
		$exit = $query->num_rows;
		//kim tra quyen de cho hanh dong thiet bi va du an
		$check_quyen = $this->checkData($fix_username,'phanquyen','username');

		if($exit >0){
			// gan bien quay lại
				$_SESSION['authenticate'] = 1;
				setcookie("User",$fix_username,time() + 90000);
				$row = $check_quyen->fetch_assoc();
				if($check_quyen->num_rows > 0 && $row['quyenthietbi'] !=2 && $row['quyenduan'] !=2 && $row['quyennguoidung'] !=2){
					
					$quyenthietbi = $row['quyenthietbi'];
					$quyenduan = $row['quyenduan'];
					$quyennguoidung = $row['quyennguoidung'];
					if($quyenthietbi){
						$_SESSION['quyenthietbi'] = 1;
					}
					if($quyenduan){
						$_SESSION['quyenduan'] = 1;
					}
					if($quyennguoidung){
						$_SESSION['quyennguoidung'] = 1;
					}
				}elseif($check_quyen->num_rows > 0 && $row['quyenthietbi'] ==2 && $row['quyenduan'] ==2  && $row['quyennguoidung'] ==2){
					$_SESSION["admin"] = 1;
				}
				// lay thong tin thanh vien trong du an ra de thong bao cho nguoi dung
				$thanh_vien = $this->getDuantrongdanhsachthanhvientronduan($fix_username);
				// xuat danh sach du an cua thnanh vien
				if($thanh_vien->num_rows != 0){
					$ten_project_tv = $thanh_vien->fetch_assoc();
					$_SESSION["duan"] = $ten_project_tv["tenproject"];

				}
				$this::back("Đăng nhập thành công");
				// authenticate dung de dang nhap dang xuat 
				// Cookie user dung de luu ten ng dung
		}else{
			// gan bien quay lại
				$this::back("Đăng nhập thất bại");
		}
	}
	/*** 
		Lay du lieu nguoi dung dang nhap
	**/
	public function getUser($username){
		// chong sql injection
		$fix_username= trim($username);
		$fix_username = $this->db->real_escape_string($fix_username);
		$talbe = strtolower($this->classname);
		// Cau lenh cho lich su muon
		$query_user = $this->checkData($username,$talbe,'username');
		$sql_history = "SELECT tenthietbi,ho,ten,soluong,ngaymuon,hinhanh from `$talbe` , borrow, devices  where `$talbe`.username = '$username' and `$talbe`.username = `borrow`.username and `borrow`.idthietbi = `devices`.idthietbi  ";
		$query_history = $this->db->Thucthi($sql_history);

		// lay 2 ket qua dua vao mang
		$query = array(
			'result_user' => $query_user,
			'result_history' => $query_history,
		);

		return $query;
	}
	/**** 
		**DAng ky nguoi dung 
	***/
	public function dangkyUser($thongtindangky){
		// chong sql injection
		$fix_username= trim($thongtindangky["username"]);
		$fix_password= trim($thongtindangky["password"]);
		$fix_ho= trim($thongtindangky["ho"]);
		$fix_ten= trim($thongtindangky["ten"]);
		$fix_ngaysinh= trim($thongtindangky["ngaysinh"]);
		$fix_diachi= trim($thongtindangky["diachi"]);
		$fix_email= trim($thongtindangky["email"]);
		$fix_donvi= trim($thongtindangky["donvi"]);
		$fix_trinhdo= trim($thongtindangky["trinhdo"]);
		$sdt = $thongtindangky["sdt"];

		$talbe = strtolower($this->classname);
		$fix_username = $this->db->real_escape_string($fix_username);
		$fix_password = $this->db->real_escape_string($fix_password);
		$fix_ho = $this->db->real_escape_string($fix_ho);
		$fix_ten = $this->db->real_escape_string($fix_ten);
		$fix_ngaysinh = $this->db->real_escape_string($fix_ngaysinh);
		$fix_diachi = $this->db->real_escape_string($fix_diachi);
		$fix_email = $this->db->real_escape_string($fix_email);
		$fix_donvi = $this->db->real_escape_string($fix_donvi);
		$fix_trinhdo = $this->db->real_escape_string($fix_trinhdo);
		
		$sql = "insert into `$talbe` values('$fix_username','$fix_password','$fix_ho','$fix_ten','$fix_ngaysinh','$fix_diachi','$sdt','$fix_email','$fix_donvi','$fix_trinhdo')";
		
		$query = $this->db->Thucthi($sql);
		if($query){
			// gan bien quay lại
			$this::back("Đăng ký thành công");
		}else{
			// gan bien quay lại
			$this::back("USERNAME đã tồn tại hãy chọn tên khác");
		}
	}
	/**** 
		Chuc nang cho nguoi dung doi mat khau
	**/
	public function changPass($thongtindoimk = array()){
		// chong sql injection
		$fix_password= trim($thongtindoimk["password"]);
		$fix_email= trim($thongtindoimk["email"]);
		$fix_username= trim($thongtindoimk["username"]);

		$talbe = strtolower($this->classname);
		$fix_password = $this->db->real_escape_string($fix_password);
		$fix_email = $this->db->real_escape_string($fix_email);
		$fix_username = $this->db->real_escape_string($fix_username);
		
		$sql_check_user = "SELECT * FROM `$talbe` where username = '$fix_username' and email= '$fix_email'";
		$query_check_user =  $this->db->Thucthi($sql_check_user);
		if($query_check_user->num_rows > 0){
			$sql_update_pass = "UPDATE `$talbe` SET password = '$fix_password' where username = '$fix_username'";
			
			$query_update_pass = $this->db->Thucthi($sql_update_pass);
			
			if($query_update_pass){
				// gan bien quay lại
				$this::back("Đổi mật khẩu thành công");
			}else{
				// gan bien quay lại
				$this::back("Đổi mật khẩu khong thanh cong");
			}
		}else{
			$this::back("USERNAME không  tồn tại hãy chọn lai email");
		}
	}
	// Cấp quyền ngườu dùng
	public function Permission($quyen = array()){
		// chong sql injection
		$fix_username= trim($quyen["username"]);
		$fix_quyenthietbi= trim($quyen["quyenthietbi"]);
		$fix_quyenduan= trim($quyen["quyenduan"]);
		$fix_quyennguoidung= trim($quyen["quyennguoidung"]);

		$talbe = strtolower($this->classname);
		$fix_username = $this->db->real_escape_string($fix_username);
		$fix_quyenthietbi = $this->db->real_escape_string($fix_quyenthietbi);
		$fix_quyenduan = $this->db->real_escape_string($fix_quyenduan);
		$fix_quyennguoidung = $this->db->real_escape_string($fix_quyennguoidung);

		$check = $this->checkData($fix_username,$talbe,'username');
		if($check->num_rows == 0){
			$sql = "INSERT into `$talbe` values('','$fix_username','$fix_quyenthietbi','$fix_quyenduan','$fix_quyennguoidung')";
			$query = $this->db->Thucthi($sql);
			if($query){
				// gan bien quay lại
				$this::back("Cấp quyền  thành công");
			}else{
				// gan bien quay lại
				$this::back("Cấp quyền không thành công");
			}	
		}else{
			$sql = "UPDATE `$talbe` SET quyenthietbi = '$fix_quyenthietbi',quyenduan='$fix_quyenduan',quyennguoidung ='$fix_quyennguoidung' where username = '$fix_username'";
			$query = $this->db->Thucthi($sql);
			if($query){
				// gan bien quay lại
				$this::back("Cấp quyền lại thành công");
			}else{
				// gan bien quay lại
				$this::back("Cấp quyền lại không thành công");
			}
		}
		/**/
	}
	/*** 
		** THEM SUA XOA NHA SX	
	***/
	// THEM 
	public function themNsx($thongtin_nsx = array()){
		// chong sql injection
		$fix_ma_nsx= trim($thongtin_nsx["ma_nsx"]);
		$fix_ten_nsx= trim($thongtin_nsx["ten_nsx"]);
		$fix_dia_chi_nsx= trim($thongtin_nsx["dia_chi_nsx"]);
		$fix_quoc_gia= trim($thongtin_nsx["quoc_gia"]);
		$fix_ma_buu_dien= trim($thongtin_nsx["ma_buu_dien"]);
		$fix_so_tk_ngan_hang= trim($thongtin_nsx["so_tk_ngan_hang"]);
		$fix_sdt_nsx= trim($thongtin_nsx["sdt_nsx"]);
		$fix_email_nsx= trim($thongtin_nsx["email_nsx"]);

		$talbe = strtolower($this->classname);
		$fix_ma_nsx = $this->db->real_escape_string($fix_ma_nsx);
		$fix_ten_nsx= $this->db->real_escape_string($fix_ten_nsx);
		$fix_dia_chi_nsx= $this->db->real_escape_string($fix_dia_chi_nsx);
		$fix_quoc_gia= $this->db->real_escape_string($fix_quoc_gia);
		$fix_ma_buu_dien= $this->db->real_escape_string($fix_ma_buu_dien);
		$fix_so_tk_ngan_hang= $this->db->real_escape_string($fix_so_tk_ngan_hang);
		$fix_sdt_nsx= $this->db->real_escape_string($fix_sdt_nsx);
		$fix_email_nsx= $this->db->real_escape_string($fix_email_nsx);

		$sql = "INSERT into `$talbe` values('$fix_ma_nsx','$fix_ten_nsx','$fix_dia_chi_nsx','$fix_quoc_gia','$fix_ma_buu_dien','$fix_so_tk_ngan_hang','$fix_sdt_nsx','$fix_email_nsx')";
		
		$query = $this->db->Thucthi($sql);
		if($query){
				// gan bien quay lại
			$this::back("Thêm nhà sản xuất thành công");
		}else{
				// gan bien quay lại
			$this::back("Mã nhà sản xuất đã tồn tại thêm không thành công");
		}
	}
	// Sua nhà sx
	public  function suaNsx($thongtin_nsx = array()){
		// chong sql injection
		$fix_ma_nsx= trim($thongtin_nsx["ma_nsx"]);
		$fix_ten_nsx= trim($thongtin_nsx["ten_nsx"]);
		$fix_dia_chi_nsx= trim($thongtin_nsx["dia_chi_nsx"]);
		$fix_quoc_gia= trim($thongtin_nsx["quoc_gia"]);
		$fix_ma_buu_dien= trim($thongtin_nsx["ma_buu_dien"]);
		$fix_so_tk_ngan_hang= trim($thongtin_nsx["so_tk_ngan_hang"]);
		$fix_sdt_nsx= trim($thongtin_nsx["sdt_nsx"]);
		$fix_email_nsx= trim($thongtin_nsx["email_nsx"]);

		$talbe = strtolower($this->classname);
		$fix_ma_nsx = $this->db->real_escape_string($fix_ma_nsx);
		$fix_ten_nsx= $this->db->real_escape_string($fix_ten_nsx);
		$fix_dia_chi_nsx= $this->db->real_escape_string($fix_dia_chi_nsx);
		$fix_quoc_gia= $this->db->real_escape_string($fix_quoc_gia);
		$fix_ma_buu_dien= $this->db->real_escape_string($fix_ma_buu_dien);
		$fix_so_tk_ngan_hang= $this->db->real_escape_string($fix_so_tk_ngan_hang);
		$fix_sdt_nsx= $this->db->real_escape_string($fix_sdt_nsx);
		$fix_email_nsx= $this->db->real_escape_string($fix_email_nsx);

		$sql = "UPDATE `$talbe` SET tennsx = '$fix_ten_nsx',diachinsx='$fix_dia_chi_nsx',quocgia='$fix_quoc_gia',mabuudien='$fix_ma_buu_dien',sotknganhang='$fix_so_tk_ngan_hang',sdt='$fix_sdt_nsx',email = '$fix_email_nsx' where idnsx = '$fix_ma_nsx'";
		
		$query = $this->db->Thucthi($sql);
		if($query){
				// gan bien quay lại
			$this::back("Sửa nhà sản xuất thành công");
		}else{
				// gan bien quay lại
			$this::back("Sửa nhà sản xuất không thành công");
		}
	}
	// Xoa nsx
	public function xoaNsx($id){
		$id_da= trim($id);
		$id_da = $this->db->real_escape_string($id_da);
		$talbe = strtolower($this->classname);
		$sql = "DELETE FROM `$talbe` where  idnsx= '$id_da'";
		$query = $this->db->Thucthi($sql);
		if($query){
			// gan bien quay lại
			$this::back("Xoá thành công");
		}else{
			// gan bien quay lại
			$this::back("Nhà sản xuất không được toàn quyền xoá hãy chọn tên khác");
		}
	}
	// lay thong tin danh sach muon 
	// Gom Idtbmuon Username, ten du an, ten thiet bi, ngay muon , so luong tb muon 
	public function getDanhsachmuon(){
		$talbe = strtolower($this->classname);
		$sql = "SELECT idborrow,`$talbe`.idthietbi,`user`.username,`project`.tenproject,`devices`.tenthietbi,ngaymuon,soluong FROM `$talbe`,`project`,`devices`,`user` WHERE  `$talbe`.username = `user`.username and `$talbe`.idproject = `project`.idproject and `$talbe`.idthietbi = `devices`.idthietbi and soluong != 0 ORDER BY  username DESC";
		
		$query = $this->db->Thucthi($sql);
		return $query;
	}
	// Xoa va cap nhat
	// s khi tra thiet bi thi xoa so luong ma ng da muon dong thoi cap nhat la soluong moi cho tb
	public function thanhtoan($idborrow,$idthietbi ,$soluong){
		// chong sql injection
		$fix_idborrow= trim($idborrow);
		$fix_idthietbi= trim($idthietbi);
		$talbe = strtolower($this->classname);
		$fix_idborrow = $this->db->real_escape_string($fix_idborrow);
		$fix_idthietbi = $this->db->real_escape_string($fix_idthietbi);
		
		// lay so luong thi bi can tim
		$query_devices = $this->checkData($fix_idthietbi,'devices','idthietbi');
		$row = $query_devices->fetch_assoc();
		$soluong_bandau = intval($row['soluongconlai'] + $soluong);
		$soluong_damuon = intval($row['soluongdamuon'] - $soluong);
		// cap nhat lai so luong ton tai cua sp
		$sql_devices_update = "UPDATE `devices` SET soluongdamuon = '$soluong_damuon', soluongconlai = '$soluong_bandau 'where idthietbi = '$fix_idthietbi'";

		$query_devices_update = $this->db->Thucthi($sql_devices_update);
		//cap nhat lai lich su ca nhan da muon
		$sql = "UPDATE `$talbe` SET soluong = 0 where idborrow = '$fix_idborrow'";
		$query= $this->db->Thucthi($sql);

		if($query && $query_devices_update){
			// gan bien quay lại
			$this::back("Xác nhận trả thành công");
		}else{
			// gan bien quay lại
			$this::back("Xác nhận trả không thành  công vui lòng kiểm tra lại");
		}
	}
	/* 
		Ham lay du lieu du an gom bao nhieu thiet bi
	**/
	public function getThietbituduan($idborrow){
				// chong sql injection
		$fix_idborrow= trim($idborrow);
		
		$talbe = strtolower($this->classname);
		$fix_idborrow = $this->db->real_escape_string($fix_idborrow);

		$sql = "SELECT DISTINCT  `$talbe`.idproject,`project`.tenproject,`devices`.tenthietbi,`$talbe`.idthietbi,`devices`.mota,`devices`.hinhanh from `$talbe`, `devices`,`project` where `$talbe`.idproject = '$fix_idborrow' and `$talbe`.idthietbi = `devices`.idthietbi and `$talbe`.idproject = `project`.idproject ";
		
		$query = $this->db->Thucthi($sql);
		return $query;
		/* Lay ket qua thiet bi**/
	}
	/* 
		Xuat tat ca username nhung khac username trong du an
	*/
	public function xuatThanhvien($idproject){
		$fix_idproject= trim($idproject );
		$talbe = strtolower($this->classname);
		$fix_idproject = $this->db->real_escape_string($fix_idproject);

		$sql_check_project = $this->checkData($idproject,'thanhvientrongduan','idproject');
		// kim tra co ton tai hay khong
		$check_project = $sql_check_project->num_rows;
		// lay thong tin uservao form  trong them thanh vien
		$sql = "SELECT `$talbe`.username FROM `$talbe` WHERE NOT EXISTS( SELECT `thanhvientrongduan`.username FROM `thanhvientrongduan` where `thanhvientrongduan`.username = `$talbe`.username and `thanhvientrongduan`.idproject = '$idproject')";
		$query = $this->db->Thucthi($sql);

		// check dieu kien neu form rong
		if($query->num_rows == 0 && $check_project ==0){
		$sql_user = "SELECT * FROM `$talbe`";
		 $query_user = $this->db->Thucthi($sql_user);
		 return $query_user;
		}else{
			return $query;
		}
		
	}
	/* 
		Them thanh vien vao trong du an 
	**/
	public function themthanhvien($thongtin = array()){
		$fix_username= trim($thongtin["username"] );
		$fix_idproject= trim($thongtin["idproject"] );
		$talbe = strtolower($this->classname);
		$fix_username = $this->db->real_escape_string($fix_username);
		$fix_idproject = $this->db->real_escape_string($fix_idproject);

		$sql = "INSERT into `$talbe` values('','$fix_username','$fix_idproject')";
		$query = $this->db->Thucthi($sql);
		if($query){
				// gan bien quay lại
			$this::back("Thêm thành viên vào dự án thành công");
		}else{
				// gan bien quay lại
			$this::back("Thành viên đã tồn tại trong dự án");
		}
	}
	public function xoathanhvien($thongtin = array()){
		// cHong sql injection
		$fix_username= trim($thongtin["username"] );
		$fix_idproject= trim($thongtin["idproject"] );
		$talbe = strtolower($this->classname);
		$fix_username = $this->db->real_escape_string($fix_username);
		$fix_idproject = $this->db->real_escape_string($fix_idproject);

		$sql = "DELETE FROM `$talbe` where  username= '$fix_username' and idproject = '$fix_idproject'";
		$query = $this->db->Thucthi($sql);
		if($query){
				// gan bien quay lại
			$this::back("Xoá thành viên trong dự án thành công");
		}else{
				// gan bien quay lại
			$this::back("Thành viên trong dự án không tồn tại");
		}
	}
	public function getDuantrongdanhsachthanhvientronduan($username,$table_exit = 0){
		// cHong sql injection
		$fix_username= trim($username);
		if($table_exit){
			$talbe = strtolower($this->classname);	
			$fix_username = $this->db->real_escape_string($fix_username);

			$sql = "SELECT `project`.idproject,`project`.tenproject FROM `$talbe`, `project` where `$talbe`.idproject =  `project`.idproject and `$talbe`.username = '$fix_username'";
			$query = $this->db->Thucthi($sql);
		}else{
			$fix_username = $this->db->real_escape_string($fix_username);

			$sql = "SELECT `thanhvientrongduan`.id,`project`.idproject,`project`.tenproject FROM `thanhvientrongduan`, `project` where `thanhvientrongduan`.idproject =  `project`.idproject and `thanhvientrongduan`.username = '$fix_username'  ORDER BY `thanhvientrongduan`.id  DESC";
			$query = $this->db->Thucthi($sql);
		}
		return $query;
	}

}