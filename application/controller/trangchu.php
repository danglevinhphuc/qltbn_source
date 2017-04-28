<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Trangchu extends controller{
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
	public function Index(){
		include (PATH_SYSTEM."/model/thietbi.php");
		$thietbi = new devices();
		$name_table_join = $thietbi->name_table_join();

		$tim = isset($_GET['search']) ? $_GET['search'] : "";
		if($tim != ""){
			//kim tra bien tim neu khac rong thi dua du lieu den model

			$ketqua = $thietbi->xemThongtin("",$tim,$name_table_join);
			// kiem tra bien tra ve neu co du lieu thi show k thi dua len 404
			if($ketqua->num_rows ==0){
				$this->view("404");	
			}else{
				$this->view("xemthongtin",$ketqua);
			}
			
		}else{
			$ketqua = $thietbi->xemThongtin("","",$name_table_join);
			$this->view("index",$ketqua);	
		}
	}
	public function xemthongtin(){
		include (PATH_SYSTEM."/model/thietbi.php");
		$thietbi = new devices();
		$name_table_join = $thietbi->name_table_join();

		$id = isset($_GET['ten']) ? $_GET['ten'] : "";
		$ketqua = $thietbi->xemThongtin($id,"",$name_table_join);
		$this->view("xemthongtin",$ketqua);
	}
	public function xemchitietthietbi(){
		// lay du lieu chi tiet sp
		include (PATH_SYSTEM."/model/thietbi.php");
		$thietbi = new devices();
		$name_table_join = $thietbi->name_table_join();
		

		//lay du lieu du an tu danh sach thanh vien trong du an
		$tenuser = isset($_COOKIE["User"]) ? $_COOKIE["User"] : "";
		include (PATH_SYSTEM."/model/thanhvientrongduan.php");
		$thanhvientrongduan = new thanhvientrongduan();

		$show_duan = $thanhvientrongduan->getDuantrongdanhsachthanhvientronduan($tenuser,1);



		$token = $this::csurf(30);
		// dua 2 bien ra ngoai 1 la token 2 la du lieu
		$_SESSION["token_muon"]= $token ;
		
		$id = isset($_GET['ten']) ? $_GET['ten'] : "";
		$ketqua = $thietbi->xemThongtin($id,"",$name_table_join);
		$thietbilienquan = $thietbi->xemThongtin_sanphamlienquan();
		$result= array(
			'data' => $show_duan,
			'token' => $token,
			'ketqua' => $ketqua,
			'thietbilienquan' =>$thietbilienquan
			);
		$this->view("xemchitietthietbi",$result);
	}
	public function quanlythietbi(){
		if(!isset($_SESSION['authenticate'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/thietbi.php");
			$thietbi = new devices();
			$name_table_join = $thietbi->name_table_join();
			$ketqua = $thietbi->xemThongtin("","",$name_table_join);
			$token = $this::csurf(30);
			$_SESSION["token_themthietbi"]= $token;
			$getName_nsx = $thietbi->getName_nhasx();

			//lay danh sach du an
			include (PATH_SYSTEM."/model/provider.php");
			$provider = new provider();
			$nsx_info = $provider->getDatabase_full();
			$result = array(
				'token' => $token,
				'data' => $ketqua,
				'nsx' =>$nsx_info
				);
			$this->view("quanlythietbi",$result);
		}
		
	}
	public function themthietbi_send(){
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/thietbi.php");
			$thietbi = new devices();
			$token = $_POST["token"];
			if(isset($_POST['submit']) && $_SESSION["token_themthietbi"] == $token){
				$ma_tb = $_POST["ma_tb"];
				$ten_thiet_bi = $_POST["ten_tb"];
				$nha_sx = $_POST["nha_sx"];
				$tinh_trang = $_POST["tinh_trang"];
				$con_lai = $_POST["so_luong"];
				$mo_ta = $_POST["mo_ta"];
				$hinh1 = $_FILES["hinh_anh"];
				$info_hinh1 = !empty($hinh1["tmp_name"]) ? getimagesize($hinh1['tmp_name']) : "";
				if($info_hinh1 != "" ){
					if($info_hinh1 === FALSE){

					}else{
						move_uploaded_file($hinh1["tmp_name"], "img/".$hinh1["name"]);
					}
				}
				$thong_tin_sp = array(
					'ma_tb' => $ma_tb,
					'ten_tb' => $ten_thiet_bi,
					'nha_sx' => $nha_sx,
					'tinh_trang' => $tinh_trang,
					'con_lai' => $con_lai,
					'mo_ta' =>$mo_ta,
					'hinh_anh' => $hinh1["name"],
					);
				$kq = $thietbi->addThietbi($thong_tin_sp);
			}else{
				echo "file exit";
			}
		}
		
	}
	public function deleteThietbi(){	
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/thietbi.php");
			$thietbi = new devices();
			$id_tb = $_GET["id"];
			$kq = $thietbi->xoaThietbi($id_tb);
		}
		
	}
	public function suathietbi(){
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/thietbi.php");
			$thietbi = new devices();
			$getName_nsx = $thietbi->getName_nhasx();
			$id_tb = $_GET["id"];
			$thong_tin_tb = $thietbi->suaThietbi($id_tb);
			$token = $this::csurf(30);
			$_SESSION["token_suathietbi"]= $token;
			$kq = array(
				'getName_nhasx' => $getName_nsx,
				'thong_tin_tb' => $thong_tin_tb,
				'token'=>$token);
			$this->view("suathietbi",$kq);
		}
		
	}
	public function suathietbi_send(){
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/thietbi.php");
			$thietbi = new devices();
			$token = $_POST["token"];
			if(isset($_POST['submit']) && $_SESSION["token_suathietbi"] == $token){
				$ma_tb = $_POST["ma_tb"];
				$ten_thiet_bi = $_POST["ten_tb"];
				$nha_sx = $_POST["nha_sx"];
				$tinh_trang = $_POST["tinh_trang"];
				$con_lai = $_POST["con_lai"];
				$mo_ta = $_POST["mo_ta"];
				$hinh1_cu = $_POST["hinh_anh_cu"];
				$hinh1 = $_FILES["hinh_anh"];
				$info_hinh1 = !empty($hinh1["tmp_name"]) ? getimagesize($hinh1['tmp_name']) : "";
				if($hinh1['name'] != null){
					if($info_hinh1 != "" ){

						if($info_hinh1 === FALSE){

						}else{
							move_uploaded_file($hinh1["tmp_name"], "img/".$hinh1["name"]);
							$hinh = $hinh1["name"];
						}

					}
				}else{
					$hinh = $hinh1_cu;
				}

				$thong_tin_sp = array(
					'ma_tb' => $ma_tb,
					'ten_tb' => $ten_thiet_bi,
					'nha_sx' => $nha_sx,
					'tinh_trang' => $tinh_trang,
					'con_lai' => $con_lai,
					'mo_ta' => $mo_ta,
					'hinh_anh' => $hinh,
					);
				$kq = $thietbi->suaThietbi_value($thong_tin_sp);
			}else{
				echo "file exit";
			}
		}
		
	}
	public function themNsx(){
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/provider.php");
			$provider = new provider();
		// lay tat ca thong tin cua ds nxs
			$nsx_info = $provider->getDatabase_full();
			$token = $this::csurf(30);
			$_SESSION["token_themnsx"]= $token;
			$kq = array(
				'data' => $nsx_info,
				'token'=>$token
				);
			$this->view("quanlynsx",$kq);
		}
	}
	public function themNsx_send(){
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{


			include (PATH_SYSTEM."/model/provider.php");
			$provider = new provider();
			$token = $_POST["token"];
			if(isset($_POST['submit']) && $_SESSION["token_themnsx"] == $token){
				$ma_nsx = $_POST["ma_nsx"];
				$ten_nsx = $_POST["ten_nsx"];
				$dia_chi_nsx = $_POST["dia_chi_nsx"];
				$quoc_gia = $_POST["quoc_gia"];
				$ma_buu_dien = isset($_POST['ma_buu_dien']) ? $_POST['ma_buu_dien'] : "";
				$so_tk_ngan_hang = isset($_POST['so_tk_ngan_hang']) ? $_POST['so_tk_ngan_hang'] : "";
				$sdt_nsx = $_POST["sdt_nsx"];
				$email_nsx = $_POST["email_nsx"];

				$thongtin_nsx = array(
					'ma_nsx' => $ma_nsx,
					'ten_nsx' => $ten_nsx,
					'dia_chi_nsx' => $dia_chi_nsx,
					'quoc_gia' =>$quoc_gia,
					'ma_buu_dien'=>$ma_buu_dien,
					'so_tk_ngan_hang'=>$so_tk_ngan_hang,
					'sdt_nsx' =>$sdt_nsx,
					'email_nsx' =>$email_nsx
					);
				$kq = $provider->themNsx($thongtin_nsx);
			}
		}
	}
	public function suaNsx(){
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/provider.php");
			$provider = new provider();
			$data = $_GET['id'];
		// lay tat ca thong tin cua ds nxs
			$nsx_info = $provider->checkData($data,'provider','idnsx');
			$token = $this::csurf(30);
			$_SESSION["token_themnsx"]= $token;
			$kq = array(
				'data' => $nsx_info,
				'token'=>$token
				);
			$this->view("suansx",$kq);
		}
	}
	public function suaNsx_send(){
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/provider.php");
			$provider = new provider();
			$token = $_POST["token"];
			if(isset($_POST['submit']) && $_SESSION["token_themnsx"] == $token){
				$ma_nsx = $_POST["ma_nsx"];
				$ten_nsx = $_POST["ten_nsx"];
				$dia_chi_nsx = $_POST["dia_chi_nsx"];
				$quoc_gia = $_POST["quoc_gia"];
				$ma_buu_dien = isset($_POST['ma_buu_dien']) ? $_POST['ma_buu_dien'] : "";
				$so_tk_ngan_hang = isset($_POST['so_tk_ngan_hang']) ? $_POST['so_tk_ngan_hang'] : "";
				$sdt_nsx = $_POST["sdt_nsx"];
				$email_nsx = $_POST["email_nsx"];

				$thongtin_nsx = array(
					'ma_nsx' => $ma_nsx,
					'ten_nsx' => $ten_nsx,
					'dia_chi_nsx' => $dia_chi_nsx,
					'quoc_gia' =>$quoc_gia,
					'ma_buu_dien'=>$ma_buu_dien,
					'so_tk_ngan_hang'=>$so_tk_ngan_hang,
					'sdt_nsx' =>$sdt_nsx,
					'email_nsx' =>$email_nsx
					);
				$kq = $provider->suaNsx($thongtin_nsx);
			}
		}
	}
	public function xoansx(){
		if(!isset($_SESSION['quyenthietbi'])){
			header('location:?c=trangchu&a=index');
		}else{
			include (PATH_SYSTEM."/model/provider.php");
			$provider = new provider();
			$id_nsx = $_GET["id"];
			$kq = $provider->xoaNsx($id_nsx);
		}
	}
	public function about(){
		$this->view('about');
	}
}
?>