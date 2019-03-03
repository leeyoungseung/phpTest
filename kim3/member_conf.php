<?php
if (empty($_POST['err'])){
    require_once (dirname(__FILE__).'/member_add.php');
//     require (dirname(__FILE__).'/member_add.php');
//     file_get_contents(dirname(__FILE__).'/member_add.php');
    return ;
}else {
//     require_once (dirname(__FILE__).'/common.php');

//     session_cache_limiter('private_no_expire');

//     session_start();

    if (empty($_SESSION['id'])){
        header('Location: login.php');
    }

    // if (!empty($_POST['conf'])){
    //     $_SESSION['name'] = $_POST['name'];
    //     $_SESSION['kana'] = $_POST['kana'];
    //     $_SESSION['year'] = $_POST['year'];
    //     $_SESSION['month'] = $_POST['month'];
    //     $_SESSION['day'] = $_POST['day'];
    //     $_SESSION['phonenum'] = $_POST['phonenum'];
    // //     $_SESSION['gender'] = $_POST['gender'];
    //     $_SESSION['address'] = $prefecture[$_POST['address']];
    //     $_SESSION['city'] = $_POST['city'];
    //     $_SESSION['etc'] = $_POST['etc'];
    //     $_SESSION['apartment'] = $_POST['apartment'];
    //     if ($_POST['gender'] === 'male'){
    //         $_SESSION['gender'] = '男性';
    //     }else {
    //         $_SESSION['gender'] = '女性';
    //     }
    // }

    if ($_POST['gender'] === 'male'){
        $_POST['gender'] = '男性';
    }else {
        $_POST['gender'] = '女性';
    }

    if (isset($_POST['edit'])){
        header('Location: member_add.php');
    }
?>
<style>
.btn {width: 148px; background-color: #ffffff;}
</style>
<meta charset="utf-8">
<center>
    <form method="post" action="member_done.php">
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
               入力した情報にまちがいがなければ<br>送信ボダンを押してください。</td>
          </tr>
          <tr><td><br></td></tr>
          <tr>
             <td colspan="2" align="center">
             <input type="submit" class="btn" name="conf" value="送信">
             <input type="submit" class="btn" name="edit" value="修正" onClick="form.action='member_add.php';return true">
             </td>
          </tr>
      </table>
    </form>
</center>
<?php
}?>