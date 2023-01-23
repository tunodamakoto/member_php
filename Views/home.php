<!DOCTYPE html>
<html lang="ja">
 
<head>
    <?php include_once('../Views/common/head.php'); ?>
    <title>ホーム画面 / メンバー管理システム</title>
</head>

<body>
    <div class="content">
        <h1 class="top-ttl">メンバー管理システム</h1>
        <div class="top-inner">
            <table class="top-table">
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>電話番号</th>
                        <th>メールアドレス</th>
                        <th style="width:100px;"></th>
                    </tr>
                </thead>
                <?php if(!empty($datas)): ?>
                    <?php foreach($datas as $value): ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars( $value['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars( $value['phone'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars( $value['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><a href="edit.php?id=<?php echo $value['id']; ?>">編集</a></td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
        <a href="register.php" class="top-btn">新規登録</a>
    </div>
</body>