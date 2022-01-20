<?php
	define('HOMEDIR',__DIR__);

	include 'views/header.php';
	$page   =isset($_GET['page'])?$_GET['page']:'fondas';
	$folder =isset($_GET['folder'])?$_GET['folder']:'fondas';
	
	include 'views/'.$folder.'/'.$page.'.php';
	include 'views/footer.php';
