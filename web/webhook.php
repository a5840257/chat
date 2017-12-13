<?php
	error_reporting(1);
 
	$target = '/var/www/html'; // 生产环境web目录
 
	//$token = '您在coding填写的hook令牌';
 
	//$json = json_decode(file_get_contents('php://input'), true);
 
	/*if (empty($json['token']) || $json['token'] !== $token) {
	    exit('error request');
	}*/
 
	//$repo = $json['repository']['name'];
 
	$cmd="cd $target && git pull origin master";
	
	shell_exec($cmd);
