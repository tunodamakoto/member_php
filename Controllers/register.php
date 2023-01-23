<?php
///////////////////////////////////////
// ホームコントローラー
///////////////////////////////////////

include_once '../config.php';

include_once '../Models/members.php';

// 新規登録
if(!empty($_POST['register-submit'])) {
    $name = preg_replace( '/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $_POST['name']);
	$phone = preg_replace( '/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $_POST['phone']);
	$email = preg_replace( '/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $_POST['email']);

    if(!empty($name) && !empty($phone) && !empty($email)){
        if(createData($name, $phone, $email)) {
            header("Location: ./home.php");
            exit;
        }
    }
}

include_once '../Views/register.php';