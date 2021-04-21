{*extend header & footer in layout.tol*}
{extends file="layout.tpl"}

{*title page*}
{block name=title}Words{/block}

{*file js or css *}
{block name=head}
	<link rel="stylesheet" type="text/css" href="{base_url()}public/css/word.css" />
	<script src="{base_url()}public/js/script-word.js"></script>
	<script src="{base_url()}public/js/validation.js"></script>
{/block}

{*content page*}
{block name=body}
	<div class="word-add" style="margin: auto;">
		<section class="tbl_words">
			<form method="post" action="store_word">
				<div class="row">
					<div class="col-md-7">
						<div class="card">
							<div class="card-header">Word English</div>
							<div class="card-body">
								<div class="form-group">
									<div class="row">
										<label for="word" class="col-md-2">Word</label>
										<div class="col-md-10">
											<div class="input_word_panel">
												<input type="text" class="form-control" autocomplete="off" value="" name="word_family" id="word_english" placeholder="Word">
												<small id="" class="form-text text-muted mess_small_word_english">Vacabulary type</small>
												<input type="hidden" id="word_family" name="family_word" value=''>
												<div class="word_exist_panel">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="word" class="col-md-2">Loại từ</label>
										<div class="col-md-10">
											<div class="types">
												{foreach $types as $type}
													<div class="type">
														<input type="radio" value="{$type.id}" id="type{$type.acronym_type}" name="type" class="type_word">
														<label for="type{$type.acronym_type}">{$type.acronym_type}</label>
													</div>
												{/foreach}
											</div>
											<small id="" class="form-text text-muted mess_small">Vacabulary type</small>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="card">
							<div class="card-header">Translation <i class="fas fa-plus" id="add-translation-input" style="float:right;"></i></div>
							<div class="card-body list-input-translation">
								<div class="translation_type">
									<input type="text" class="translation_vn form-control" id="translation_vn_1" data-type="" data-stt="1" value="" name="translation" placeholder="Translation..">
									<button class="set_type"><i class="fas fa-cog"></i></button>
								</div>
								<small class="form-text text-muted mess_small_translation_vn_1"></small>
								<input type="text" aria-label="Small" id="sentence_1" value="" aria-describedby="inputGroup-sizing-sm"  class=" form-control sentence" name="sentence" placeholder="Sentence..">
								<small class="form-text text-muted mess_small_sentence_1"></small><br>
							</div>

						</div>
					</div>
					<div class="col-md-5 panel panel-default">
						<div class="card">
							<div class="card-header">Source</div>
							<div class="card-body">
								<div class="categories">
									{foreach $sources as $source}
									<input type="radio" name="source" class="source_select" id="radio{$source.id}" value="{$source.id}">
									<label for="radio{$source.id}">{$source.name_source}</label><br>
									{/foreach}
									<small id="" class="form-text text-muted mess_small_source_select">Learn word from what source.</small>
								</div>
								<a href="#" id="add_categories" data-toggle="modal" data-target="#myModal">Add categories</a>
								<div class="modal" id="myModal">
									<div class="modal-dialog">
										<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Modal Heading</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<div class="modal-body">
												Modal body..
											</div>

											<!-- Modal footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="text-right">
							<button type="submit" class="btn btn-primary btn-addword">Add word</button>
						</div>
					</div>
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
{/block}}
