<?php
session_start();
include './db.php';
$user = array(
    'admin' => '123456',
    'leifMin' => '123456'
);
$_ST = '';

$_name = $_POST['u_name'];
$_pass = $_POST['u_pass'];
if(isset($user[$_name]) && $user[$_name] == $_pass) {
    $_ST = md5($_name . $_pass . $_SESSION["url"]);
    $res = insert($_ST);
    setcookie("is_login", true);
    setcookie("u_name", $_name);
    setcookie("u_pass", $_pass);
    setcookie("st", $_ST);
    header('location:' . $_SESSION['notify_url'] . '?st=' . $_ST);

} else {
    echo '用户不存在';
}
