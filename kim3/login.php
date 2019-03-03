<?php
if(!empty($_GET['msg'])){
	$error_message['something_wrong'] = $_GET['msg'];
}
?>
<script>
function validate(){
	var id = document.getElementById("id");
    var pw = document.getElementById("password");
	if(id.value==""){
		alert("Please Input ID");
		return false;
	}

	if(pw.value==""){
		alert("Please Input password");
		return false;
	}

	return true;
}

</script>


<style>
.error {color: #FF0000;}
.textfield {width: 130px;}
.btn {width: 148px; background-color: #ffffff;}
</style>
<meta charset="utf-8">
<center>
   <form onsubmit="return validate();" action="member_add.php" method="post">
      <table>
         <tr>
             <td align="center">ID</td>
             <td><input type="text" class="textfield" id="id" name="id"></td>
             <td><span class="error"><?= (!empty($error_message['something_empty']) ? $error_message['something_empty'] : '')?></span>
             <span class="error"><?= (!empty($error_message['something_wrong']) ? $error_message['something_wrong'] : '')?></span></td>
          </tr>
          <tr>
             <td align="center">PASS</td>
             <td><input type="password" class="textfield" id="password" name="password"></td>
          </tr>
          <tr>
             <td colspan="2" align="center">
             <input type="submit" class="btn" name="send" value="ログイン">
             </td>
          </tr>
      </table>
   </form>
</center>