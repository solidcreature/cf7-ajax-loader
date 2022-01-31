$=jQuery;

//Creates and inits CF on front-end
function init_cf7_form(form_id) {
	var data = {
		action: 'init_cf7_form',
		form_id: form_id
	};
	
	jQuery.post( ajaxurl, data, function( response ){
		$('.cf7-init__wrapper').append(response);

		//ReInit all contact forms
		//Solution found https://stackoverflow.com/questions/28866152/enabling-ajax-on-contact-form-7-form-after-ajax-load/
    	document.querySelectorAll(".wpcf7 > form").forEach((
                function(e){
                    return wpcf7.init(e)
                }
            )
        );
        
	} );	
	
}
		

//Checks if we have Wrapper element on a page		
$(document).ready(function() {
	
	if ( $('.cf7-init__wrapper').length ) {
		
		let form_id = $('.cf7-init__wrapper').data('id');
		
		let offset = $('.cf7-init__wrapper').data('offset');
		if (!offset) { offset = 300; }
		
		setTimeout(init_cf7_form, offset, form_id);		

	}

});