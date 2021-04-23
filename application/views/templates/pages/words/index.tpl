{*extend header & footer in layout.tol*}
{extends file="layout.tpl"}

{*title page*}
{block name=title}Words{/block}

{*file js or css *}
{block name=head}
	<link rel="stylesheet" type="text/css" href="{base_url()}public/css/word.css" />
	<script src="{base_url()}public/js/script-word.js"></script>
	<script src="{base_url()}public/js/action-word.js"></script>
{/block}

{*content page*}
{block name=body}
	<div class="words-page" style="width: 100%;">

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
		<div class="row">
			<div class="col-md-8" style="height:1000px;">
				<div class="words-main">
					{foreach $sources as $source}
					<section>
						<h1 id="title-words-main">{$source.name_source}</h1>

						<div class="words-list">
							{foreach $words as $word}
							{if ($source.id == $word.source_id)}
							<div class="word-item" id="word-" data-name="{$word.name_family}">
								<span>{$word.name_family}</span>
							</div>
							{/if}
							{/foreach}
						</div>

					</section>
					{/foreach}

				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">

					<div class="detail-words">
					</div>

				</div>
			</div>
		</div>
	</div>
{/block}}
