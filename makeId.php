<?php
	require_once 'db_conn.php';
	function makeId($memId){
	$result = null;
	$msg = null;
	$memId1 = mb_substr($memId, 0, 1);//시작 부터 지정한 수까지
	if($memId1=='0'){
		$memId1 = mb_substr($memId, 1, 3);
		$memId2 = mb_substr($memId1, 0, 1);
		if($memId2=='0'){
			$memId2 = mb_substr($memId, 2, 2);
			$memId3 = mb_substr($memId2, 0, 1);
			if($memId3=='0'){
				$msg = "앞 세자리가 0";
				$su = (int)mb_substr($memId, 3, 1);
				$su++;
				$result = "000".$su;

			}else{
				$msg = "앞 두자리가 0";
				$su = (int)$memId2;
				$su++;
				$result = "00".$su;
			}
		}else{
			$msg = "앞 한자리가 0";
			$su = (int)$memId1;
			$su++;
			$result = "0".$su;
		}
	}else{
		$msg = "제대로됨";
		$su = (int)$memId;
		$su++;
		$result = $su;
	}
	return (string)$result;
	}

	function findId($memId){
	$result = null;
	$msg = null;
	$memId1 = mb_substr($memId, 0, 1);//시작 부터 지정한 수까지
	if($memId1=='0'){
		$memId1 = mb_substr($memId, 1, 3);
		$memId2 = mb_substr($memId1, 0, 1);
		if($memId2=='0'){
			$memId2 = mb_substr($memId, 2, 2);
			$memId3 = mb_substr($memId2, 0, 1);
			if($memId3=='0'){
				$msg = "앞 세자리가 0";
				$result = "000".mb_substr($memId, 3, 1);
			}else{
				$msg = "앞 두자리가 0";
				$result = "00".$memId2;
			}
		}else{
			$msg = "앞 한자리가 0";
			$result = "0".$memId1;
		}
	}else{
		$msg = "제대로됨";
		$result = $memId;
	}
		return $result;
	}
?>