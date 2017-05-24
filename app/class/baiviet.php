<?php
class baiviet {
public $bv;
public $params;
public $current_action;
public $cname="baiviet";
public $lang;
function __construct($action,$params,$lang){
	$this->bv = new model_baiviet;
	$this->current_action=$action;
    $this->params = $params;
	$this->lang = $lang;
}//construct

function index(){
    $cacloai = $this->bv ->cacloai($this->lang);
    $bainb = $this->bv->bainoibat($this->lang,4);
    $baixn = $this->bv->baixemnhieu($this->lang,10);

	require_once "view/home.php"; //n?p layout
}//index
function detail(){
    $baixn = $this->bv->baixemnhieu($this->lang,10);
    $bainb = $this->bv->bainoibat($this->lang,4);
	$id= $this->params[0]; settype($id,"int"); if ($id<=0) return;
	$bai = $this->bv->detail($id);
	require_once "view/home.php";

}//detail
function cat(){
  $idloai= $this->params[0];
  $currentpage= $this->params[1];
  settype($idloai,"int"); settype($currentpage,"int");
  if ($idloai<=0) return;
  if ($currentpage<=0) $currentpage=1;
  $per_page=5; $totalrows=0;
  $start = ($currentpage-1)*$per_page;
  $lang=$this->lang;
  $listbai = $this->bv->baitrongloai($idloai,$per_page, $start,$totalrows,$lang);

  //test cach 2
  $tenloai_cach2=$this->bv->get_tenloaine($idloai);

  /*
  $sql=""
  */
  require_once "view/home.php";
}//cat
function search(){
  $tukhoa= $this->params[0];
  $currentpage= $this->params[1];
  if($tukhoa=="") header('location:/tintuc/');
  $tukhoa=str_replace("%20"," ", $tukhoa);
  settype($currentpage,"int");  
  if ($currentpage<=0) $currentpage=1;

    $per_page=5; $totalrows=0; 
  $start = ($currentpage-1)*$per_page;
  $listbai = $this->bv->ketquatimkiem($tukhoa,$per_page, $start,$totalrows);
  require_once "view/home.php";
}//cat


function themykien(){
  if (isset($_POST['noidung'])){
    $this->bv->luuykien();
     require_once "view/camonguiykien.php";
  } else require_once "view/formthemykien.php"; 
}

}//class
