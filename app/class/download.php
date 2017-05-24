<?php
 class download{
    public $dl;
    function __construct($action,$params){
        $this->dl= new model_download;
        $this->params = $params;
    }
    function index(){
	$listdl = $this->dl->listdownload();
	require_once "view/listdownload.php";	
    }

    function down1(){
          // ti?p nh?n tham s?
          $iddl=$this->params[0]; settype($idDL,"int"); if ($iddl<=0) exit();
          $row = $this->dl->thongtin1soft($iddl);
          $filename = $row['url'];
          $url = '../tailieu/'.$filename;  //echo $_SERVER['SCRIPT_FILENAME'];
          $mimetype="application/force-download";
          $filesize = filesize($url);
          $this->dl->tangsolandown($iddl);
          //?n d?nh http header
          header("Content-Type: $mimetype");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          header("Content-Length: " . $filesize);
          //d?c file
          set_time_limit(0);
          $file = fopen($url,"rb");
          if ($file) {
        	while(!feof($file)) { print(fread($file, 1024*8)); flush();
            //sleep(1); han che thoi gian down	
            }
        	fclose($file);
          }
    }// end down1
          
    function uploadsoft(){
        if(isset( $_POST['btnUpload'])==true){
              $kq=$this->dl->themtailieu();
              //$_SESSION['upload']="Thanh cong";
              require_once "view/formuploadsoft.php";
             // header("location:/tintuc/vi/download/uploadsoft");
          } else 
          include "view/formuploadsoft.php";	
    }

}
    

?>