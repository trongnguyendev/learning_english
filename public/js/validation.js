function validation(element, element_text ,text, check) {
	if(element.val() === check) {
		element.addClass('error-input');
		$(".mess_small_"+element_text).addClass("error-text");
		$(".mess_small_"+element_text).html(text);
		return false;
	}
	return true;
}
