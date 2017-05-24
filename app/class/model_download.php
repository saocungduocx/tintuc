<?php
class model_download{
    public $db;
    public function __construct(){
        $this->db= new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
	if($this->db->connect_errno) die( $db->connect_error ); 	
	$this->db->set_charset("utf8");

    }
    function thongtin1soft($iddl){
      $sql = "SELECT tenfile, url, mota, solandown FROM download WHERE iddl=$iddl";
      if (!$kq = $this->db->query($sql))  die($this->db->error);
      $row = $kq->fetch_assoc();	
      return $row;
    }//thongtin1soft
    function tangsolandown($iddl){
      $sql = "UPDATE download SET solandown = solandown + 1 WHERE iddl=$iddl";
      if (!$kq = $this->db->query($sql)) die($this->db->error);
    }//tangsolandown
    function listdownload(){
    	$sql="select iddl,tenfile,mota,solandown,url from download";
    	if (!$kq = $this->db->query($sql) )  die($this->db->error);
    	//$data=array();
    	foreach($kq as $row) $data[]=$row;
    	return $data;
    }//listdownload
    function themtailieu(){ 
          $dir = "../tailieu/";
          $kieuFile=array('image/gif','image/jpeg','image/pjpeg','audio/mpeg','video/x-ms-wmv','application/zip','application/octet-stream','application/x-rar-compressed');
          $maxsize = 50*1024*1024; //50MB 
        	
          $type = $_FILES['f1']["type"];
          $size = $_FILES['f1']["size"]; //Tinh bang byte
          $name = strip_tags($_FILES['f1']["name"]);
          $tmp_name = $_FILES['f1']["tmp_name"];
        	
           if (in_array($type,$kieuFile)==false) die ("Kiểu file không chấp nhận");
           if ($size > $maxsize) die ("Kích thước file quá lớn");
           if (file_exists($dir.$name)) die($name." đã có rồi");      
        	
           $url = $dir . $name; 
           move_uploaded_file($tmp_name, $url);
        	
           $TenFile = trim(strip_tags($_POST['tenfile']));
           $MoTa = trim(strip_tags($_POST['mota']));
           if (get_magic_quotes_gpc()==false) {
        	$TenFile = mysqli_real_escape_string($this->db,$TenFile);
          $MoTa = mysqli_real_escape_string($this->db,$Mota);
          $name = mysqli_real_escape_string($this->db,$name);

           }
           $sql="INSERT INTO download SET mota='$MoTa',tenfile='$TenFile',ngay=Now(), url='$name'";
           if(!$kq=$this->db->query($sql))
           die($this->db->error);
           return true;
           // ve lam
    }//function
    




}


?>