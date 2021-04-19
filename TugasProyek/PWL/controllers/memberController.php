<?php
session_start();
require_once '../php/koneksi.php';
require_once '../models/Member.php';

//1.tangkap request element form
$username = $_POST['username'];
$password = $_POST['password'];

//2.menyimpan data2 di atas sebuah array
$data = [
    $username, //? 1
    $password, //? 2
];

//3.proses
$obj = new Member();
$rs = $obj->cekLogin($data);
if(!empty($rs)){
    //simpan session
    $_SESSION['MEMBER'] = $rs;
    //landing page
    header('Location:http://localhost/TugasProyek/PWL/php/index.php?hal=dataPegawai');    
}
else{
    //landing page
    header('Location:http://localhost/TugasProyek/PWL/php/index.php?hal=gagalLogin');
}