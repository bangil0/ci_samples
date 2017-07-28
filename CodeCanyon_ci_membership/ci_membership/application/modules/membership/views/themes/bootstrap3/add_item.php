<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view('themes/'. Settings_model::$db_config['adminpanel_theme'] .'/partials/content_head.php'); ?>

<?php
$this->load->view('generic/flash_error');
?>

<h2>Add new item</h2>

<?php echo form_open('membership/add_item/add', array('class' => 'email', 'id' => 'myform'));?>
<div class="row">
    <div class="col-md-6"><?php
        //var_dump($category);

        if (!empty($category)) { ?>

            <div class="form-group"  id="show_sub_categories">
                <label for="exampleInputEmail1">Primary Category</label>
                <?php
                $attributes = array( 'id' => 'parent_category','class' => 'form-control parent');
                echo form_dropdown('options', $category, '#', $attributes); ?>
                <!--        <select name='type' id='subcategory'></select>
                <div id="subcat"></div>
                -->
            </div>
        <?php } else {
            echo "Please fix the eBay error";
        } ?>
    </div>
</div>
<?php echo form_close() ?>



<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {

//        https://stackoverflow.com/questions/40509191/ajax-error-403-forbidden-codeigniter
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

        $('.parent').livequery('change', function (event) {

            $(this).nextAll('.parent').remove();
            $(this).nextAll('label').remove();

//            $("div#subcat select").remove(); //first of all clear select items
            $('#show_sub_categories').append('<span id="loader">loading</span>');

            // alert($('#categ_options').val());
            event.preventDefault();

            var cat_id = $(this).val();

            if (cat_id == '#') {
                return false; // return false after clearing sub options if 'please select was chosen'
            }

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

//                    $('div#subcat').html(result.data.category);

                    setTimeout("finishAjax('show_sub_categories', '" + escape(result.data.category) + "')", 400);

                },

                error: function (result, status, error) {
                    alert(error);
                }
            });
        });
    });

    function finishAjax(id, response) {
        $('#loader').remove();
        $('#' + id).append(unescape(response));
    }

</script>
