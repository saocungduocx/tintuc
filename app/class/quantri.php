<?php
class quantri{
	public $qt;
	public $params;
	public $current_action;
	public $cname="quantri";

	public function __construct($action,$params){
		$this->qt = new model_quantri;
		if ($action=="") $action="index";
		$this->current_action=$action;
		$this->params=$params;
		if($action!="dangnhap" && $action!="thoat") $this->qt->checklogin();
		$this->$action();
		//cho getcwd() . "\n";
	}
	function index(){
		
		require_once "view/quantri/admin_home.php";
	}
	function dangnhap(){
		
		if($_POST == NULL){
			require_once "view/quantri/dangnhap.php";
		}else{
			$u=strip_tags($_POST['u']); $p=strip_tags($_POST['p']);
			$kq=$this->qt->login($u,$p);
			if($kq==false) 
				{	$_SESSION['error']="Sai tai khoan hoac mat khau";
					header('location:'.BASE_URL.'vi/quantri/dangnhap');
				}
			else{
				if(isset($_SESSION['back'])){
					$b=$_SESSION['back']; unset($_SESSION['back']); header('location:$b');
				}else header('location:'.BASE_DIR.'vi/quantri/index');
			}
		}
	}
	function thoat(){
		session_destroy();  header('location:'.BASE_DIR.'vi/quantri/dangnhap');
	}
	
}
?>