// Ajax post
$(document).ready(function() {
    $("#categ_options").click(function(event) {
        // alert($('#categ_options').val());
        event.preventDefault();
        var catId = $("#categ_option").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "ajax_post_controller/user_data_submit",
            dataType: 'json',
            data: {name: user_name, pwd: password},
            success: function(res) {
                if (res)
                {
// Show Entered Value
                    jQuery("div#result").show();
                    jQuery("div#value").html(res.username);
                    jQuery("div#value_pwd").html(res.pwd);
                }
            }
        });
    });
});


