<?php
///////////////////////////////////////
// ホームコントローラー
///////////////////////////////////////

include_once '../config.php';

include_once '../Models/members.php';

// データ一覧
$datas = findDatas();

include_once '../Views/home.php';