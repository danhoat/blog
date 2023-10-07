
    $( "#datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function() {
            $(this).change();
            console.log('on change');
        }
    });


(function($){
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });



    $("#frmComment").validate({
        submitHandler: function() {
            var formData = {
                post_id : $("#post_id").val(),
                user_id : $("#user_id").val(),
                body : $("#content").val()
            };

            $.ajax({
                url: "/savecomment",
                type: 'POST',
                dataType: "json",
                data: formData,
                beforeSend: function( xhr ) {
                    $("<button>").addClass("animate-spin");
                },
                success: function(data) { location.reload();}
            });
        }
    });

    $(".btn_del").click(function(){

        let post_id = $(this).attr('post_id');

        const response = confirm("Are you sure ?");

        if ( !response ) {
            return 1;
        }
        $.ajax({
            url: "/delete_post",
            type: 'POST',
            dataType: "json",
            data: {post_id:post_id},
            beforeSend: function( xhr ) {
                $("<button>").addClass("animate-spin");
            },
            success: function(res) {
                if( res.success ) location.reload();
                else alert(res.msg);
            }
        });
    });


    // $('.act_filter').on('change', function() {
    //     let status = $(this).val();
    //     //window.location.href = 'http://127.0.0.1:8000/admin/tasks/?status='+status+'';
    // });

})(jQuery);
