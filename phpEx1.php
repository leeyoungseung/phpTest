<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hello David!</title>
</head>
<body>
	php를 공부해보자<br>
	<?php
	require_once 'db_conn.php';
	$arr = array();
	for($i=0; $i<=4; $i++){
		$arr[$i]=$i;
		echo $arr[$i];
	}
	echo "총 몇명? : ".maxId();
	?>
</body>
</html>