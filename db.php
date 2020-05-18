<?php
header("Content-type:text/html;charset=utf-8");


function init() {
    $conn = mysqli_connect('localhost', 'sso', '123456', 'sso');//三个参数分别对应服务器名，账号，密码
    if (!$conn) {
        die("连接服务器失败: " . mysqli_connect_error());//连接服务器失败退出程序
    }
    return $conn;
}
function insert($st)
{
    $conn = init();
    $retval = mysqli_query($conn, 'INSERT INTO sso_st(st) VALUE ("' . $st . '")');
    return $retval;
}
function getAll() {

    $conn = init();
    $list = array();
    $retval = mysqli_query($conn, 'SELECT `st` FROM sso_st');
    while($row = mysqli_fetch_row($retval)) {
        array_push($list, $row[0]);
    }
    return $list;

}