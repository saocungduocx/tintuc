<?php
require_once "simple_html_dom.php";
class laythongtin
{
    public $laytt;
    function __construct($action, $params)
    {
        $this->laytt  = new model_laythongtin;
        $this->params = $params;
    }
    function nld()
    {
        // set_time_limit(0);
        $urldolink = "http://nld.com.vn/";
        $tenmien   = "http://nld.com.vn/";
        $source    = "Nguoi Lao Dong";

        $linkarray = array();
        $kq        = file_get_html($urldolink);

        //bắt đầu dò tiêu đề theo đặc điểm 1
        $arr = $kq->find(".homehltotal .item-bt-homev4 a");
        foreach ($arr as $link) {
            if ($link->href == NULL)
                continue;
            if ($link->plaintext == NULL)
                continue;
            $tieude = str_replace("&nbsp;", " ", $link->plaintext);
            $tieude = trim($tieude);
            if ($tieude == "")
                continue;

            if (substr($link->href, 0, 1) == "/")
                $link->href = $tenmien . $link->href;
            if (substr($link->href, 0, 7) != "http://")
                $link->href = $tenmien . "/" . $link->href;
            if (substr($link->href, 0, strlen($tenmien)) != $tenmien)
                continue;

            if (in_array($link->href, $linkarray) == false)
                $linkarray[] = $link->href;
        } //foreach
        //kết thúc dò tiêu đề theo đặc điểm 1

        $kq->clear();
        unset($kq);
        foreach ($linkarray as $urlbv)
            echo $urlbv, "<br>";
        //aaaa
        foreach ($linkarray as $urlbv) {
            $html = file_get_html($urlbv);
            $kq   = array();
            $td   = $html->find('.titledetail h1', 0);
            if (is_null($td))
                continue;
            $kq['tieude']  = strip_tags($td->plaintext);
            $td->outertext = '';
            $tt            = $html->find('h2.sapo ', 0);
            if (is_null($tt))
                continue;
            $kq['tomtat']  = strip_tags($tt->innertext);
            $tt->outertext = '';
            $content       = $html->find('.contentdetail', 0);
            if (is_null($content))
                continue;
            $urlhinh = '';
            if ($content != NULL)
                foreach ($content->find('img') as $img) {
                    if (substr($img->src, 0, 1) == "/")
                        $img->src = $tenmien . $img->src;
                    if (substr($img->src, 0, 7) != "http://")
                        $img->src = $tenmien . "/" . $img->src;
                    $tenfile  = basename($img->src);
                    $pathfile = "../img/baiviet/" . $tenfile;
                    file_put_contents($pathfile, file_get_contents($img->src));
                    $img->src = "/tintuc/img/baiviet/" . $tenfile;
                    if ($urlhinh == '') {
                        $urlhinh = $img->src;
                        break;
                    }
                } //foreach

            $kq['content'] = $content->innertext;
            $kq['urlhinh'] = $urlhinh;
            $kq['source']  = $source;
            $kq['urlbv']   = $urlbv;
            $html->clear();
            unset($html);

            echo "Tieude : " . $kq['tieude'] . "<br/>";
            echo "Tomat : " . $kq['tomtat'] . "<br/>";
            echo "Content: <code>", $kq['content'], "</code><hr/>";
            $this->laytt->luutinmoilay($kq);
            flush();
        } //foreach


    } //function thanhnien
    function duyetbai()
    {
        $baimoi   = $this->laytt->laytinmoi(5);
        $phanloai = $this->laytt->layloai('vi', 0);
        require_once "view/duyetbai.php";
    }
    function cancel()
    {
        $idbv = $this->params[0];
        settype($idbv, "int");
        $this->laytt->cancel($idbv);
        echo "OK";
    }
    function xem1bai()
    {
        $idbv = $this->params[0];
        settype($idbv, "int");
        $row = $this->laytt->xem1bai($idbv);
        echo "<h3>" . $row['tieude'], "</h3>";
        echo "<i>" . $row['tomtat'], "</i><hr/>";
        echo "<div>" . $row['content'], "</div>";
    }
    function chapnhanbai()
    {
        $idloai = $this->params[0];
        settype($idloai, "int");
        $idbv = $this->params[1];
        settype($idbv, "int");
        $anhien = $this->params[2];
        settype($anhien, "int");
        $noibat = $this->params[3];
        settype($noibat, "int");
        $lang   = 'vi';
        $iduser = 20; //$_SESSION['login_id'];
        $this->laytt->chapnhanbai($idbv, $idloai, $anhien, $noibat, $lang, $iduser);
        echo "OK";
    }




} //class


?>