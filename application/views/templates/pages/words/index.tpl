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

		<div class="row">
			<div class="col-md-8" style>
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
