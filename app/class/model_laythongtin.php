<?php
class model_laythongtin
{
    public $db;
    public function __construct()
    {
        $this->db = new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        if ($this->db->connect_errno)
            die($db->connect_error);
        $this->db->set_charset("utf8");
    }
    function luutinmoilay($kq)
    {
        $sql = sprintf("INSERT INTO laytudong SET tieude='%s', tomtat='%s',
  urlhinh='%s', content='%s', source='%s', urlgoc='%s', ngay=NOW()", $this->db->escape_string($kq['tieude']), $this->db->escape_string($kq['tomtat']), $this->db->escape_string($kq['urlhinh']), $this->db->escape_string($kq['content']), $kq['source'], $kq['urlbv']);
        if (!$rs = $this->db->query($sql))
            die($this->db->error . " - " . $urlbv);
    }
    function laytinmoi($sotin)
    {
        $sql = "SELECT idbv, tieude, tomtat, ngay,urlgoc,source FROM laytudong
	     WHERE daduyet=0 ORDER BY idbv ASC LIMIT 0, $sotin";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        $data = array();
        while ($row = $kq->fetch_assoc())
            $data[] = $row;
        return $data;

    } // lay tin moi
    function layloai($lang = 'vi', $idcha = 0, $gach = '-  ', $arr = NULL)
    {
        if (!$arr)
            $arr = array();
        $sql = "SELECT idloai, tenloai FROM phanloaibai
         WHERE idcha=$idcha and lang='$lang'";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        while ($row = $kq->fetch_assoc()) {
            $arr[] = array(
                'id' => $row['idloai'],
                'ten' => $gach . $row['tenloai']
            );
            $arr   = $this->layloai($lang, $row['idloai'], $gach . '--   ', $arr);
        }
        return $arr;
    } //layloai
    function xem1bai($idbv)
    {
        settype($idbv, "int");
        $sql = "SELECT idbv,tieude,tomtat,content FROM laytudong WHERE idbv=$idbv";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        $row = $kq->fetch_assoc();
        return $row;
    }
    function chapnhanbai($idbv, $idloai, $anhien, $noibat, $lang, $iduser)
    {
        $sql = "SELECT tieude,tomtat,urlhinh,content
           FROM laytudong  WHERE idbv = $idbv";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        $row     = $kq->fetch_assoc();
        $tieude  = $row['tieude'];
        $tomtat  = $row['tomtat'];
        $urlhinh = $row['urlhinh'];
        $content = mysql_real_escape_string($row['content']);
        $alias   = $this->changeTitle($tieude);

        $sql = sprintf("INSERT INTO baiviet SET tieude ='%s', alias='%s',
	  tomtat = '%s', urlhinh = '%s', content = '%s', lang = '%s',
	  idloai = %d, anhien=%d, noibat=%d, idUser = %s, Ngay = NOW()", $tieude, $alias, $tomtat, $urlhinh, $content, $lang, $idloai, $anhien, $noibat, $iduser);
        if (!$aa = $this->db->query($sql))
            die($this->db->error);

        $q = "UPDATE laytudong SET daduyet = 1 WHERE idbv = $idbv";
        $this->db->query($q) or die($this->db->error);
    }
    function changeTitle($str)
    {
        $unicode = array(
            'a' => 'á|à|?|ã|?|a|?|?|?|?|?|â|?|?|?|?|?',
            'A' => 'Á|À|?|Ã|?|A|?|?|?|?|?|Â|?|?|?|?|?',
            'd' => 'd',
            'D' => 'Ð',
            'e' => 'é|è|?|?|?|ê|?|?|?|?|?',
            'E' => 'É|È|?|?|?|Ê|?|?|?|?|?',
            'i' => 'í|ì|?|i|?',
            'I' => 'Í|Ì|?|I|?',
            'o' => 'ó|ò|?|õ|?|ô|?|?|?|?|?|o|?|?|?|?|?',
            'O' => 'Ó|Ò|?|Õ|?|Ô|?|?|?|?|?|O|?|?|?|?|?',
            'u' => 'ú|ù|?|u|?|u|?|?|?|?|?',
            'U' => 'Ú|Ù|?|U|?|U|?|?|?|?|?',
            'y' => 'ý|?|?|?|?',
            'Y' => 'Ý|?|?|?|?'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }

        $str = str_replace(array(
            '?',
            '&',
            '+',
            '%',
            "'",
            '"'
        ), "", $str);
        $str = trim($str);
        while (strpos($str, '  ') > 0)
            $str = str_replace("  ", " ", $str);
        $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
        $str = str_replace(" ", "-", $str);
        return $str;
    } //changeTitle

} //class



?>