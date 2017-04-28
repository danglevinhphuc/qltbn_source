<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Quanly extends controller{
	public function __construct(){}
	public static function csurf($ktxuathien){
		$token = array("a","b","c","d","e","f","r","g","s","y","A","B","C","D","E","F","R","S","M","N"
			,"1","2","3","4","5","6","7","8","9","0");
		$kq = "";
		for ($i=0; $i <$ktxuathien ; $i++) { 
			$kq = $kq. $token[rand(0,count($token)-1)];
		}
		return $kq;
	}
	// Ham dieu huong khi co dang nhap hoac khong
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

	
	public function dangnhap(){
		$token = $this::csurf(30);
		
		$this->view("dangnhap");
	}
	public function authenticate(){
		include (PATH_SYSTEM."/model/users.php");
		$user = new User();
		$username = $_POST['username'];
		$password = $_POST["password"];
		$thongtindangnhap = array(
			'username' => $username,
			'password' => $password,
			);
		$kq = $user->authenticate($thongtindangnhap);
	}

	public function signup(){
		include (PATH_SYSTEM."/model/users.php");
		$user = new User();
		if(isset($_POST['submit'])){
			$username = $_POST["username"];
			$password = $_POST["password"];
			$password_again = $_POST["password_again"];
			$ho = $_POST["ho"];
			$ten = $_POST["ten"];
			$ngaysinh = $_POST["ngaysinh"];
			$sdt = $_POST["sdt"];
			$diachi =$_POST["diachi"];
			$email = $_POST["email"];
			$donvi = $_POST["donvi"];
			$trinhdo = $_POST["trinhdo"];
			if($password == $password_again){
				$thongtin_dk  = array(
					'username' =>$username,
					'password'=>$password,
					'ho'=>$ho,
					'ten'=>$ten,
					'ngaysinh'=>$ngaysinh,
					'sdt'=>$sdt,
					'diachi'=>$diachi,
					'email'=>$email,
					'donvi'=>$donvi,
					'trinhdo'=>$trinhdo
					);
				$kq = $user->dangkyUser($thongtin_dk);
			}else{
				$this::back("Mat khau khong trung khop");
			}
		}else{
			echo "file exit";
		}
	}
	public function dangxuat(){
		// Xóa session name
		unset($_SESSION['authenticate']);
		unset($_SESSION['quyenthietbi']);
		unset($_SESSION['quyennguoidung']);
		unset($_SESSION['quyenduan']);
		unset($_SESSION['duan']);
		if(isset($_SESSION["admin"])){
			unset($_SESSION["admin"]);
		}
		setcookie("User", "", time()-3600);
		$this::back("Đang tải dữ liệu xin chờ");
	}
	public function quanLynguoidung(){
		if(!isset($_SESSION['authenticate'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/users.php");
			$user = new User();
			$username = $_COOKIE['User'];
		// lay thong tin nguoi dung dang nhap
			$kq_user = $user->getUser($username);

			$this->view("quanlynguoidung",$kq_user);
		}
	}
	/* 
		Tao du an
		**/
		public function taoDuan(){
			if(!isset($_SESSION['authenticate'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/duan.php");
				$duan = new project();
				$token = $this::csurf(30);
				$_SESSION["token_taoduan"]= $token;
				$tong_duan = $duan->getDuan();

				$result = array(
					'token' => $token,
					'data' => $tong_duan
					);
				$this->view("quanlyduan",$result);
			}
			
		}
		public function taoduan_send(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/duan.php");
				$token = $_POST["token"];
				if(isset($_POST['submit']) && $_SESSION["token_taoduan"] == $token){
					$duan = new project();
					$ma_du_an = $_POST['ma_du_an'];
					$ten_du_an = $_POST['ten_du_an'];
					$nguoi_phu_trach = $_POST['nguoi_phu_trach'];
					$ngay_tao = date('Y-m-d', time());
					$thongtin_duan  = array(
						'ma_du_an' =>$ma_du_an,
						'ten_du_an'=>$ten_du_an,
						'nguoi_phu_trach'=>$nguoi_phu_trach,
						'ngay_tao'=>$ngay_tao,
						);
					$kq = $duan->createProject($thongtin_duan);
				}else{
					echo "file exit";
				}
			}
			
		}
		public function suaduan(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/duan.php");
				$duan = new project();
				$token = $this::csurf(30);
				$_SESSION["token_suaduan"]= $token;
				$idduan= $_GET["id"];
				$duan_sua = $duan->getDuan($idduan);

				$result = array(
					'token' => $token,
					'data' => $duan_sua
					);
				$this->view("suaduan",$result);

			}

			
		}
		public function suaduan_send(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/duan.php");
				$duan = new project();
				$token = $_POST["token"];
				if(isset($_POST['submit']) && $_SESSION["token_suaduan"] == $token){
					$ma_du_an = $_POST['ma_du_an'];
					$ten_du_an = $_POST['ten_du_an'];
					$nguoi_phu_trach = $_POST['nguoi_phu_trach'];
					$thongtin_duan  = array(
						'ma_du_an' =>$ma_du_an,
						'ten_du_an'=>$ten_du_an,
						'nguoi_phu_trach'=>$nguoi_phu_trach,
						);
					$kq = $duan->editProject($thongtin_duan);
				}else{
					echo "file exit";
				}
			}
			
		}
		public function xoaduan(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/duan.php");
				$duan = new project();
				$idduan= $_GET["id"];
				$kq = $duan->xoaduan_send($idduan);
			}
			
		}
	/** 
		Xem chi tiet du an
		**/
		public function chitietduan(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/muonthietbi.php");
				$borrow = new borrow();
				$id = $_GET["id"];
				$result = $borrow->getThietbituduan($id);
				
				$this->view("chitietduan",$result);
			}
		}
		public function doimatkhau(){
			include (PATH_SYSTEM."/model/users.php");
			$user = new User();
			$password = $_POST["password"];
			$password_again = $_POST["password_again"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			if($password == $password_again){
				$thongtindoimk = array(
					'password' => $password,
					'password_again' =>$password_again,
					'email' => $email,
					'username' =>$username
					);
				$kq = $user->changPass($thongtindoimk);
			}else{
				$this::back("Mat khau khong trung khop");
			}
		}
		public function capquyennguoidung(){
			if(!isset($_SESSION['admin'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/users.php");
				$user = new User();
		//lay ra tat tat username 
				$all_user = $user->getDatabase_full();
				$this->view("capquyennguoidung",$all_user);
			}
			
		}
		public function capquyennguoidung_send(){
			if(!isset($_SESSION['admin'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/phanquyen.php");
				$phanquyen = new phanquyen();
				if(isset($_POST['submit'])){
					$username = $_POST["username"];
					$quyennguoidung = isset($_POST['quyennguoidung']) ? $_POST['quyennguoidung'] : 0;
					$quyenthietbi = isset($_POST['quyenthietbi']) ? $_POST['quyenthietbi'] : 0;
					$quyenduan = isset($_POST['quyenduan']) ? $_POST['quyenduan'] : 0;
					$quyen = array(
						'username' => $username,
						'quyennguoidung' => $quyennguoidung,
						'quyenthietbi'=>$quyenthietbi,
						'quyenduan' => $quyenduan
						);
					$kq = $phanquyen->Permission($quyen);
				}
			}
		}
		public function danhsachmuon(){
			if(!isset($_SESSION['quyenthietbi'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/muonthietbi.php");
				$borrow = new borrow();
		// lay tat ca danh sach da muon 
		// Gom Idtbmuon Username, ten du an, ten thiet bi, ngay muon , so luong tb muon 
				$kq = $borrow->getDanhsachmuon();
				$this->view('danhsachmuon',$kq);
			}
		}
		public function thanhtoan(){
			if(!isset($_SESSION['quyenthietbi'])){
				header('location:?c=trangchu&a=index');
			}else{
				$idborrow = $_GET["id"];
				$idthiebi = $_GET['tb'];
				$soluong = $_GET['sl'];
				include (PATH_SYSTEM."/model/muonthietbi.php");
				$borrow = new borrow();
		// s khi tra thiet bi thi xoa so luong ma ng da muon dong thoi cap nhat la soluong moi cho tb
				$kq = $borrow->thanhtoan($idborrow,$idthiebi,$soluong);
			}
		}
	/** 
		Them thanh vien vao trong du an
		**/
		public function quanlythanhvientrongduan(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				$idduan = $_GET["id"];

				include (PATH_SYSTEM."/model/users.php");
				$user = new User();
		// lay tat ca username nguoi dung
				$result = $user->xuatThanhvien($idduan);
				$this->view("quanlythanhvientrongduan",$result);
			}
			
		}
		public function quanlythanhvientrongduan_send(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/thanhvientrongduan.php");
				$thanhvientrongduan = new thanhvientrongduan();
				$username = $_POST['username'];
				$idduan = $_POST["idproject"];
		// lay thong tin truyen den model xu ly them thanh vien vao du an
		// gom co username, idproject
				$thongtin = array(
					"username" => $username,
					"idproject" => $idduan
					);
				$send = $thanhvientrongduan->themthanhvien($thongtin);
			}
			
		}
	/* 
		** xem danh sach thanh vien trong du an
		**/
		public function xemThanhvien(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/thanhvientrongduan.php");
				$thanhvientrongduan = new thanhvientrongduan();
				$idduan = $_GET["idproject"];

				$result = $thanhvientrongduan->checkData($idduan,'thanhvientrongduan','idproject');
				$this->view("xemthanhvientrongduan",$result);
			}
			
		}
	/* 
		Xoá thành viên trong dự án
		**/
		public function xoaduanthanhvien(){
			if(!isset($_SESSION['quyenduan'])){
				header('location:?c=trangchu&a=index');
			}else{
				include (PATH_SYSTEM."/model/thanhvientrongduan.php");
				$thanhvientrongduan = new thanhvientrongduan();
				$username = $_GET["iduser"];
				$idduan = $_GET['idproject'];
				$thongtin = array(
					"username" => $username,
					"idproject" => $idduan
					);
				$send = $thanhvientrongduan->xoathanhvien($thongtin);
			}
			
		}
	}
	?>