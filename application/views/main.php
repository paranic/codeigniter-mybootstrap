<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Default Template</title>

	<!-- Bootstrap core CSS -->
	<link href="/assets/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="/assets/main.css" rel="stylesheet">
</head>

<body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project name</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
<?php foreach($menu as $menu_item){?>
					<li <?=($page == $menu_item['name']) ? 'class="active"' : '' ?> >
<?php if(!isset($menu_item['submenu'])){?>
						<a href="<?=$menu_item['link']?>"><?=$menu_item['name']?></a>
<?php }else{?>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$menu_item['name']?><b class="caret"></b></a>
						<ul class="dropdown-menu">
<?php foreach($menu_item['submenu'] as $submenu_menu_item){?>
							<li><a href="<?=$submenu_menu_item['link']?>"><?=$submenu_menu_item['name']?></a></li>
<?php }?>
						</ul>
<?php }?>
					</li>
<?php }?>					
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
	
<?php if(isset($messages)){?>
	<?php foreach ($messages as $message) {?>
		<div class="alert alert-<?=$message['type']?>"><?=$message['text']?></div>
	<?php }?>
<?php }?>
	
<?=$body?>

	</div>
	
	<footer class="footer">
		<div class="container">
			<p class="text-muted">Place sticky footer content here.</p>
		</div>
	</footer>

	<!-- jQuery core JS -->
	<script src="/assets/jquery-2.1.4/jquery.min.js"></script>
	
	<!-- Bootstrap core JS -->
	<script src="/assets/bootstrap-3.3.6/js/bootstrap.min.js"></script>

</body>

</html>