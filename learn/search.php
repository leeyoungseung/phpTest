<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Search</title>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script
  src="http://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
 $("#send").click(function(){
  var memId = $("#memId").val();
  memId = $.trim(memId);
  alert("1 : "+memId);
  if(memId==''){
   alert("ID入力してください");
   return;
  }
  if(memId.length!=4){
	  alert("４字のみ入力してください");
	   return;
  }
  memId = memId.toUpperCase();
  for(var i=0; i<memId.length; i++){
   if(!('0' <=memId.charAt(i)&&memId.charAt(i)<='9')){
   alert("数字のみ入力してください");
   return;
   }
  }
 $("form").attr("action", "searchResult.php").submit();
 });
});
</script>
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<div>
		<form action="searchResult.php" method="post" name="sf">
		<p class="text-center">ID : <input type="text" id="memId" name="memId" maxlength="4">
		<input class="btn btn-primary" type="button" value="検索" id="send"></p>
		</form>
		</div>
		<div align="center">
			<button class="btn btn-primary" type="button" onclick="location.href='menu.php'">戻る</button>
		</div>
	</div>
</div>
</body>
</html>
