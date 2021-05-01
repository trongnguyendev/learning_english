<nav class="header navbar navbar-expand-lg navbar-light bg-light">
	<div class="header-pc">
		<a class="navbar-brand" href="#">EVob Learning</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>

	<div class="collapse navbar-collapse header-search" id="navbarSupportedContent">
		<div class="row" style="width: 100%;">
			<div class="col-md-8">
				<form class="form-inline my-2 my-lg-0">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				</form>
			</div>
			<div class="col-md-4">
				<div class="header-profile">
					<div class="header-profile-guest">
						<button class="btn ">Login</button>
						<button class="btn ">Register</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>
<script>
	$(document).ready(function() {
		$('li.active').removeClass('active');
		$('a[href="' + location.pathname + '"]').closest('li').addClass('active');
	});
</script>
