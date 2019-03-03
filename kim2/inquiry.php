<?php
require_once (dirname(__FILE__).'/prefecture.php');
?>

<form action="confirm.php" method="post">
    氏名<input type="text" name="name"><br><br>
    フリガナ<input type="text" name="kana"><br><br>
    ID<input type="text" name="id"><br><br>
    password<input type="password" name="password"><br><br>
    都道府県<select name="place">
    <?php foreach ($place as $key => $val): ?>
    <option value="<?= $val; ?>"><?= $val; ?>
    <?php endforeach; ?>
    </select><br><br>
    問い合わせ内容<textarea name="detail" cols="45" rows="6" placeholder="ここに入力した内容が次のページへ引き継げるようにしてください。"></textarea><br><br>
    <input type="submit" name="get_send" value="送信">
</form>