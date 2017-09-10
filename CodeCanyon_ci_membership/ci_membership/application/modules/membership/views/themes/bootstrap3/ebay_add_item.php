<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('themes/' . Settings_model::$db_config['adminpanel_theme'] . '/partials/content_head.php'); ?>

<?php $this->load->view('generic/flash_error'); ?>

<?php echo form_open('membership/ebay_add_item/add', array('class' => 'add_item', 'id' => 'ebay_add_item')); ?>


<h3>General Settings</h3>
<div class="row">
    <div class="col-md-6">
        <div class="form-group"  id="show_sub_categories">
            <?php
            echo form_label('eBay Market', '');
            $data = array(
                'id' => '',
                'value' => '',
                'class' => 'form-control',
                'placeholder' => '',
            );
            echo form_dropdown('ebay_market', $site, 'UPC', $data);
            ?>
        </div>

        <span id="show_categ_path"></span>
        <div class="form-group">
            <?php
            echo form_label('eBay Category', '');
            $data = array(
                'id' => '',
                'value' => '',
                'class' => 'form-control parent',
                'placeholder' => '',
            );
            echo form_dropdown('ebay_category', $parent_category, '#', $data);
            ?>
        </div>

        <div class="form-group">
            <?php
            echo form_label('Title', '');
            $data = array(
                'name' => 'product_title',
                'id' => 'product_title',
                'value' => $this->session->flashdata('product_title'),
                'class' => 'form-control',
                'placeholder' => '',
                'required' => 'required'
            );
            echo form_input($data);
            ?>
        </div>

        <div class="form-group">
            <?php
            echo form_label('Subtitle (optional - additional fees may apply)', '');
            $data = array(
                'name' => 'product_subtitle',
                'id' => 'product_subtitle',
                'value' => $this->session->flashdata('product_subtitle'),
                'class' => 'form-control',
                'placeholder' => '',
            );
            echo form_input($data);
            ?>
        </div>


    </div>
</div>


<?php echo form_close() ?>


<script type="text/javascript">

    // Ajax post
    $(document).ready(function () { // start of doc ready.
//        https://stackoverflow.com/questions/40509191/ajax-error-403-forbidden-codeigniter
        $('#show_categ_path').hide();

        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

        $('.parent').livequery('change', function (event) {

            event.preventDefault(); // stops the jump when an anchor clicked.

            //first of all clear select items
            $(this).nextAll('.parent').fadeOut(); // .fadeOut() for fade effect
            $(this).nextAll('label').remove();
            $('#show_categ_path').empty();

            // Inserting loader
            $('#show_sub_categories').append('<span id="loader"><img src="<?php echo base_url(); ?>/assets/img/loader.gif"> loading...</span>');

            var cat_id = $(this).val(); // Select box do have values not text. If input have text, then $(this).text()  // https://stackoverflow.com/questions/23911438/how-to-get-data-from-database-using-ajax-in-codeigniter
            var data = {category: cat_id};
            data[csrfName] = csrfHash;

            if (cat_id === '#') {
                $(this).nextAll('#loader').remove();
                return false; // return false after clearing sub options if 'please select was chosen'
            }

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "membership/ebay_add_item/ajax_dependencies",
                dataType: 'json', // jQuery will parse the response as JSON
                data: data,
                cache: false,

                success: function (result, status) {
                    if (result.csrfName) {
                        //assign the new csrfName/Hash
                        csrfName = result.csrfName;
                        csrfHash = result.csrfHash;
                    }
                    console.log(result);
                    //alert(result.data.category['category']);
                },

                error: function (result, status, error) {
                    alert(error);
                }
            });
        });

    });

</script>

