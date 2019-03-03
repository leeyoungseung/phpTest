<?php
	header("Content-Type: text/html; charset=utf-8");
	require_once '../db_conn.php';
	require_once '../makeId.php';
	$memId = makeId(maxId());
	$memName = $_POST["memName"];
	$memMail = $_POST["memMail"];
	$comName = $_POST["comName"];

	$sql = myq("insert into membermst (memId, memName, memMail, comName)
			values ('".$memId."','".$memName."', '".$memMail."', '".$comName."')");

	$confirm = myq("select * from membermst where memId='".$memId."'");
	$row = $confirm->fetch_array();
	if($row["memId"]==$memId){
		echo "<script>alert('".$row["memName"]."様の登録を完了しました。')</script>";
		echo "<script>location.href='menu.php'</script>";
	}else{
		echo "<script>alert('登録エラー。')</script>";
		echo "<script>location.href='menu.php'</script>";
	}


?>
