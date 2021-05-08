{*extend header & footer in layout.tol*}
{extends file="layout.tpl"}

{*title page*}
{block name=title}Words{/block}

{*file js or css *}
{block name=head}
	<link rel="stylesheet" type="text/css" href="{base_url()}public/css/word.css" />
	<script src="{base_url()}public/js/script-word.js"></script>
	<script src="{base_url()}public/js/action-word.js"></script>
	<script src="{base_url()}public/js/validation.js"></script>
{/block}

{*content page*}
{block name=body}
	<div class="word-add" style="">
		<div class="row">
			<div class="col-md-8">
				<section class="tbl_words">
					<form method="post" class="form-add-word" action="store_word">
						<div class="form-group">
							<div class="input_word_panel">
								<input type="text" class="form-control" autocomplete="off" value="" name="word_family" id="word_english" placeholder="Word">
								<small id="" class="form-text text-muted mess_small_word_english"></small>
								<input type="hidden" id="word_family" name="family_word" value=''>
								<div class="word_exist_panel">
									aaa
									<button class="hide_word_exist_panel"><i class="fas fa-times">aaaa</i></button>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="types">
								{foreach $types as $type}
									<div class="type">
										<input type="radio" value="{$type.id}" id="type{$type.acronym_type}" name="type" class="type_word">
										<label for="type{$type.acronym_type}">{$type.acronym_type}</label>
									</div>
								{/foreach}
							</div>
							<small id="" class="form-text text-muted mess_small"></small>
						</div>
						<div class=" list-input-translation">
							<u id="add-translation-input" class="cursor-element"><i>Add new translation..</i></u>
							<div class="input-translation">
								<div class="translation_type">
									<input type="text" autocomplete="off" class="translation_vn form-control" id="translation_vn_1" data-type="" data-stt="1" value="" name="translation" placeholder="Translation..">
									<button class="set_type"><i class="fas fa-question"></i></button>
								</div>
								<small class="set-type error-text mess_small_type_translation_vn_1"></small>
								<small class="form-text text-muted mess_small_translation_vn_1"></small>
								<textarea class="form-control sentence" name="" id="sentence_1" cols="30" rows="3" placeholder="Sentence about word"></textarea>
								<small class="form-text text-muted mess_small_sentence_1"></small>
							</div>
						</div>

						<div class="categories">
							<div class="load-categories">
								{foreach $sources as $source}
									<div class="source-item">
										<div class="source">
											<input type="radio" name="source" class="source_select" id="radio{$source.id}" value="{$source.id}">
											<label for="radio{$source.id}">{$source.name_source}</label><br>
										</div>
										<span class="rm-source">remove</span>
									</div>
								{/foreach}
							</div>
							<small id="" class="form-text text-muted mess_small_source_select">Learn word from what source.</small>
							<u style="position:relative;" class="cursor-element" id="add_source"><i>Add source</i></u>
							<div class="form-add-source">
								<input type="text" class="form-control" name="" id="ip_source" placeholder="Source">
								<button class="remove-form-add-source"><i class="fas fa-times"></i></button>
								<button class="add_source"><i class="fas fa-plus"></i></button>
								<small id="" class="form-text text-muted mess_small_source error-text"></small>
							</div>
						</div>

						<div class="text-right">
							<button type="submit" class="btn btn-primary btn-addword">Add</button>
						</div>

						<div class="toast" role="alert" data-delay="1000" aria-live="assertive" aria-atomic="true" style="position: fixed; bottom: 10px; right: 10px; min-width: 300px;z-index: 10000;">
							<div class="toast-header">
								Thông báo
							</div>
							<div class="toast-body">
								Thêm từ vựng thành công
							</div>
						</div>

					</form>

				</section>
			</div>
			<div class="col-md-4">
				<div class="sidebar-add-word">
					<h1 class="head-side"><i class="fas fa-history"></i> Added Today</h1>
					<div class="list-added">
					</div>
				</div>
			</div>
		</div>

	</div>
{/block}}
