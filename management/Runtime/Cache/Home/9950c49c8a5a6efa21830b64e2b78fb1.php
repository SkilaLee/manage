<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="/test/appraise/management/Public/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="/test/appraise/management/Public/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span12">
				<form class="form-horizontal" action="/test/appraise/management/index.php/Home/Manage/doAdd" method="post">
					<div class="control-group">
						<label class="control-label" for="inputEmail">名字:</label>
						<div class="controls">
							<input id="inputEmail" type="text" name="user_name" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">工号:</label>
						<div class="controls">
							<input id="inputEmail" type="text" name="user_num" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">职位：</label>
						<div class="controls">
							<?php echo ($con); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">身份证后六位:</label>
						<div class="controls">
							<input id="inputEmail" type="text" name="user_id_num" />
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button class="btn" type="submit">添加</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>