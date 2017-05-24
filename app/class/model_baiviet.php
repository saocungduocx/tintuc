<?php
class model_baiviet
{
    public $db;
    public function __construct()
    {
        $this->db = new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        $this->db->set_charset("utf8");
    } //construct
    public function bainoibat($lang = 'vi', $sobai = 5)
    {
        $sql = "SELECT idbv, tieude, urlhinh, tomtat FROM baiviet
          WHERE lang='$lang' AND noibat=1 ORDER BY idbv DESC LIMIT 0, $sobai";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        foreach ($kq as $row)
            $data[] = $row;
        return $data;
    } //bainoibat
    public function baixemnhieu($lang = 'vi', $sobai = 5)
    {
        $sql = "SELECT idbv, tieude, urlhinh, tomtat FROM baiviet
          WHERE lang='$lang' AND noibat=1 ORDER BY solanxem DESC LIMIT 0, $sobai";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        foreach ($kq as $row)
            $data[] = $row;
        return $data;
    }
    public function cacloai($lang = 'vi')
    {
        $sql = "SELECT idloai, tenloai FROM phanloaibai WHERE lang='$lang' AND  anhien=1
          AND lang='$lang' AND idcha=0 ORDER BY thutu";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        foreach ($kq as $row)
            $data[] = $row;
        return $data;
    } //cacloai
    public function baimoitrongloai($id, $sobai = 5)
    {
        $sql = "SELECT idbv, tieude, tomtat, urlhinh, ngay, solanxem FROM baiviet
        WHERE idloai IN(SELECT idloai FROM phanloaibai WHERE idloai=$id OR idcha=$id)
        ORDER BY idbv DESC LIMIT 0,$sobai";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        foreach ($kq as $row)
            $data[] = $row;
        return $data;
    } //baimoitrongloai
    public function detail($id)
    {
        settype($id, "int");
        $sql = "SELECT idbv, tieude, tomtat, urlhinh, ngay, solanxem, content
          FROM baiviet WHERE idbv=$id";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if (!$kq)
            return FALSE;
        return $kq->fetch_assoc();
    } //detail
    public function baitrongloai($idLoai, $per_page = 5, $startrow = 0, &$totalrows,$lang)
    {
        $sql = "SELECT idbv, tieude, urlhinh, tomtat FROM baiviet WHERE idloai=$idLoai
    AND anhien=1 AND lang='$lang' ORDER BY idbv DESC LIMIT $startrow, $per_page";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        foreach ($kq as $row)
            $data[] = $row;
             
        $sql = "SELECT count(*) FROM baiviet WHERE idloai=$idLoai AND anhien=1";
        if (!$rs = $this->db->query($sql))
            die($this->db->error);
        $row       = $rs->fetch_row();
        $totalrows = $row[0];

        return $data;
    } //baitrongloai
    function get_tenloaine($idLoai)
    {
        $sql = "SELECT TenLoai from phanloaibai where idLoai=$idLoai";
        if (!$rs = $this->db->query($sql))
            die($this->db->error);
        if ($rs->num_rows == 0)
            echo "";
        $row1    = $rs->fetch_row();
        $tenloai = $row1[0];
        return $tenloai;
    }
    function pageslist($baseurl, $totalrows, $offset, $per_page, $currentpage)
    {
        $totalpages = ceil($totalrows / $per_page);
        $from       = $currentpage - $offset;
        $to         = $currentpage + $offset;
        if ($from <= 0)
            $from = 1;
        if ($to > $totalpages)
            $to = $totalpages;
        $links = "";
        if ($currentpage > 1) {
            $links = $links . "<a href = '$baseurl/'><<<</a>";
            $tt    = $currentpage - 1;
            $links = $links . "<a href = '$baseurl/$tt'><</a>";
        }
        
        for ($j = $from; $j <= $to; $j++) {
            if ($j == $currentpage)
                $links = $links . "<span>$j</span>";
            else
                $links = $links . "<a href = '$baseurl/$j/'>$j</a>";
        }
        if ($currentpage < $totalpages) {
            $tt    = $currentpage + 1;
            $links = $links . "<a href = '$baseurl/'>></a>";
            $links = $links . "<a href = '$baseurl/$totalpages'>>>></a>";
        }
        return $links;
    } //function
    public function ketquatimkiem($tukhoa,$per_page=5, $startrow=0, &$totalrows){
$sql="SELECT idbv, tieude, urlhinh, tomtat FROM baiviet WHERE (tieude like '%$tukhoa%' or tomtat like '%$tukhoa%' ) 
AND anhien=1 ORDER BY idbv DESC LIMIT $startrow, $per_page";
if(!$kq = $this->db->query($sql)) die( $this->db->error);
foreach ($kq as $row) $data[] = $row;

$sql="SELECT count(*) as tt FROM baiviet WHERE (tieude like '%$tukhoa%' or tomtat like '%$tukhoa%' )
AND anhien=1 ";
if(!$rs = $this->db->query($sql)) die( $this->db->error);       
$row = $rs->fetch_row();
$totalrows=$row[0];     
return $data;
} //baitrongloai
    public function getidloai($idLoai,$lang='vi'){
        $sql = "SELECT idloai, tenloai FROM phanloaibai WHERE lang='$lang' AND idcha = $idLoai AND  anhien=1 ORDER BY ThuTu";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        foreach ($kq as $row)
            $data[] = $row;
        return $data;
    }
    function luuykien(){
  $hoten =trim(strip_tags($_POST['hoten']));
  $tieude = trim(strip_tags($_POST['tieude']));
  $noidung = trim(strip_tags($_POST['noidung']));
  $sql = sprintf("INSERT INTO bandocykien SET 
    hoten='%s', tieude = '%s', noidung='%s',Ngay=NOW()",
    $this->db->escape_string($hoten),
    $this->db->escape_string($tieude),
    $this->db->escape_string($noidung));
  echo $sql;
  $this->db->query($sql) or print($this->db->error);
}//function luuykien
    
} //class