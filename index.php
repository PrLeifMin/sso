<?php
session_start();
include './db.php';

$_SESSION['url'] = '';
$_SESSION['notify_url'] = '';
$notify_url = $_GET['notify_url'];
$url = parse_url($notify_url, PHP_URL_HOST);


$_SESSION["notify_url"] = $notify_url;
$_SESSION["url"] = $url;

if(!isset($_COOKIE['is_login']) && $_COOKIE['is_login'] == false) {
    header('location:http://www.sso.com/login.html');
} else {

    $_ST = md5($_COOKIE['u_name'] . $_COOKIE['u_pass'] . $url);
    insert($_ST);
    header('location:' . $notify_url . '?st=' . $_ST);
}



