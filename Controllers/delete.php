<?php
///////////////////////////////////////
// 削除コントローラー
///////////////////////////////////////

include_once '../config.php';

include_once '../Models/members.php';

if(!empty($_GET['id'])) {
    if(deleteData()) {
        header("Location: ./home.php");
        exit;
    }
}