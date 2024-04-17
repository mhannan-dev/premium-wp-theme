jQuery(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    jQuery(function() {
        jQuery('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "come on, you have a name, don't you?",
                    minlength: "your name must consist of at least 2 characters"
                },
                subject: {
                    required: "come on, you have a subject, don't you?",
                    minlength: "your subject must consist of at least 4 characters"
                },
                number: {
                    required: "come on, you have a number, don't you?",
                    minlength: "your Number must consist of at least 5 characters"
                },
                email: {
                    required: "no email, no message"
                },
                message: {
                    required: "um...yea, you have to write something to send this form.",
                    minlength: "thats all? really?"
                }
            },
            submitHandler: function(form) {
                jQuery(form).ajaxSubmit({
                    type:"POST",
                    data: jQuery(form).serialize(),
                    url:"contact_process.php",
                    success: function() {
                        jQuery('#contactForm :input').attr('disabled', 'disabled');
                        jQuery('#contactForm').fadeTo( "slow", 1, function() {
                            jQuery(this).find(':input').attr('disabled', 'disabled');
                            jQuery(this).find('label').css('cursor','default');
                            jQuery('#success').fadeIn()
                            jQuery('.modal').modal('hide');
		                	jQuery('#success').modal('show');
                        })
                    },
                    error: function() {
                        jQuery('#contactForm').fadeTo( "slow", 1, function() {
                            jQuery('#error').fadeIn()
                            jQuery('.modal').modal('hide');
		                	jQuery('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})