const adj_color = 'rgb(22 222 243 / 32%)';
const noun_color = '#ffa50085';
const verb_color = '#ffff0075';
const adv_color = 'rgb(17 239 17 / 33%)';
const conj_color = 'rgb(14 14 243 / 32%)';
const pre_color = '#ee82ee75';
let is_check_family = false;

$(document).ready(function(){
	let width = $(window).width();
	let height = $(window).height() - 65;
	$(".form-add-word").height(height);
	$(".list-added").height(height - 75);
	$(".words-main").height(height);
	$(".sidebar").height(height - 65);

})

$(document).on("click", ".search-family", function() {
	$("#word_family").val($(this).attr("data-family"));
	is_check_family = !is_check_family;
	if(is_check_family) {
		$(this).addClass("active-search-family");
	}
	else {
		$(this).removeClass("active-search-family");
	}
	$(".word_exist_panel").removeClass("show_exist_panel");
	$(".img_loading").remove();
})

$(document).on('keyup', '#word_english', function() {
	let word = $(this).val();
	$.ajax({
		type: 'POST',
		url: 'get_family_word',
		data: {
			'name' : word
		},
		beforeSend: function() {
			$(".input_word_panel").append(`<img class="img_loading" src="http://blogs-ver1.herokuapp.com/images/loading-buffering.gif" alt="">`);
		},
		success: function(data) {
			console.log(data);
			if(data != '') {
				let finded = JSON.parse(data);
				let str_family = '<p>Search result</p>';
				$(".word_exist_panel").addClass("show_exist_panel");
				$(".word_exist_panel").html(" ");
				finded.forEach(function(item, index) {
					 str_family += `<div class="search-family" data-family="`+ item.word +`">
									<label for="is_family_search-`+item.word+`">`+ item.word +` (`+ item.acronym_type +`)</label>
									<span style="user-select: auto;font-size: 13px;color: #00000094;"> - Is word-family of <u>`+ word +`</u> ?</span>
									</div>`;
				})
				$(".word_exist_panel").append(str_family)
			}
			else {
				$(".word_exist_panel").removeClass("show_exist_panel");
				$(".img_loading").remove();
			}
			set_value_family_word(word);

		}
	})
})

function set_value_family_word($family) {
	let family = $("#word_family");
	if(!is_check_family) {
		family.val($family);
	}
}
$(document).ready(function(){
	$("#typeadj").parent(".type").css("background",adj_color);
	$("#typenoun").parent(".type").css("background",noun_color);
	$("#typeverb").parent(".type").css("background",verb_color);
	$("#typeadv").parent(".type").css("background",adv_color);
	$("#typeconj").parent(".type").css("background",conj_color);
	$("#typepre").parent(".type").css("background",pre_color);

	load_word_added_today();

})
function load_word_added_today() {
	$.ajax({
		type: 'GET',
		url: 'get_word_added_today',
		success: function(data) {
			let word_added = JSON.parse(data);
			console.log(word_added);
			let str_added = '';
			word_added.forEach(function(item, index) {
				str_added += `<div class="word-added">
								<h2>`+ item.word+` <span> - `+ item.acronym_type +`</span><i>`+ moment(item.created_at).fromNow() +`</i></h2>
								<p>`+ item.translation +`</p>
							  </div>`;
			});
			$(".list-added").append(str_added);
		}
	})
}

$(document).on('submit', ".form-add-word",function(e) {
	e.preventDefault();
})
$(document).on('click', ".btn-addword", function(e){
	e.preventDefault();
	// word value
	let word;
	let check_word_english;
	let check_source;
	let check_translation;
	let check_translation_item = false;
	let check_sentence_item = false;
	let check_type
	let family_word;
	let arr_translation = [];
	let arr_sentence = [];
	let arr_type = [];
	let length_translation;
	let element_translation;
	let element_sentence;
	let item_translation;
	let text_element;
	let source_select;
	let source_selected;
	let source;
	family_word = $("#word_family").val();
	/* validation input WORD */
	check_word_english = validation($("#word_english"), 'word_english', 'Please input word english', '');

	if(check_word_english) {
		word = $("#word_english").val();
	}

	/* loop translation input to add translation, type, sentence */
	// length_translation = $(".translation_vn").length;
	length_translation = $(".translation_vn");
	for(let i = 1; i <= parseInt(length_translation.length); i++) {
		element_translation = $("#translation_vn_"+i);
		element_sentence = $("#sentence_"+i);

		arr_translation.push(element_translation.val());

		if(element_translation.attr('data-type') != '') {
			arr_type.push(element_translation.attr('data-type'));
		}
		if(element_sentence.val() != '') {
			arr_sentence.push(element_sentence.val());
		}

		element_sentence = $("#sentence_"+i);
		text_element = 'sentence_'+i;
		check_sentence_item = validation(element_sentence,text_element, 'Please input sentence', '' );

		item_translation = $("#translation_vn_"+i);
		text_element = 'translation_vn_'+i;
		check_translation_item = validation(item_translation, text_element, 'Please input translation', '');

	}
	// check source has checked
	source_select = $(".source_select");
	source_selected = $('.source_select:checked').val();
	check_source = false;
	if(!source_select.is(":checked")) {
		$(".mess_small_source_select").addClass("error-text");
		$(".mess_small_source_select").html("Please select source");
	}
	else {
		if(arr_type.length > 0) {
			source = source_selected;
			check_source = true;
		}
	}
	if(check_word_english && check_source && check_translation_item && arr_type.length > 0 && arr_sentence.length > 0 && check_sentence_item) {
		$.ajax({
			type: 'POST',
			url: 'store_word',
			data: {
				'word': word,
				'word_family': family_word,
				'source': source,
				'type': arr_type,
				'translation': arr_translation,
				'sentence': arr_sentence,

			},
			success: function(data) {
				if(data == 'success') {
					$('.toast').toast('show');
					$('input[type="text"]').val("");
					$("#word_english").focus();
					var str_added = '';
					let arr_type_name = arr_type.map((type, index, arr_type)=> {
						if(type == '7') return 'adj';
						if(type == '8') return 'noun';
						if(type == '9') return 'verb';
						if(type == '10') return 'adv';
						if(type == '11') return 'conj';
						if(type == '12') return 'pre';
					})
					$.each(arr_type_name, function(index, value){
						str_added += `<div class="word-added added-justnow">
										<h2>`+ word +` <span> - `+ value +`</span><i>Just now</i></h2>
									  </div>`;
					})
					$(".list-added").prepend(str_added);
				}
				else {
					$('.toast').toast('show');
					$(".toast-body").html("Đã xảy ra lỗi");
				}
			}
		})
	}
})

$(document).on('click', ".word-item", function() {
	$(".word-item").removeClass("active-word-item")
	$(this).addClass("active-word-item");
	let name = $(this).attr('data-name');
	let str_html = '';
	$.ajax({
		type: 'GET',
		url: 'word/find/'+ name,
		success: function(data) {
			let lists = JSON.parse(data);
			console.log(lists);
			lists[0].forEach(function(type){
				let bg;

				(type.acronym_type == 'adj') ? bg = adj_color : '' ;
				(type.acronym_type == 'noun') ? bg = noun_color : '' ;
				(type.acronym_type == 'verb') ? bg = verb_color : '' ;
				(type.acronym_type == 'adv') ? bg = adv_color : '' ;
				(type.acronym_type == 'conj') ? bg = conj_color : '' ;
				(type.acronym_type == 'pre') ? bg = pre_color : '' ;

				str_html +=  `<p class="word_type" style="background:`+ bg +`">`+ type.word +`<i> ( ` + type.acronym_type + ` )</i></p>`;
				lists[1].forEach(function(word, index){
					if(type.id == word.id && type.acronym_type == word.acronym_type) {
						$(".detail-words").html("");
						str_html += `
						<div class="element-word">
							<div class="translation_of_word">
								<div id="element-translation">
									<span id="stt-element">`+ (index + 1) +`</span>
									<h2 id="name-element-translation" attr-translation="`+ word.translation +`-`+ word.translation_id +`" >`+ word.translation +`</h2>
									<p id="sentences-translation" attr-sentence="`+ word.sentence +`-`+ word.sentence_id +`">`+ word.sentence +`</p>
									<div class="dropdown-translation">
										<a class="nav-link dropdown-toggle" href="#" id="dropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
										<div class="dropdown-menu" aria-labelledby="dropdown-1">
											<a href="#" class="dropdown-item update-translation" id="" data-toggle="modal" data-target="#updateModal" href="#">Update</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" id="delete-translation" href="#">Delete</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						`;
					}
				})
			});
			$(".detail-words").html(str_html);
		}
	})
})
function get_type(data) {
	let type_str = '';
	switch(data) {
		case '1':
			type_str = 'Adj';
			break;
		case '2':
			type_str = 'Noun';
			break;
		case '3':
			type_str = 'Verb';
			break;
		case '4':
			type_str = 'Adj';
			break;
	}
	return type_str;
}
$(document).on("click", "#add-translation-input", function() {
	let trans = $(".translation_vn").length;
	trans = parseInt(trans)+1;
	$strInput = `<div class="input-translation">
				<div class="translation_type">
				<input type="text" autocomplete="off" class="translation_vn form-control" id="translation_vn_`+ trans +`" data-type="" data-stt="1" value="" name="translation" placeholder="Translation..">
				<button class="set_type"><i class="fas fa-question"></i></button>
				<button class="remove_input_translation"><i class="far fa-trash-alt"></i></button>
				</div>
				<small class="set-type error-text"></small>
				<small class="form-text text-muted mess_small_translation_vn_`+ trans +`"></small>
				<textarea type="text" aria-label="Small" id="sentence_`+ trans +`" value="" aria-describedby="inputGroup-sizing-sm"  class=" form-control sentence" name="sentence" cols="30" rows="3" placeholder="Sentence about word"></textarea>
				<small class="form-text text-muted mess_small_sentence_`+ trans +`"></small>
				</div>`;
	$(".list-input-translation").append($strInput);
	$("#translation_vn_" + trans).focus();

})
$(document).on('click', '#add_source', function() {
	$(".form-add-source").show();
	$(".form-add-source input").focus();
})
$(document).on('click', '.remove-form-add-source', function(e){
	e.preventDefault();
	$(".form-add-source").hide();
})
$(document).on('click','.remove_input_translation', function(e){
	e.preventDefault();
	$(this).parents(".input-translation").hide();
})
$(document).on('click', '.set_type', function(e) {
	e.preventDefault();

	let type = $(".type_word:checked");
	let input_translation = $(this).prev(".translation_vn");

	if(type.val()) {
		input_translation.attr('data-type', type.val());
		$(this).html(`<i class="fas fa-check"></i>`);
	}
	else {
		$(".mess-small-set-type-1").html("Not value type word");
		$(this).parent().next().html("Not value type word");
	}

	if(type.attr('id') === 'typeadj') {
		input_translation.css('background-color', adj_color);
	}else if(type.attr('id') === 'typenoun') {
		input_translation.css('background-color', noun_color);
	}else if(type.attr('id') === 'typeverb') {
		input_translation.css('background-color', verb_color);
	}else if(type.attr('id') === 'typeadv') {
		input_translation.css('background-color', adv_color);
	}else if(type.attr('id') === 'typeconj') {
		input_translation.css('background-color', conj_color);
	}else if(type.attr('id') === 'typepre') {
		input_translation.css('background-color', pre_color);
	}

})
