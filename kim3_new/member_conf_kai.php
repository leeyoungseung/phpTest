<?php
session_start();
require_once (dirname ( __FILE__ ) . '/common.php');
	if (!$_POST['name']){
		$error_message['empty_name_err'] = 'ㆍお名前未入力禁止';
	}
	$_name = $_POST['name'];

	if (!$_POST['kana']){
		$error_message['empty_kana_err'] = 'ㆍフリガナ未入力禁止';
	}else {
		if (preg_match('/[^ァ-ヶー]+$/u', $_POST['kana'])){
			$error_message['kana_err'] = 'ㆍカナカナしか認めません';
		}
	}
	$_kana = $_POST['kana'];

	if (!$_POST['year']){
		$error_message['empty_year_err'] = 'ㆍ年未入力禁止';
	}else {
		if (!$_POST['month']){
			$error_message['month_err'] = 'ㆍ月default選択禁止';
		}else {
			if (!$_POST['day']){
				$error_message['day_err'] = 'ㆍ日default選択禁止';
			}
		}
	}
	$_year = $_POST['year'];
	$_months = $_POST['month'];
	$_days = $_POST['day'];

	if (!isset($_POST['phonenum'])){
		$error_message['empty_num_err'] = 'ㆍ電話番号未入力禁止';
	}else {
		if (!preg_match('/^\d{10,11}$/', $_POST['phonenum'])){
			$error_message['num_err'] = 'ㆍ10桁か11桁以外は認めない ';
		}
	}
	$_phonenum = $_POST['phonenum'];

	//radio의 경우 null값인지 확인하려면 isset메소드를 사용해야함
	$_gender ='';
	if (!isset($_POST['gender'])){
		$error_message['gender_err'] = 'ㆍ未選択禁止';
	}else{
		$_gender = $_POST['gender'];
	}


	if (!$_POST['address']){
		$error_message['address_err'] = 'ㆍdefault選択禁止';
	}
	$_address = $_POST['address'];

	if (!$_POST['city']){
		$error_message['empty_city_err'] = 'ㆍ市区町村未入力禁止';
	}
	$_city = $_POST['city'];

	if (!$_POST['etc']){
		$error_message['empty_etc_err'] = 'ㆍそれ以降未入力禁止';
	}
	$_etc = $_POST['etc'];

	if(!$_POST['apartment']){
		$error_message['empty_apt_err'] = 'ㆍそれ以降未入力禁止';
	}
	$apartment = $_POST['apartment'];

// 	//addから値取得
// 	$_name = $_POST['name'];
// 	$_kana = $_POST['kana'];
// 	$_year = $_POST['year'];
// 	$_months = $_POST['month'];
// 	$_days = $_POST['day'];
// 	$_phonenum = $_POST['phonenum'];
// 	$_gender = '';
// 	if(isset($_POST['gender'])){
// 		$_gender = $_POST['gender'];
// 	}
// 	$_address = $_POST['address'];
// 	$_city = $_POST['city'];
// 	$_etc = $_POST['etc'];
// 	$apartment = $_POST['apartment'];

if(empty($error_message)){
	$_SESSION['name'] = $_name;
	$_SESSION['kana'] = $_kana;
	$_SESSION['year'] = $_year;
	$_SESSION['month'] = $_months;
	$_SESSION['day'] = $_days;
	$_SESSION['phonenum'] = $_phonenum;
	$_SESSION['gender'] = $_gender;
	$_SESSION['address'] = $_address;
	$_SESSION['city'] = $_city;
	$_SESSION['etc'] = $_etc;
	$_SESSION['apartment'] = $apartment;
	header ( "Location: member_done_kai.php" );
}else{
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
	<form method="post" >
	<div>
		<span>名前</span>
		<input type="text" name="name" class="textfield" value="<?= !empty($_name) ? $_name : ''?>">
		<span class="error"><?= !empty($error_message['empty_name_err']) ? $error_message['empty_name_err'] : ''?></span>
	</div>
	<div>
		<span>フリガナ名前</span>
		<input type="text" name="kana" class="textfield" value="<?= !empty($_kana) ? $_kana : ''?>">
		<span class="error"><?= !empty($error_message['empty_kana_err']) ? $error_message['empty_kana_err'] : ''?></span>
        <span class="error"><?= !empty($error_message['kana_err']) ? $error_message['kana_err'] : ''?></span>
	</div>
	<div>
		<span>生年月日</span>
		<input type="text" name="year" class="year" value="<?= !empty($_year) ? $_year : ''?>">
			<select class="birthselect" name="month">
			<option value="" selected>--</option>
            <?php foreach(range(1,12) as $month): ?>
            <option <?php if (!empty($_months)): if (str_pad($month,2,0,STR_PAD_LEFT) === $_months): echo 'selected';?>
            	<?php endif; endif;?>
            	value="<?=str_pad($month,2,0,STR_PAD_LEFT)?>"><?=$month?></option>
            <?php endforeach; ?>
            </select>
            <select class="birthselect" name="day">
            <option value="" selected>--</option>
            <?php foreach(range(1,31) as $day): ?>
            <option <?php if (!empty($_days)): if (str_pad($day,2,0,STR_PAD_LEFT) === $_days): echo 'selected';?>
            	<?php endif; endif;?>
            	value="<?=str_pad($day,2,0,STR_PAD_LEFT)?>"><?=$day?></option>
                    <?php endforeach; ?>
            </select>
            <span class="error"><?= !empty($error_message['empty_year_err']) ? $error_message['empty_year_err'] : ''?></span>
            <span class="error"><?= !empty($error_message['month_err']) ? $error_message['month_err'] : ''?></span>
            <span class="error"><?= !empty($error_message['day_err']) ? $error_message['day_err'] : ''?></span>
	</div>
	<div>
		<span>電話番号</span>
		<input type="text" name="phonenum" class="textfield" placeholder="ハイフンは必要ありません" value="<?= !empty($_phonenum) ? $_phonenum : ''?>">
	    <span class="error"><?= !empty($error_message['num_err']) ? $error_message['num_err'] : ''?></span>
	</div>
	<div>
		<span>性別</span>
		<input type="radio" name="gender" value="male"  <?php if (!empty($_gender)):
               if ($_gender === 'male'):
               echo 'checked';?><?php endif; endif;?>>男性
        <input type="radio" name="gender" value="female" <?php if (!empty($_gender)):
              if ($_gender === 'female'):
               echo 'checked';?><?php endif; endif;?>>女性
        <span class="error"><?= !empty($error_message['gender_err']) ? $error_message['gender_err'] : ''?></span>
	</div>
	<div>
		<span>都道府県</span>
		<select name="address">
		<option value="" selected>お選びください</option>
			<?php foreach ($prefecture as $key => $val): ?>
			<option <?php if (!empty($_address)):
                   			if ($val === $prefecture[$_address]): echo 'selected';?>
                   			 <?php endif; endif;?>value="<?= $key ?>"><?= $val ?>
            <?php endforeach; ?>
        </select>
        <span class="error"><?= !empty($error_message['address_err']) ? $error_message['address_err'] : ''?></span>
	</div>
	<div>
		<span>市区町村</span>
		<input type="text" name="city" class="textfield" value="<?= !empty($_city) ? $_city : ''?>">
	<span class="error"><?= !empty($error_message['empty_city_err']) ? $error_message['empty_city_err'] : ''?></span>
	</div>
	<div>
		<span>それ以降</span>
		<input type="text" name="etc" class="textfield" value="<?= !empty($_etc) ? $_etc : ''?>">
		<span class="error"><?= !empty($error_message['empty_etc_err']) ? $error_message['empty_etc_err'] : ''?></span>
	</div>
	<div>
		<span>マンション名等</span>
		<input type="text" name="apartment" class="textfield" value="<?= !empty($apartment) ? $apartment : ''?>">
		<span class="error"><?= !empty($error_message['empty_apt_err']) ? $error_message['empty_apt_err'] : ''?></span>
	</div>
	<div>
		<input type="submit" class="btn" name="conf" value="確認">
	</div>
	</form>
	<form method="post" action="member_add_kai.php">
		<input type="hidden" name="name" value="<?= !empty($_name) ? $_name : ''?>">
		<input type="hidden" name="kana" value="<?= !empty($_kana) ? $_kana : ''?>">
		<input type="hidden" name="year" value="<?= !empty($_year) ? $_year : ''?>">
		<input type="hidden" name="month" value="<?= !empty($_months) ? $_months : ''?>">
		<input type="hidden" name="day" value="<?=!empty($_days) ? $_days : '' ?>">
		<input type="hidden" name="phonenum" value="<?= !empty($_phonenum) ? $_phonenum : ''?>">
		<input type="hidden" name="gender" value="<?= !empty($_gender) ? $_gender : ''?>">
		<input type="hidden" name="address" value="<?= !empty($_address) ? $_address : ''?>">
		<input type="hidden" name="city" value="<?= !empty($_city) ? $_city : ''?>">
		<input type="hidden" name="etc" value="<?=!empty($_etc) ? $_etc : '' ?>">
		<input type="hidden" name="apartment" value="<?= !empty($apartment) ? $apartment : ''?>">
		<input type="submit" class="btn" name="conf" value="修正">
	</form>
	</div>
</div>
</body>
</html>
<?php }?>