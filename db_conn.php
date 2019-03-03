<?php
$db = new mysqli("localhost", "root", "", "phpmyadmin");

if($db->connect_error){
	die("db error");
}

$db-> set_charset("UTF8");

function myq($sql){
	global $db;
	return $db->query($sql);
}

function maxId(){
	$sql = "select memId from membermst";
	$su = 0;
	$result = myq($sql);
	$data = array();
	while($row = $result -> fetch_assoc()){
		try {
			$data[$su] = $row["memId"];
		} catch (Exception $e) {
		}
		$su++;
	}
	return $data[$su-1];
}
?>