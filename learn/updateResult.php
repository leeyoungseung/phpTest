<?php
	header("Content-Type: text/html; charset=utf-8");
	require_once '../db_conn.php';
	$memId = $_POST["memId"];
	$memName = $_POST["memName"];
	$memMail = $_POST["memMail"];
	$comName = $_POST["comName"];
	$qur = "update membermst set memName='".$memName."',
			memMail='".$memMail."',comName='".$comName."' where memId='".$memId."'";
	$sql = myq($qur);
	$confirm = myq("select * from membermst where memId='".$memId."'");
	$row = $confirm->fetch_array();
	if($memName==$row["memName"] || $memMail==$row["memMail"] || $comName==$row["comName"]){
		echo "<script>alert('".$memName."様の情報変更を完了しました。')</script>";
		echo "<script>location.href='menu.php'</script>";
	}else {
		echo "<script>alert('変更エラー。')</script>";
		echo "<script>location.href='menu.php'</script>";
	}




?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Join</title>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php echo "memId : ".$memId?>
	<?php echo "memName : ".$memName?>
	<?php echo "memMail : ".$memMail?>
	<?php echo "comName : ".$comName?>
	<?php echo $qur?>
</body>
</html>