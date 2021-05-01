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
	{block name=head}{/block}

</head>
<body>
<div class="app evob">
	{include file="header.tpl"}
	<div class="evob-main">
		<!-- Modal update translation-->
		<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update word</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Translation update</label>
								<input type="text" id="translation-edit" data-translation="" class="form-control" aria-describedby="">
								<small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label>Sentence update</label>
								<input type="text" id="sentence-edit" data-sentence="" class="form-control">
								<small class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" id="btn-update" class="btn btn-primary">Update</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End modal update translation-->
		<div class="container-evob">
			<ul class="navbar-nav mr-auto sidebar-menu">
				<li class="nav-item">
					<a class="nav-link" href="/word"><i class="far fa-lightbulb"></i> Vocabulary</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/word/add"><i class="fas fa-puzzle-piece"></i>Add new</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/word/write"><i class="fas fa-pen-alt"></i>Write repeat</a>
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
