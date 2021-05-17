{*extend header & footer in layout.tol*}
{extends file="layout.tpl"}

{*title page*}
{block name=title}Write repeat{/block}

{*file js or css *}
{block name=head}
	<link rel="stylesheet" type="text/css" href="{base_url()}public/css/repeat.css" />
	<script src="{base_url()}public/js/repeat-word.js"></script>
{/block}

{*content page*}
{block name=body}
	<div class="words-repeat" style="width: 100%;">
		<div class="toast" role="alert" data-delay="1000" aria-live="assertive" aria-atomic="true" style="position: fixed; bottom: 10px; right: 10px; min-width: 300px;z-index: 10000;">
			<div class="toast-header">
				Thông báo
			</div>
			<div class="toast-body">
				Thêm từ vựng thành công
			</div>
		</div>
		<div class="row">
			<div class="col-md-8" style>
				<div class="words-main">
					<form action="" method="post" class="form-repeat">
						<input type="text" name="" id="ip-repeat" autocomplete="off" placeholder="Input repeat" class="input-repeat"><br>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<section>
						<h1 id="title-words-main">Chicken soup for the soul</h1>
						<div class="words-list">
							<div class="word-item" id="word-" data-name="">
								<span>Temporary</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Night</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Lack</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Kuck</span>
							</div>
						</div>
					</section>
					<section>
						<h1 id="title-words-main">Chicken soup for the soul</h1>
						<div class="words-list">
							<div class="word-item" id="word-" data-name="">
								<span>Temporary</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Night</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Lack</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Kuck</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Night</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Lack</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Kuck</span>
							</div>
						</div>
					</section>
					<section>
						<h1 id="title-words-main">Chicken soup for the soul</h1>
						<div class="words-list">
							<div class="word-item" id="word-" data-name="">
								<span>Temporary</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Night</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Lack</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Kuck</span>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
{/block}}
