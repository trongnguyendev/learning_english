$(document).ready(function(){
	$("body").on("click", ".update-translation", function(){
		let translation = $(this).parents("#element-translation").find("#name-element-translation");
		let sentence = $(this).parents("#element-translation").find("#sentences-translation");
		let translation_edit = $("#translation-edit");
		let sentence_edit = $("#sentence-edit");
		translation_edit.val(translation.html());
		sentence_edit.val(sentence.html());
	});

	$("#btn-update").click(function(){
		let translation_edit = $("#translation-edit");
		let sentence_edit = $("#sentence-edit");

		$("#name-element-translation").html(translation_edit.val());
		$("#sentences-translation").html(sentence_edit.val());

		$('#updateModal').modal('hide')
	})
});
