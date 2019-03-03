<?php
	require_once '../db_conn.php';
	require_once '../makeId.php';
	$memId = $_POST["memId"];
	$sql = myq("select * from membermst where memId = '".findId($memId)."'");
	$row = $sql->fetch_array();
	if($row["memId"]!=$memId){
		echo "<script>alert('".$row["memId"]."様は登録されていません。')</script>";
		echo "<script>location.href='search.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>searchResult</title>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<table class="table" border="1">
			<tbody>
				<tr>
					<td><p class="text">ID</p></td><td><?php echo $row["memId"]?></td>
				</tr>
				<tr>
					<td><p class="text">氏名</p></td><td><?php echo $row["memName"]?></td>
				</tr>
				<tr>
					<td><p class="text">メールアドレス</p></td><td><?php echo $row["memMail"]?></td>
				</tr>
				<tr>
					<td><p class="text">会社名</p></td><td><?php echo $row["comName"]?></td>
				</tr>
			</tbody>
		</table>
		<div class="center">
			<button class="btn btn-primary" type="button" onclick="location.href='search.php'">戻る</button>
		</div>
	</div>
</div>
</body>
</html>
