$(vindow).scroll(function(){
	let scroll_position = $(window).scrollTop();
	$('.slogan').css({
		'background-postion-x' : + scroll_position + 'px',
	}) 
})