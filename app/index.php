<?php
session_start();
require_once "config.php";
$lang = 'vi';
$url  = $_SERVER['REQUEST_URI'];
$kq   = tach_url($url, $lang, $cname, $action, $params);
if (class_exists($cname, true) == true)
    $c = new $cname($action, $params, $lang);
else
    die('Khong co controller ' . $cname);

require "lang_$lang.php";
ob_start();

if (method_exists($c, $action))
    $c->$action();

else
    die('Không có action ' . $action);
$str=ob_get_clean();         // lay ra vao xoa hetdu lieu
$str = str_replace("{SiteTitle}" , SiteTitle , $str);
$str = str_replace("{BaiXN}" , BaiXN , $str);
$str = str_replace("{DangNhap}" , DangNhap, $str);
$str = str_replace("{UserName}" , UserName, $str);
$str = str_replace("{Password}" , Password, $str);
$str = str_replace("{Remember}" , Remember, $str);
$str = str_replace("{Register}" , Register, $str);
$str = str_replace("{MenuHome}" , MenuHome, $str);
$str = str_replace("{ForgotPassword}" , ForgotPassword, $str);
$str = str_replace("{ChangePassword}" , ChangePassword, $str);
$str = str_replace("{Logout}" , Logout, $str);
echo $str;

function __autoload($class_name)
{
    $filename = "class/" . $class_name . '.php';
    if (file_exists($filename))
        require_once($filename);
} //autoload
function tach_url($url, &$lang, &$cname, &$action, &$params)
{
    $arr = explode("/", $url);
    if (count($arr) <= 2)
        return FALSE;
    $lang = $arr[2];

    // Kiem tra bien lang nay co dung white liatk, k thi gan no no = vi
    if (in_array($lang, explode(',', NGONNGU)) == false)
        $lang = 'vi';
    $cname = $arr[3];
    if ($cname == "") {
        $cname  = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;
        $params = NULL;
        return TRUE;
    }
    $action = $arr[4];
    if ($action == "") {
        $action = DEFAULT_ACTION;
        $params = NULL;
        return TRUE;
    }
    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    $params = $arr;
    return TRUE;
} //tach_url