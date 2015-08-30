<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="UTF-8">
<link href="<?php echo (CSS_URL); ?>/bootstrap-combined.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>/style.css">
<title>权限管理系统</title>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<p><a href="outlogin"><button id="btn" class="btn btn-success" type="button">退出登录</button></a>
			<button id="btn1" class="btn btn-success" type="button"><?php echo ($name); ?>,欢迎你</button>
			</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span2">
			<h3>你好,<?php echo ($role); ?></h3>
			<a href="add">
				<button class="btn btn-small btn-primary" type="button">添加员工</button>
			</a>
		</div>
		<div class="span6">
			<table class="table">
				<thead>
					<tr>
						<th>
							工号
						</th>
						<th>
							姓名
						</th>
						<th>
							角色
						</th>
						<th>
							操作
						</th>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($people1)): $i = 0; $__LIST__ = $people1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp1): $mod = ($i % 2 );++$i;?><tr class="info">
							<td>
								<?php echo ($pp1["user_num"]); ?>
							</td>
							<td>
								<?php echo ($pp1["user_name"]); ?>
							</td>
							<td>
								<?php echo ($pp1["role_name"]); ?>
							</td>
							<td>
								<a href="down?id=<?php echo ($pp1["user_num"]); ?>">
									<button class="btn btn-small btn-primary" type="button">降</button>
								</a>
								<a href="out?id=<?php echo ($pp1["user_num"]); ?>">
									<button class="btn btn-small btn-primary" type="button">辞</button>
								</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($people)): $i = 0; $__LIST__ = $people;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): $mod = ($i % 2 );++$i;?><tr class="info">
							<td>
								<?php echo ($pp["user_num"]); ?>
							</td>
							<td>
								<?php echo ($pp["user_name"]); ?>
							</td>
							<td>
								<?php echo ($pp["role_name"]); ?>
							</td>
							<td>
								<a href="up?id=<?php echo ($pp["user_num"]); ?>">
									<button class="btn btn-small btn-primary" type="button">升</button>
								</a>
								<a href="down?id=<?php echo ($pp["user_num"]); ?>">
									<button class="btn btn-small btn-primary" type="button">降</button>
								</a>
								<a href="out?id=<?php echo ($pp["user_num"]); ?>">
									<button class="btn btn-small btn-primary" type="button">辞</button>
								</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					 <?php if(is_array($people2)): $i = 0; $__LIST__ = $people2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp2): $mod = ($i % 2 );++$i;?><tr class="info">
							<td>
								<?php echo ($pp2["user_num"]); ?>
							</td>
							<td>
								<?php echo ($pp2["user_name"]); ?>
							</td>
							<td>
								<?php echo ($pp2["role_name"]); ?>
							</td>
							<td>
								<a href="up?id=<?php echo ($pp2["user_num"]); ?>">
									<button class="btn btn-small btn-primary" type="button">升</button>
								</a>
								<a href="out?id=<?php echo ($pp2["user_num"]); ?>">
									<button class="btn btn-small btn-primary" type="button">辞</button>
								</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table> 
		</div>
		<div class="span4">
		</div>
	</div>
</div>
</body>
</html>