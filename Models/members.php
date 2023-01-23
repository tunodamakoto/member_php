<?php
///////////////////////////////////////
// メッセージデータを処理
///////////////////////////////////////

/**
    * データ１件を取得
    *
    * @return array|false
    */
function findData()
{
    // DB接続
    try{
        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        );
        $pdo = new PDO('mysql:charset=UTF8;dbname='.DB_NAME.';host='.DB_HOST , DB_USER, DB_PASS, $option);
    }catch(PDOException $e){
        echo $e->getMessage() . "\n";
    }
    $stmt = $pdo->prepare("SELECT * FROM members WHERE id = :id");

	// 値をセット
	$stmt->bindValue( ':id', $_GET['id'], PDO::PARAM_INT);

	// SQLクエリの実行
	$stmt->execute();

	// 表示するデータを取得
	$response = $stmt->fetch();

    return $response;
}

/**
    * データ一覧を取得
    *
    * @return array|false
    */
function findDatas()
{
    // DB接続
    try{
        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        );
        $pdo = new PDO('mysql:charset=UTF8;dbname='.DB_NAME.';host='.DB_HOST , DB_USER, DB_PASS, $option);
    }catch(PDOException $e){
        echo $e->getMessage() . "\n";
    }
    $sql = "SELECT * FROM members ORDER BY created_at DESC";
    $response = $pdo->query($sql);
    $pdo = null;

    return $response;
}

/**
    * データを登録
    *
    * @return array|false
    */
function createData($name, $phone, $email)
{
    // DB接続
    try{
        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        );
        $pdo = new PDO('mysql:charset=UTF8;dbname='.DB_NAME.';host='.DB_HOST , DB_USER, DB_PASS, $option);
    }catch(PDOException $e){
        echo $e->getMessage() . "\n";
    }
    // トランザクション開始
    $pdo->beginTransaction();
    try {
        // SQL作成
        $stmt = $pdo->prepare("INSERT INTO members (name, phone, email) VALUES ( :name, :phone, :email)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $response = $pdo->commit();
    } catch(Exception $e) {
        // ロールバック
        $pdo->rollBack();
    }
    $stmt = null;
    $pdo = null;

    return $response;
}

/**
    * データを更新
    *
    * @return array|false
    */
function updataData($name, $phone, $email)
{
    // DB接続
    try{
        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        );
        $pdo = new PDO('mysql:charset=UTF8;dbname='.DB_NAME.';host='.DB_HOST , DB_USER, DB_PASS, $option);
    }catch(PDOException $e){
        echo $e->getMessage() . "\n";
    }
    $pdo->beginTransaction();
    try {
        $stmt = $pdo->prepare("UPDATE members SET name = :name, phone = :phone, email = :email WHERE id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
        $stmt->execute();
        $response = $pdo->commit();
    } catch(Exception $e) {
        $pdo->rollBack();
    }
    $stmt = null;
    $pdo = null;

    return $response;
}

/**
    * データを削除
    *
    * @return array|false
    */
function deleteData()
{
    // DB接続
    try{
        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        );
        $pdo = new PDO('mysql:charset=UTF8;dbname='.DB_NAME.';host='.DB_HOST , DB_USER, DB_PASS, $option);
    }catch(PDOException $e){
        echo $e->getMessage() . "\n";
    }
    $pdo->beginTransaction();

    try {
        $stmt = $pdo->prepare("DELETE FROM members WHERE id = :id");
        $stmt->bindValue( ':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $response = $pdo->commit();
    } catch(Exception $e) {
        $pdo->rollBack();
    }
    $stmt = null;
    $pdo = null;

    return $response;
}