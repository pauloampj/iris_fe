$(document).ready(function(){
	$('.btn-redirect').click(function(){
		dmpl.Util.goTo($(this).data('link'));
	});
	
	
	$('.select2').select2();
		
});