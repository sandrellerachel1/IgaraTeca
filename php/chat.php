<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat-Igarateca</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
	<link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript"> $.noConflict();</script>
</head>
<body>
	<aside class="users_online">
		<ul>
		<?php for ($i=1; $i<=8; $i++):?>
			<li id="5">
				<div class="imgSmall"><img src="../img/avatar1.png"/></div>
				<a href="#" id="3:5" class="comecar">João Souza</a>
				<span id="5" class="status on"></span>
			</li>
		<?php endfor; ?>
	</ul>
	</aside>

	<aside class="chats">

	</aside>
		
	<script type="text/javascript" src="../js/functions.js"></script>	
</body>
</html>
		