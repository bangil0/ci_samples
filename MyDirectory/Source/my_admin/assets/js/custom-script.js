$(document).ajaxStart(function() { Pace.restart(); });
$(function() {
	$( "form.validate" ).submit(function( event ) {

	var access = true;
	$(this).find('.required').each(function() {
		var v = $(this).val();

		if(v == null) v='';
		if((v.replace(/\s+/g, '')) == '') {
			//alert('e');
			access = false;
			$(this).parents(".form-group").addClass("has-error");
		}
		else {
			//alert('s');
			$(this).parents(".form-group").removeClass("has-error");
		}
	});
	if(access) {
		return;
	}
	else {
		$("html, body").animate({ scrollTop: $('.has-error').offset().top - 50 }, "slow");
	}
	event.preventDefault();
	
	});
	
	
	
	
});

///////////Side Bar Script////////////
$(function() {
$('ul.sidebar-menu li a').each(function () {
        var browser_location = String(window.location);
        var menu_location = $($(this))[0].href;
        var browser_lastChar = browser_location.slice(-1);
        var menu_lastChar = menu_location.slice(-1);
       if (browser_lastChar == '/') {
         browser_location = browser_location.slice(0, -1);
       }
        if (menu_lastChar == '/') {
         menu_location = menu_location.slice(0, -1);
       }
        if (browser_location == menu_location) {
            $(this).parent().addClass('active').parent().addClass('menu-open').show().parent().addClass('active');
        }
    });
	});
//////ADMIN IMG UPLOADING/////

$('#profile_pic').on("change", function() {
	readURL(this);
});


$('#profileimg').change(function() {
	$('form#profilepic-form').submit();
});