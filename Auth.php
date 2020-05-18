<?php
session_start();
include './db.php';
$st_list = getAll();
$st = $_GET['st'];
if (in_array($st, $st_list)) {
    echo 's';exit();
}
echo 'f';