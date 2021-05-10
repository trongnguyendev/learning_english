let _translation_edit = '';
let _sentence_edit = '';

$(document).on("click", '.add_source', function(e) {
	e.preventDefault();
	let source = $("#ip_source").val();
	if(source) {
		$.ajax({
			type: 'POST',
			url: 'store_source',
			data: {
				'name_source': source,
			},
			success: function(data) {
				if(data != 'Error add') {

					let str_source  =`<div class="source-item">
											<div class="source">
												<input type="radio" name="source" class="source_select" id="radio`+ data +`" value="`+ data +`">
												<label for="radio`+ data +`">`+ source +`</label><br>
											</div>
											<span class="rm-source">remove</span>
										</div>`;
					$(".load-categories").append(str_source);
					$('.toast').toast('show');
					$(".toast-body").html("Added source <b>"+ source +"</b>");

					$(".mess_small_source").html("");
					$("#ip_source").focus();
					$("#ip_source").val("");
				}
				else {
					$('.toast').toast('show');
					$(".toast-body").html("Error");
				}
			}
		});
	}
	else {
		$(".mess_small_source").html("No input source");
	}
})
$(document).on("click", ".rm-source", function() {
	let id_source = $(this).prev().children(".source_select").val();
	let source= $(this).prev().children("label").html();
	$(this).parents(".source-item").remove();
	$.ajax({
		type: 'POST',
		url: 'delete_source/'+id_source,
		success: function(data) {
			if(data = "Deleted") {
				$('.toast').toast('show');
				$(".toast-body").html("Deleted source <b>"+ source +"</b>");
			}
		}
	});

})

$(document).ready(function(){
	$("body").on("click", ".update-translation", function(){
		_translation_edit = $(this).parents("#element-translation").children("#name-element-translation").html();
		_sentence_edit = $(this).parents("#element-translation").children("#sentences-translation").html();
		$(".form-update-translation").remove();
		let str_html = `<form class="form-update-translation">
							<input type="text" class="form-control translation_edit" value="`+ _translation_edit +`">
							<textarea name="" class="form-control sentence_edit" id="" cols="30" rows="3">`+ _sentence_edit +`</textarea>
							<div class="btn-action">
								<button id="btn-cancel-update-translation">Cancel</button>
								<button id="btn-update-translation">Update</button>
								</div>
						</form>`;
		$(this).parents(".element-word").append(str_html);
		$(".element-word").removeClass("active-update");
		$(this).parents(".element-word").addClass("active-update");
		$(".form-update-translation input").focus();


	});


	$("body").on("click", "#btn-cancel-update-translation", function(e){
		e.preventDefault();
		$(".form-update-translation").hide();
		$(this).parents(".element-word").removeClass("active-update");
	});
	$("body").on("click", "#delete-translation", function(e) {
		e.preventDefault();
		let element_translation = $(this).parents("#element-translation");
		translation_delete = $(this).parents("#element-translation").children("#name-element-translation").attr("attr-translation");
		sentence_delete = $(this).parents("#element-translation").children("#sentences-translation").attr("attr-sentence");
		let id_translation = translation_delete.split("-")[1];
		let translation = translation_delete.split("-")[0];
		let id_sentence = sentence_delete.split("-")[1];
		let sentence = sentence_delete.split("-")[0];

		$.ajax({
			type: 'POST',
			url: 'word/delete_translation_sentence_by_id/' + id_translation + "/" + id_sentence,
			success: function(data) {
				if(data === 'Deleted') {
					element_translation.remove();
					$('.toast').toast('show');
					$(".toast-body").html("Deleted "+ translation +"-"+ sentence +"");
				}
				else {
					$('.toast').toast('show');
					$(".toast-body").html("Error");
				}
			}
		});

	})
	$("body").on("click", "#btn-update-translation", function(e){
		e.preventDefault();
		let change_translation = $(".form-update-translation .translation_edit");
		let change_sentence = $(".form-update-translation .sentence_edit");

		$(this).parents(".element-word").removeClass("active-update");

		// cần kiểm tra input change để hide
		$(".form-update-translation").hide();
		$(this).parents(".form-update-translation").prev().find("#name-element-translation").html(change_translation.val());
		$(this).parents(".form-update-translation").prev().find("#sentences-translation").html(change_sentence.val());
		let translation_data = $(this).parents(".form-update-translation").prev().find("#name-element-translation").attr('attr-translation');
		let sentence_data = $(this).parents(".form-update-translation").prev().find("#sentences-translation").attr('attr-sentence');

		// tách chuỗi lấy id
		let id_translation = (translation_data.split("-"))[1];
		let old_translation = translation_data.split("-")[0];
		let id_sentence = sentence_data.split("-")[1];
		let old_sentence = sentence_data.split("-")[0];
		$.ajax({
			type: 'POST',
			url: 'word/update_translation_sentence_by_id/' + id_translation + "/" + id_sentence,
			data: {
				'content_translation': change_translation.val(),
				'content_sentence': change_sentence.val(),
			},
			success: function(data) {
				console.log(data);
				if(data === 'updated') {
					$('.toast').toast('show');
					$(".toast-body").html("Updated <p><b>"+ old_translation +"</b></p><p><b>"+ old_sentence +"</b></p>");
				}
				else {
					alert("error");
				}
			}
		});
	});
});

$(document).on("click", '#btn-add-source-parent', function(e) {
	e.preventDefault();
	let source = $("#ip-add-source-parent").val();
	if(source) {
		$.ajax({
			type: 'POST',
			url: 'word/store_source',
			data: {
				'name_source': source,
			},
			success: function(data) {
				$(this).prev().html("");
				$(this).prev().focus();
				let str_html = ''
				if(data != 'Error add') {
					str_html = `<section><h1 id="title-words-main">`+ source +`</h1></section>`;
				}
				$(".words-main").append(str_html);
			}
		});
	}
	else {
		$(".mess_small_source").html("No input source");
	}
})
