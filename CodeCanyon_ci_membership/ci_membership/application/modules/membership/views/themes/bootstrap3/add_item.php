<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
if (isset($check)) {
    echo '<p><b>eBay returned the following error(s):</b></p>';
    foreach ($check as $key => $value) {
        echo $key . ': ' . $value . '<br />';
    }
}
?>


<?php if (!empty($category)) { ?>
    <div class="">
        <?php echo form_dropdown('options', $category, '#', 'id="categ_options"'); ?>
<!--        <select name='type' id='subcategory'></select>-->
        <div id="subcat"></div>
    </div>
<?php } else {
    echo "Please fix the eBay error";
} ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {

//        https://stackoverflow.com/questions/40509191/ajax-error-403-forbidden-codeigniter
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

        $("#categ_options").click(function (event) {
            // alert($('#categ_options').val());
            event.preventDefault();
            var cat_id = $("#categ_options").val();
            var data = {
                category_id: cat_id
            };
            data[csrfName] = csrfHash;

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "membership/add_item/sub_category",
                dataType: 'json',
                data: data,

                success: function (result, status) {
                    if (result.csrfName) {
                        //assign the new csrfName/Hash
                        csrfName = result.csrfName;
                        csrfHash = result.csrfHash;
                    }
                    /*$.each(result.data.category, function(id, value) {
                        $('select#subcategory').append("<option value='" + id + "'>" + value + "</option>");
                    });*/
                    $('div#subcat').html(result.data.category);

                },

                error: function (result, status, error) {
                    alert(error);
                }
            });
        });
    });

</script>
