<div>
	<?php
	session_start();
	header('Content-type:text/html;charset=utf-8');

	$year         =$_REQUEST['year'];
	$month        =$_REQUEST['month'];
	$day          =$_REQUEST['day'];
 	echo "这是{$year}年{$month}月{$day}日";
	?>

</div>