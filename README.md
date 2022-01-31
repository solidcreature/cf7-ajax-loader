# CF7 AJAX-loader
A WordPress plugin that helps avoid spam messages in Contact Forms 7. Change your original CF7 shortcodes from [contact-form-7 id="1"] to [ajax-contact-form-7 id="1"] and same form will be loaded automtically with AJAX after page load. It will make form invisible for most of the spam-bots.

## How It Works
With a new shortcode a simple html-wrapper appears on a page instead of a form. With data-attribute it saves form's ID. After document ready state, js-script tries to find html-wrapper element on a page. If so, script puts form's html-code inside wrapper element and reinitialized form after that.

## Shortcode
[ajax-contact-form-7] uses 2 parameters. **id** that should match the original CF7 id, and **offset** that determines time delay in milleseconds for form initialisation.  
