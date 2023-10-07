(function($){
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $("#frmComment").validate({
        submitHandler: function() {
            var formData = {
                post_id : $("#post_id").val(),
                user_id : $("#user_id").val(),
                content : $("#content").val()
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

        $.ajax({
            url: "/delete_post",
            type: 'POST',
            dataType: "json",
            data: {post_id:post_id},
            beforeSend: function( xhr ) {
                alert('are you sure?');
                $("<button>").addClass("animate-spin");
            },
            success: function(res) {
                if( res.success ) location.reload();
                else alert(res.msg);
            }
        });
    });


    $('.act_filter').on('change', function() {
    let status = $(this).val();
       window.location.href = 'http://127.0.0.1:8000/admin/tasks/?status='+status+'';
});

})(jQuery);
