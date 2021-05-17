<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{block name=title}Default Page Title{/block}</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{base_url()}public/css/style.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
	{block name=head}{/block}


</head>
<body>
<div class="app evob">
	{include file="header.tpl"}
	<div class="evob-main">
		<div class="container-evob">
			<ul class="navbar-nav mr-auto sidebar-menu">
				<li class="nav-item">
					<a class="nav-link" href="/word"><i class="far fa-lightbulb"></i> Vocabulary</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/word/add"><i class="fas fa-puzzle-piece"></i>Add new</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/word/repeat"><i class="fas fa-pen-alt"></i>Write repeat</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/word/write"><i class="fas fa-chart-pie"></i>Analyst Vocabulary</a>
				</li>
			</ul>
			{block name=body}{/block}
		</div>
	</div>
{*	{include file="footer.tpl"}*}
</div>
</body>
</html>
