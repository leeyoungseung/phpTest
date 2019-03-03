<h1>問い合わせ内容確認</h1>

<?php

$name = $_POST['name'];
$kana = $_POST['kana'];
$id = $_POST['id'];
$password = $_POST['password'];
$detail = $_POST['detail'];
$place = $_POST['place'];
?>

氏名 : <?= $name?><BR><BR>
フリガナ : <?= $kana?><BR><BR>
ID : <?= $id?><BR><BR>
password : <?= $password?><BR><BR>
都道府県 : <?= $place ?><BR><BR>
問い合わせ内容 : <?= $detail?><BR><BR>
