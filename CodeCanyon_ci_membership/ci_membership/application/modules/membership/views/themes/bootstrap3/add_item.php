<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
if (isset($check)) {
    foreach ($check as $key => $value) {
        echo $key . ': ' . $value . '<br />';
    }
}
?>



<?php if (!empty($category)) { ?>
    <div class="">
        <?php echo form_dropdown('options', $category, '#', 'id="categ_options"'); ?>
    </div>
<?php } else {
    echo "Please fix the eBay error";
} ?>

<div id="value"></div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {

        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

        $("#categ_options").click(function (event) {
            //             alert($('#categ_options').val());
            event.preventDefault();
            var cat_id = $("#categ_options").val();
            var data = {
                category_id: cat_id
            };
            data[csrfName] = csrfHash;

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "membership/add_item/get_sub_category",
                dataType: 'json',
                data: data,

                success: function (result, status) {

                    if (result.csrfName) {
                        //assign the new csrfName/Hash
                        csrfName = result.csrfName;
                        csrfHash = result.csrfHash;
                    }

                    $('div#value').html(result.data.category);
                },

                error: function (result, status, error) {
                    alert(error);
                }


            });
        });
    });

</script>
