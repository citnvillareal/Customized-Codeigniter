(function($){
    $.validator.setDefaults({
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').addClass('has-success');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
      
      
      
    $("#sign_up").validate({
        rules : {
            first_name : {
                required : true
            },
            last_name : {
                required : true
            },
            uname : {
                required : true,
                minlength: 6,
                remote : baseUrl + 'account/ajax_is_unique_username'
            },
            pword : {
                required : true,
                minlength: 6
            }
        },
        messages : {
            uname : {
                remote : $.format("{0} is already in use")
            }
        }
    });    
})(jQuery);