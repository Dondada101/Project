<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
if(isset($_POST['uname']) && isset($_POST['password'])){
$uname=htmlspecialchars($_POST['uname'], ENT_QUOTES,'UTF-8');
$dpw=htmlspecialchars($_POST['password'], ENT_QUOTES,'UTF-8');
require '../classes/conn.class.php';
require '../classes/doctorOp.class.php';
require '../classes/doctorOPCtrl.class.php';

}
}
?>