<?php
$page_value = $_POST["page_value"];
$next_page = "";
$btnback = "";
if ($page_value=='a'){
    echo 'ページAから訪問しました';
    $next_page = "09-02a.php";
    $btnback = "Aから来てCを通し、またAに";
}elseif(($page_value=='b')){
    echo 'ページBから訪問しました';
    $next_page = "09-02b.php";
    $btnback = "Bから来てCを通し、またBに";
}
?>
<div>
	<h1>Here is Page C</h1>
</div>
<div>
<form method="post" action="<?php echo $next_page?>">
	<input type="hidden" name="btnback" value="<?php echo $btnback?>">
	<input type="submit" value="Back to Start Place">
</form>
</div>