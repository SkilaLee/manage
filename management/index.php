<?php 
	header("content-type:text/html;charset=utf8");

	
	//把目前tp模式由生成模式变为开发模式
	define ("APP_DEBUG",true);
	//引入框架的核心程序
	require "../ThinkPHP/ThinkPHP.php";