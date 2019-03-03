<?php
if (isset($_POST['btnback'])){
    echo $_POST['btnback'];
    echo '戻ってきました';
}
?>
<div>
	<h1>Here is Page B</h1>
</div>
<div>
<form action="09-02c.php" method="post">
	<input type="hidden" name="page_value" value="b">
	<input type="submit" value="ページ移動">
</form>
</div>