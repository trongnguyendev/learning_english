let repeat_count = 0;
let str_ip = '';

$(document).ready(function(){
	let width = $(window).width();
	let height = $(window).height() - 65;
	$(".sidebar").height(height - 65);

})

$(document).on("submit", ".form-repeat", function(e) {
	e.preventDefault();

	let valueOld = $("#ip-repeat").val();
	repeat_count++;

	let str_ip =  '<label class="lb_repeat">'+ valueOld +'</label>';

	$("#ip-repeat").val("");
	$(".form-repeat").append(str_ip);

	// chuyển tất cả jquery => js
})

