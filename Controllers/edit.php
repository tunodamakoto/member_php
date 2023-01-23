<?php
///////////////////////////////////////
// 編集コントローラー
///////////////////////////////////////

include_once '../config.php';

include_once '../Models/members.php';

// 投稿を取得
if(!empty($_GET['id']) && empty($_POST['id'])) {
    $data = findData();
    // 投稿データが取得できない時はトップページ
    if(empty($data)) {
        header("Location: ./home.php");
        exit;
    }
// 投稿を更新
} elseif(!empty($_POST['id'])) {
    $name = preg_replace( '/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $_POST['name']);
	$phone = preg_replace( '/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $_POST['phone']);
	$email = preg_replace( '/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $_POST['email']);

    if(!empty($name) && !empty($phone) && !empty($email)){
        if(updataData($name, $phone, $email)) {
            header("Location: ./home.php");
            exit;
        }
    }else{
        $data = findData();
    }
}

include_once '../Views/edit.php';