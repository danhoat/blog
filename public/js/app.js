(function($){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#frmComment").validate({

        submitHandler: function() {
            var formData = {
                post_id : $("#post_id").val(),
                user_id : $("#user_id").val(),
                content : $("#content").val()
            };
            console.log(formData);
            // processing ajax request
            $.ajax({
                url: "/savecomment",
                type: 'POST',
                dataType: "json",
                data: formData,
                beforeSend: function( xhr ) {
                    $("<button>").addClass("animate-spin");
                },
                success: function(data) {
                    // log response into console
                    console.log(data);
                }
            });
        }
    });
})(jQuery);
