<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Thanhvien extends controller{
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

	public function muonThietbi(){
		include (PATH_SYSTEM."/model/duan.php");
		$duan = new project();
			//lay du lieu ten du an duoc tao
		$show_duan = $duan->getDuan();
		$token = $this::csurf(30);
			// dua 2 bien ra ngoai 1 la token 2 la du lieu
		$_SESSION["token_muon"]= $token ;
		$result= array(
			'data' => $show_duan,
			'token' => $token
			);
		$this->view("muonThietbi",$result);
	}
	public function muonThietbi_send(){
		$token = $_POST["token"];
		if(isset($_SESSION["quyennguoidung"])){
			if(isset($_POST['submit']) && $_SESSION["token_muon"] == $token ){
				include (PATH_SYSTEM."/model/muonthietbi.php");
				$muon_tb = new borrow();
				$username = $_POST["username"];
				$soluong= $_POST["soluong"];
				$idproject = $_POST["idproject"];
				$idThietbi = $_POST["idThietbi"];
				$ngay_muon = date('Y-m-d', time());
				$thongtinmuon   = array(
					'username' => $username,
					'soluong'=>$soluong,
					'idproject'=>$idproject,
					'idThietbi'=>$idThietbi,
					'ngay_muon' => $ngay_muon
					);
				$kq = $muon_tb->dangkymuon($thongtinmuon);
			}else{
				echo "file exit";
			}

		}else{
			$this::back("Bạn không có quyền mượn");
		}

	}

}
?>