<?php
session_start ();
if (! empty ( $_GET ['msg'] )) {
	$error_message ['something_wrong'] = $_GET ['msg'];
}

if(isset($_SESSION['id']) || isset($_SESSION['password'])){
	echo 'Login状態';
}else{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>loginKai</title>
<script type="text/javascript">
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
.error {
	color: #FF0000;
}

.textfield {
	width: 130px;
}

.btn {
	width: 148px;
	background-color: #ffffff;
}
</style>
</head>
<body>
<div>
	<div align="center">
	<form onsubmit="return validate();" action="member_add_kai.php"
		method="post">
	<div>
	<span class="error"><?= !empty($error_message['something_wrong']) ? $error_message['something_wrong'] : ''?></span>
	</div>
	<div>
		<span>ID</span> :
		<input type="text" class="textfield" id="id" name="id">
	</div>
	<div>
		<span>PW</span> :
		<input type="password" class="textfield" id="password" name="password">
	</div>

	<div>
		<input type="submit" class="btn" name="send" value="ログイン">
	</div>
	</form>
	</div>
</div>
</body>
</html>
<?php }?>