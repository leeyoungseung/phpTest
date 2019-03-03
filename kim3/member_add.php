<?php
require_once (dirname(__FILE__).'/common.php');
session_start();
$ID = 'test';
$PW = 'test1234';

$P_ID = $_POST['id'];
$P_PW = $_POST['password'];
echo $_POST['id'];
echo $_POST['password'];

if ($_POST['id']!=$ID || $_POST['password']!= $PW){
    header("Location: login.php?msg='ㆍIDかPASSが間違っています。'");
}else{
	$_SESSION['id'] = $_POST['id'];
	$_SESSION['password'] = $_POST['password'];
}

if (!empty($_POST['conf'])){
    if (empty($_POST['name'])){
        $error_message['empty_name_err'] = 'ㆍお名前未入力禁止';
    }

    if (empty($_POST['kana'])){
        $error_message['empty_kana_err'] = 'ㆍフリガナ未入力禁止';
    }else {
        if (preg_match('/[^ァ-ヶー]+$/u', $_POST['kana'])){
            $error_message['kana_err'] = 'ㆍカナカナしか認めません';
        }
    }

    if (empty($_POST['year'])){
        $error_message['empty_year_err'] = 'ㆍ年未入力禁止';
    }else {
        if ($_POST['month'] === ''){
            $error_message['month_err'] = 'ㆍ月default選択禁止';
        }else {
            if ($_POST['day'] === ''){
                $error_message['day_err'] = 'ㆍ日default選択禁止';
            }
        }
    }

    if (empty($_POST['phonenum'])){
        $error_message['empty_num_err'] = 'ㆍ電話番号未入力禁止';
    }else {
        if (!preg_match('/^\d{10,11}$/', $_POST['phonenum'])){
            $error_message['num_err'] = 'ㆍ10桁か11桁以外は認めない ';
        }
    }

    if (empty($_POST['gender'])){
        $error_message['gender_err'] = 'ㆍ未選択禁止';
    }

    if ($_POST['address'] === ''){
        $error_message['address_err'] = 'ㆍdefault選択禁止';
    }

    if (empty($_POST['city'])){
        $error_message['empty_city_err'] = 'ㆍ市区町村未入力禁止';
    }

    if (empty($_POST['etc'])){
        $error_message['empty_etc_err'] = 'ㆍそれ以降未入力禁止';
    }


    if (empty($error_message)){
        echo '에러가 없습니다';
//         echo '<input type="hidden" name="err">';
        $error_message['no_err'] = 'エラーなし';
//         header('Location: member_conf.php', true);
    }else {
        echo '에러가 있습니다';
//         echo '<input type="hidden" name="err">';
    }
}
?>

<style>
.textfield {width: 170px;}
.year {width: 82px;}
.birthselect {width: 40px;}
.btn {width: 148px; background-color: #ffffff;}
.error {color: #FF0000;}
</style>

<meta charset="utf-8">
<center>
    <form method="post" action="member_conf.php">
       <table>
          <tr>
               <td align="center">名前</td>
               <td><input type="text" name="name" class="textfield" value="<?= !empty($_POST['name']) ? $_POST['name'] : ''?>"></td>
             <td><span class="error"><?= !empty($error_message['empty_name_err']) ? $error_message['empty_name_err'] : ''?></span>
          </tr>
          <tr>
               <td align="center">フリガナ</td>
               <td><input type="text" name="kana" class="textfield" value="<?= !empty($_POST['kana']) ? $_POST['kana'] : ''?>"></td>
              <td><span class="error"><?= !empty($error_message['empty_kana_err']) ? $error_message['empty_kana_err'] : ''?></span>
             <span class="error"><?= !empty($error_message['kana_err']) ? $error_message['kana_err'] : ''?></span></td>
          </tr>
          <tr>
               <td align="center">生年月日</td>
               <td><input type="text" name="year" class="year" value="<?= !empty($_POST['year']) ? $_POST['year'] : ''?>">
               <select class="birthselect" name="month">
                   <option value="" selected>--</option>
                 <?php foreach(range(1,12) as $month): ?>
                    <option <?php if (!empty($_POST['month'])):
                    if (str_pad($month,2,0,STR_PAD_LEFT) === $_POST['month']):
                       echo 'selected';?> <?php endif; endif;?> value="<?=str_pad($month,2,0,STR_PAD_LEFT)?>"><?=$month?></option>
                    <?php endforeach; ?>
               </select>
               <select class="birthselect" name="day">
                    <option value="" selected>--</option>
                    <?php foreach(range(1,31) as $day): ?>
                    <option <?php if (!empty($_POST['day'])):
                    if (str_pad($day,2,0,STR_PAD_LEFT) === $_POST['day']):
                       echo 'selected';?> <?php endif; endif;?> value="<?=str_pad($day,2,0,STR_PAD_LEFT)?>"><?=$day?></option>
                    <?php endforeach; ?>
                </select></td>
                <td><span class="error"><?= !empty($error_message['empty_year_err']) ? $error_message['empty_year_err'] : ''?></span>
                <span class="error"><?= !empty($error_message['month_err']) ? $error_message['month_err'] : ''?></span>
                <span class="error"><?= !empty($error_message['day_err']) ? $error_message['day_err'] : ''?></span></td>
          </tr>
          <tr>
               <td align="center">電話番号</td>
               <td><input type="text" name="phonenum" class="textfield" placeholder="ハイフンは必要ありません" value="<?= !empty($_POST['phonenum']) ? $_POST['phonenum'] : ''?>"></td>
               <td><span class="error"><?= !empty($error_message['empty_num_err']) ? $error_message['empty_num_err'] : ''?></span>
               <span class="error"><?= !empty($error_message['num_err']) ? $error_message['num_err'] : ''?></span></td>
          </tr>
          <tr>
               <td align="center">性別</td>
               <td><input type="radio" name="gender" value="male" <?php if (!empty($_POST['gender'])):
               if ($_POST['gender'] === 'male'):
               echo 'checked';?><?php endif; endif;?>>男性
              <input type="radio" name="gender" value="female" <?php if (!empty($_POST['gender'])):
              if ($_POST['gender'] === 'female'):
               echo 'checked';?><?php endif; endif;?>>女性</td>
               <td><span class="error"><?= !empty($error_message['gender_err']) ? $error_message['gender_err'] : ''?></span>
          </tr>
          <tr>
               <td align="center">都道府県</td>
               <td><select name="address">
                  <option value="" selected>お選びください</option>
                  <?php foreach ($prefecture as $key => $val): ?>
                   <option <?php if (!empty($_POST['address'])):
                   if ($val === $prefecture[$_POST['address']]):
                       echo 'selected';?> <?php endif; endif;?>value="<?= $key ?>"><?= $val ?>
                   <?php endforeach; ?>
               </select></td>
               <td><span class="error"><?= !empty($error_message['address_err']) ? $error_message['address_err'] : ''?></span>
          </tr>
          <tr>
               <td align="center">市区町村</td>
               <td><input type="text" name="city" class="textfield" value="<?= !empty($_POST['city']) ? $_POST['city'] : ''?>"></td>
               <td><span class="error"><?= !empty($error_message['empty_city_err']) ? $error_message['empty_city_err'] : ''?></span>
          </tr>
          <tr>
               <td align="center">それ以降</td>
               <td><input type="text" name="etc" class="textfield" value="<?= !empty($_POST['etc']) ? $_POST['etc'] : ''?>"></td>
               <td><span class="error"><?= !empty($error_message['empty_etc_err']) ? $error_message['empty_etc_err'] : ''?></span>
          </tr>
          <tr>
               <td align="center">マンション名等</td>
               <td><input type="text" name="apartment" class="textfield" value="<?= !empty($_POST['apartment']) ? $_POST['apartment'] : ''?>"></td>
          </tr>
          <tr>
             <td colspan="2" align="center">
             <input type="submit" class="btn" name="conf" value="確認">
             <input type="hidden" <?php if (!empty($error_message)): echo 'name="err"';?>><?php endif;?>
             </td>
          </tr>
      </table>
    </form>
</center>