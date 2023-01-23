<!DOCTYPE html>
<html lang="ja">
 
<head>
    <?php include_once('../Views/common/head.php'); ?>
    <title>新規登録画面 / メンバー管理システム</title>
</head>

<body>
    <div class="content">
        <div class="register">
            <h1 class="register-ttl">新規登録</h1>
            <form method="POST">
                <div class="register-input">
                    <label for="name">名前</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="register-input">
                    <label for="phone">電話番号</label>
                    <input type="text" name="phone" id="phone">
                </div>
                <div class="register-input">
                    <label for="email">メールアドレス</label>
                    <input type="text" name="email" id="email">
                </div>
                <input type="submit" name="register-submit" class="register-btn" value="登録">
            </form>
        </div>
    </div>
</body>