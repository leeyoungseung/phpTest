<?php
session_start();

if (empty($_SESSION['id'])){
    header('Location: login.php');
}

if (!empty($_POST['logout'])){
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<style>
.btn {width: 148px; background-color: #ffffff;}
</style>
<meta charset="utf-8">
<center>
    <form method="post" action="">
       <table>
          <tr>
               <td align="center">名前</td>
               <td><?= $_POST['name']?></td>
          </tr>
          <tr>
               <td align="center">フリガナ</td>
               <td><?= $_POST['kana']?></td>
          </tr>
          <tr>
               <td align="center">生年月日</td>
               <td><?= $_POST['year'].'年'.$_POST['month'].'月'.$_POST['day'].'日'?></td>
          </tr>
          <tr>
               <td align="center">電話番号</td>
               <td><?= $_POST['phonenum']?></td>
          </tr>
          <tr>
               <td align="center">性別</td>
               <td><?= $_POST['gender']?></td>
          </tr>
          <tr>
               <td align="center">都道府県</td>
               <td><?= $prefecture[$_POST['address']]?></td>
          </tr>
          <tr>
               <td align="center">市区町村</td>
               <td><?= $_POST['city']?></td>
          </tr>
          <tr>
               <td align="center">それ以降</td>
               <td><?= $_POST['etc']?></td>
          </tr>
          <tr>
               <td align="center">マンション名等</td>
               <td><?= $_POST['apartment']?></td>
          </tr>
          <tr><td><br></td></tr>
          <tr>
               <td colspan="2" align="center">
               上記メールを送信予定です。</td>
          </tr>
          <tr><td><br></td></tr>
          <tr>
             <td colspan="2" align="center">
             <input type="submit" class="btn" name="logout" value="ログアウト">
             </td>
          </tr>
      </table>
    </form>
</center>