<?php
if (isset($_POST['btnback'])){
	echo $_POST['btnback'];
	echo '戻ってきました';
}
?>
<div>
	<h1>Here is Page A</h1>
</div>
<div>
<form action="09-02c.php" method="post">
	<input type="hidden" name="page_value" value="a">
    <input type="submit" value="ページ移動">
</form>
</div>