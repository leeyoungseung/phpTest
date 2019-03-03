<?php
	require_once 'db_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>DB_EX</title>
</head>
<body>
<table>
	<thead>
		<tr>
			<th>이름</th>
			<th>나이</th>
			<th>성별</th>
			<th>메일</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql = "select * from user";
		$result = $db->query($sql);
		while($row = $result->fetch_assoc()){
		?>
		<tr>
			<td><?php echo $row["userName"]?></td>
			<td><?php echo $row["userAge"]?></td>
			<td><?php echo $row["userGender"]?></td>
			<td><?php echo $row["userEmail"]?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
</body>
</html>