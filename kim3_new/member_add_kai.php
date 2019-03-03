<?php
require_once (dirname ( __FILE__ ) . '/common.php');
session_start ();
$ID = 'test';
$PW = 'test1234';

//1.이미 로그인 상태인지 확인
if(!isset($_SESSION ['id']) || !isset($_SESSION ['password'])){
	//2 POST에서 값이 왔는지 확인
	if(isset($_POST ['id']) || isset($_POST ['password'])){
		//3 정보가 맞는지 확인
		if($_POST ['id'] != $ID || $_POST ['password'] != $PW) {
			header ( "Location: login_kai.php?msg='ㆍIDかPASSが間違っています。'" );
		} else {
			// 4. 세션에 등록
			$_SESSION ['id'] = $_POST ['id'];
			$_SESSION ['password'] = $_POST ['password'];
			echo $_SESSION ['id'];
			echo $_SESSION ['password'];
		}
	}
}else{
	// 디버그용
	echo $_SESSION ['id'];
	echo $_SESSION ['password'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>member_add</title>
<style>
.textfield {
	width: 170px;
}

.year {
	width: 82px;
}

.birthselect {
	width: 40px;
}

.btn {
	width: 148px;
	background-color: #ffffff;
}

.error {
	color: #FF0000;
}
</style>
</head>
<body>
<div>
	<div align="center">
	<form method="post" action="member_conf_kai.php">
	<div>
		<span>名前</span>
		<input type="text" name="name" class="textfield" value="<?= isset($_POST['name']) ? $_POST['name'] : ''?>">
	</div>
	<div>
		<span>フリガナ名前</span>
		<input type="text" name="kana" class="textfield" value="<?= isset($_POST['kana']) ? $_POST['kana'] : ''?>">
	</div>
	<div>
		<span>生年月日</span>
		<input type="text" name="year" class="year" value="<?= isset($_POST['year']) ? $_POST['year'] : ''?>">
			<select class="birthselect" name="month">
			<option value="" selected>--</option>
            <?php foreach(range(1,12) as $month): ?>
            <option <?php if (isset($_POST['month'])): if (str_pad($month,2,0,STR_PAD_LEFT) === $_POST['month']): echo 'selected';?>
            	<?php endif; endif;?>
            	value="<?=str_pad($month,2,0,STR_PAD_LEFT)?>"><?=$month?></option>
            <?php endforeach; ?>
            </select>
            <select class="birthselect" name="day">
            <option value="" selected>--</option>
            <?php foreach(range(1,31) as $day): ?>
            <option <?php if (isset($_POST['day'])): if (str_pad($day,2,0,STR_PAD_LEFT) === $_POST['day']): echo 'selected';?>
            	<?php endif; endif;?>
            	value="<?=str_pad($day,2,0,STR_PAD_LEFT)?>"><?=$day?></option>
                    <?php endforeach; ?>
            </select>
	</div>
	<div>
		<span>電話番号</span>
		<input type="text" name="phonenum" class="textfield" placeholder="ハイフンは必要ありません" value="<?= isset($_POST['phonenum']) ? $_POST['phonenum'] : ''?>">
	</div>
	<div>
		<span>性別</span>
		<input type="radio" name="gender" value="male"  <?php if (isset($_POST['gender'])):
               if ($_POST['gender'] === 'male'):
               echo 'checked';?><?php endif; endif;?>>男性
        <input type="radio" name="gender" value="female" <?php if (isset($_POST['gender'])):
              if ($_POST['gender'] === 'female'):
               echo 'checked';?><?php endif; endif;?>>女性
	</div>
	<div>
		<span>都道府県</span>
		<select name="address">
		<option value="" selected>お選びください</option>
			<?php foreach ($prefecture as $key => $val): ?>
			<option <?php if (isset($_POST['address'])):
                   			if ($val === $prefecture[$_POST['address']]): echo 'selected';?>
                   			 <?php endif; endif;?>value="<?= $key ?>"><?= $val ?>
            <?php endforeach; ?>
        </select>
	</div>
	<div>
		<span>市区町村</span>
		<input type="text" name="city" class="textfield" value="<?= isset($_POST['city']) ? $_POST['city'] : ''?>">
	</div>
	<div>
		<span>それ以降</span>
		<input type="text" name="etc" class="textfield" value="<?= isset($_POST['etc']) ? $_POST['etc'] : ''?>">
	</div>
	<div>
		<span>マンション名等</span>
		<input type="text" name="apartment" class="textfield" value="<?= isset($_POST['apartment']) ? $_POST['apartment'] : ''?>">
	</div>
	<div>
		<input type="submit" class="btn" name="conf" value="確認">
	</div>
	</form>
	</div>
</div>
</body>
</html>