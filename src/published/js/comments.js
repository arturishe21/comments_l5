if ($('meta[name="csrf-token"]').attr('content')) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
} else {
    alert("absent meta csrf-token");
}

jQuery(function() {
    jQuery("[name=comments_form]").validate({
        rules : {
            name : {
                required : true
            },
            message : {
                required : true
            }
        },
        // Messages for form validation
        messages : {
            name : {
                required : 'Введите свое имя'
            },
            message : {
                required : 'Введите текст комментария'
            }
        },
        // Do not change code below
        errorPlacement : function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            $.post("/add_comment", {data : $("[name=comments_form]").serialize() },
                function (data) {

                    $(".all_comments_show").html(data);
                    $("[name=comments_form] textarea").val("");

                });
        }
    });
});