<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-2.0.0.min.js"></script>
	<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-ui"></script>
	<link href="http://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span12">
				<form class="form-horizontal" action="<?php echo (VIEW); ?>/Manage/Login" method="post">
					<div class="control-group">
						<label class="control-label" for="inputEmail">工号:</label>
						<div class="controls">
							<input id="inputEmail" type="text" name="user_id" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">密码</label>
						<div class="controls">
							<input id="inputPassword" type="password" name="user_psw" />
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox"><input type="checkbox" /> 记住我</label> <button class="btn" type="submit">登陆</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>