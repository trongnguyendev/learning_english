let _translation_edit = '';
let _sentence_edit = '';

$(document).ready(function(){
	$("body").on("click", ".update-translation", function(){
		_translation_edit = $(this).parents("#element-translation").children("#name-element-translation").html();
		_sentence_edit = $(this).parents("#element-translation").children("#sentences-translation").html();
		let str_html = `<form class="form-update-translation">
							<input type="text" class="form-control translation_edit" value="`+ _translation_edit +`">
							<textarea name="" class="form-control sentence_edit" id="" cols="30" rows="3">`+ _sentence_edit +`</textarea>
							<div class="btn-action">
								<button id="btn-cancel-update-translation">Cancel</button>
								<button id="btn-update-translation">Update</button>
								</div>
						</form>`;
		$(this).parents(".element-word").append(str_html);
		$(".form-update-translation input").focus();

	});

	$("body").on("click", "#btn-cancel-update-translation", function(e){
		e.preventDefault();
		$(".form-update-translation").hide();
	});

	$("body").on("click", "#btn-update-translation", function(e){
		e.preventDefault();
		let change_translation = $(".form-update-translation .translation_edit");
		let change_sentence = $(".form-update-translation .sentence_edit");

		// cần kiểm tra input change để hide
		$(".form-update-translation").hide();

		$(this).parents(".form-update-translation").prev().find("#name-element-translation").html(change_translation.val());
		$(this).parents(".form-update-translation").prev().find("#sentences-translation").html(change_sentence.val());

	});

});
