$(document).ready(function(){
	$("body").on("click", ".update-translation", function(){
		let translation = $(this).parents("#element-translation").find("#name-element-translation");
		let sentence = $(this).parents("#element-translation").find("#sentences-translation");
		let translation_edit = $("#translation-edit");
		let sentence_edit = $("#sentence-edit");
		translation_edit.val(translation.html());
		sentence_edit.val(sentence.html());
		let id_translation = $(this).parents("#element-translation").attr("data-translation");
		let id_sentence = $(this).parents("#element-translation").attr("data-sentence");
		translation_edit.attr('data-translation', id_translation);
		sentence_edit.attr('data-sentence', id_sentence);


	});

	$("#btn-update").click(function(){

		let translation_edit = $("#translation-edit");
		let sentence_edit = $("#sentence-edit");
		let get_id_translation = translation_edit.attr('data-translation');
		let get_id_sentence = sentence_edit.attr('data-sentence');
		$(".element-translation-"+get_id_translation).html(translation_edit.val());
		$(".element-sentence-"+get_id_sentence).html(sentence_edit.val());

		$('#updateModal').modal('hide')


	})
});
