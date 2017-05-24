<?php
class model_quantri{
	public $db;
	public function __construct(){
		$this->db = new mysqli(HOST,USER_DB,PASS_DB,DB_NAME);
		$this->db->set_charset("utf8");
	}
	function checklogin(){
		if(isset($_SESSION['login_id']) == false){
			$_SESSION['error'] = 'Ban chua dang nhap';
			$_SESSION['back'] = $_SERVER['REQUEST_URI'];
			header('location:'.BASE_URL.'vi/quantri/dangnhap');
			exit();
		}elseif($_SESSION['login_level'] != 1){
			$_SESSION['error'] = 'Ban khong co quyen xem trang nay';
			$_SESSION['back'] = $_SERVER['REQUEST_URI'];
			header('location:'.BASE_URL.'vi/quantri/dangnhap');
		}
	}// end checklogin

	public function login($u,$p){
		$sql=sprintf("SELECT iduser, username, password,hoten,idgroup FROM users 
		  WHERE username='%s' AND password=md5('%s')",$u,$p);
		if(!$kq = $this->db->query($sql))
			die( $this->db->error);
					
		if ($kq->num_rows==0) return false;
		$row = $kq->fetch_assoc();
		$_SESSION['login_id']=$row['iduser'];
		$_SESSION['login_user']=$row['username'];
		$_SESSION['login_hoten']=$row['hoten'];
		$_SESSION['login_level']=$row['idgroup'];
		return true;
	} 
}
	
?>