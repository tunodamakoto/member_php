<!DOCTYPE html>
<html lang="ja">
 
<head>
    <?php include_once('../Views/common/head.php'); ?>
    <title>編集画面 / メンバー管理システム</title>
</head>

<body>
    <div class="content">
        <div class="edit">
            <h1 class="edit-ttl">メンバー編集</h1>
            <form method="POST">
                <input type="text" name="id" value="" class="form-control" hidden>
                <div class="edit-input">
                    <label for="name">名前</label>
                    <input type="text" name="name" id="name" value="<?php if(!empty($data['name'])){echo $data['name'];} ?>">
                </div>
                <div class="edit-input">
                    <label for="phone">電話番号</label>
                    <input type="text" name="phone" id="phone" value="<?php if(!empty($data['phone'])){echo $data['phone'];} ?>">
                </div>
                <div class="edit-input">
                    <label for="email">メールアドレス</label>
                    <input type="text" name="email" id="email" value="<?php if(!empty($data['email'])){echo $data['email'];} ?>">
                </div>
                <div class="edit-btn">
                    <input type="submit" class="edit-btn-a" style="margin-right:15px;" value="保存">
                    <input type="hidden" name="id" value="<?php if(!empty($data['id'])){echo $data['id'];}elseif(!empty($_POST['id'])){echo htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');} ?>">
                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="edit-btn-a"><button type="button">削除</button></a>
                </div>
            </form>
        </div>
    </div>
</body>