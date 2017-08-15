<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view('themes/' . Settings_model::$db_config['adminpanel_theme'] . '/partials/content_head.php'); ?>

<?php $this->load->view('generic/flash_error');?>

<?php echo form_open('membership/add_item/add', array('class' => 'email', 'id' => 'myform')); ?>

<h3>General Settings</h3>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Title', '');
            $data = array(
                'name'          => 'product_title',
                'id'            => 'product_title',
                'value'         =>  $this->session->flashdata('product_title'),
                'class'         => 'form-control',
                'placeholder'   => '',
                'required'      => 'required'
            );
            echo form_input($data);
            ?>
        </div>

        <div class="form-group" >
            <?php
            echo form_label('Subtitle (optional - additional fees may apply)', '');
            $data = array(
                'name'          => 'product_subtitle',
                'id'            => 'product_subtitle',
                'value'         => $this->session->flashdata('product_subtitle'),
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>

        <div class="form-group" >
            <?php
            echo form_label('Description', '');
            $data = array(
                'name'          => 'description',
                'id'            => 'description',
                'value'         => $this->session->flashdata('description'),
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_textarea($data);
            ?>
        </div>


        <div class="form-group" >
            <?php
            echo form_label('Product Identifier (optional)', '');
            $data_identifier = array(
                'name'          => 'prd_identifier',
                'id'            => 'prd_identifier',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            $data_type = array(
                'id'            => 'prd_identifier_type',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
                'onChange'      => "brandmpn_pair_Check(this);"

            );
            echo form_input($data_identifier);
            echo form_dropdown('prd_identifier_type',$prd_identifier_type, 'UPC', $data_type);
            ?>
        </div>

        <div class="form-group"  id="brandmpn_pair" style="display: none;">
            <?php
            echo form_label('Product Brand', '');
            $data = array(
                'name'          => 'product_brand_mpn',
                'id'            => 'product_brand_mpn',
                'value'         => $this->session->flashdata('product_brand_mpn'),
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>

    </div>
</div>

<h3>Images</h3>
<div class="row">
    <div class="col-md-6"><p>Coming soon..</p></div>
</div>

<h3>Listing Profile</h3>

<h4>General Settings</h4>
<div class="row ">
    <div class="col-md-6">
            <div class="form-group" id="show_sub_categories">
                <?php
                echo form_label('eBay Category', '');
                $data = array(
                    'name'          => 'parent_category',
                    'id'            => 'parent_category',
                    'value'         => '',
                    'class'         => 'form-control parent',
                    'placeholder'   => '',
                );
                echo form_dropdown('options', $category, '#', $data) ?>
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" id="">
            <?php
            echo form_label('Secondary eBay Category', '');
           ?>
        </div>
    </div>
</div>

<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Listing Format', '');
            $data = array(
                'name'          => 'listing_format',
                'id'            => '',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', $listing_type, '#', $data)
            ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Listing Duration', '');
            $data = array(
                'name'          => 'listing_duration',
                'id'            => 'listing_duration',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
    </div>

</div>


<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Giving Works Charity ID', '');
            $data = array(
                'name'          => 'charity',
                'id'            => '',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Giving Works Donation Percentage', '');
            $data = array(
                'name'          => 'charity_percentage',
                'id'            => '',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
</div>

<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Private Listing', '');
            $data = array(
                'name'          => 'private_listing',
                'id'            => 'private_listing',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>

        <div class="form-group" >
            <?php
            echo form_label('Lot Size', '');
            $data = array(
                'name'          => 'lot_size',
                'id'            => 'lot_size',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
</div>


<h4>Item Specifics</h4>
<div class="row temphide">
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Item Condition:', '');
            $data = array(
                'name'          => 'item_condition:',
                'id'            => 'item_condition',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', $condition_values, '#', $data);
            ?>
        </div>

        <div class="form-group" >
            <?php
            echo form_label('Condition Description', '');
            $data = array(
                'name'          => 'condition_description',
                'id'            => 'condition_description',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_textarea($data);
            ?>
        </div>

    </div>


</div>


<h4>Item Location</h4>

<div class="row temphide">
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Country', '');
            $data = array(
                'name'          => 'country',
                'id'            => 'country',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', $country, '#', $data);
             echo count($country);
            ?>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Zip/Postal Code', '');
            $data = array(
                'name'          => 'zip_code',
                'id'            => 'zip_code',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Location (City, State/Province)', '');
            $data = array(
                'name'          => 'location',
                'id'            => 'location',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
</div>

<h4>Best Offer</h4>
<div class="row temphide">
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Best Offer', '');
            $data = array(
                'name'          => 'best_offer',
                'id'            => 'best_offer',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options','', '#', $data);
            ?>
        </div>
    </div>
</div>

<h3>Pricing & SKU/Custom Label</h3>
<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Price', '');
            $data = array(
                'name'          => 'price',
                'id'            => 'price',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Quantity', '');
            $data = array(
                'name'          => 'quantity',
                'id'            => 'quantity',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>


</div>
<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('SKU / Custom Label (optional)', '');
            $data = array(
                'name'          => 'sku',
                'id'            => 'sku',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
</div>

<h3>Return Settings</h3>
<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Item must be returned within:', '');
            $data = array(
                'name'          => 'retur_within',
                'id'            => 'retur_within',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
        <div class="form-group" >
            <?php
            echo form_label('Refund must be given as:', '');
            $data = array(
                'name'          => 'refund',
                'id'            => 'refund',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
        <div class="form-group" >
            <?php
            echo form_label('Return shipping will be paid by:', '');
            $data = array(
                'name'          => 'paid_by',
                'id'            => 'paid_by',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
        <div class="form-group" >
            <?php
            echo form_label('Restocking fee:', '');
            $data = array(
                'name'          => 'restocking',
                'id'            => 'restocking',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
        <div class="form-group" >
            <?php
            echo form_label('Return policy details: (5000 chars max. no HTML)', '');
            $data = array(
                'name'          => 'return_policy_details',
                'id'            => 'return_policy_details',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',

            );
            echo form_textarea($data);
            ?>
        </div>
    </div>
</div>

<h3>Shipping Profile</h3>
<h4>General shipping details</h4>
<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Shipping Type', '');
            $data = array(
                'name'          => 'shipping_type',
                'id'            => 'shipping_type',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', $shipping_type, '#', $data)
            ?>
        </div>
    </div>
</div>
<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('Handling Time', '');
            $data = array(
                'name'          => 'handling_time',
                'id'            => 'handling_time',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('COD Cost', '');
            $data = array(
                'name'          => 'cod',
                'id'            => 'cod',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
    </div>

</div>

<h4>Domestic Shipping details</h4>
<div class="row temphide">
    <div class="col-md-3">
        <div class="form-group" >
            <?php
            echo form_label('Shipping Service', '');
            $data = array(
                'name'          => 'shipping_service',
                'id'            => 'shipping_service',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', $shipping_service, '#', $data);
            echo count($shipping_service);
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" >
            <?php
            echo form_label('Cost', '');
            $data = array(
                'name'          => 'shipping_cost',
                'id'            => 'shipping_cost',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" >
            <?php
            echo form_label('Each Additional', '');
            $data = array(
                'name'          => 'shipping_additional',
                'id'            => 'shipping_additional',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" >
            <?php
            echo form_label('AK/HI/PR Surcharge', '');
            $data = array(
                'name'          => 'shipping_surcharge',
                'id'            => 'shipping_surcharge',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
</div>

<h4>International Shipping details</h4>
<div class="row temphide">
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Shipping Service', '');
            $data = array(
                'name'          => 'intl_shipping_service',
                'id'            => 'intl_shipping_service',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '' , '#', $data)
            ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Cost', '');
            $data = array(
                'name'          => 'intl_shipping_cost',
                'id'            => 'intl_shipping_cost',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Each Additional', '');
            $data = array(
                'name'          => 'intl_shipping_additional',
                'id'            => 'intl_shipping_additional',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
</div>


<h3>Package Details for Calculated Shipping or eBay Managed Returns</h3>
<h4>Dimensions (inches)</h4>
<div class="row temphide">
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Depth', '');
            $data = array(
                'name'          => 'depth',
                'id'            => 'depth',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Length', '');
            $data = array(
                'name'          => 'length',
                'id'            => 'length',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Width', '');
            $data = array(
                'name'          => 'width',
                'id'            => 'width',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
</div>
<h4>Weight</h4>
<div class="row temphide">
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('lbs', '');
            $data = array(
                'name'          => 'lbs ',
                'id'            => 'lbs ',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
     <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('oz', '');
            $data = array(
                'name'          => 'oz',
                'id'            => 'oz',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_input($data);
            ?>
        </div>
    </div>
</div>
<div class="row temphide">
    <div class="col-md-4">
        <div class="form-group" >
            <?php
            echo form_label('Package Type', '');
            $data = array(
                'name'          => 'package_type ',
                'id'            => 'package_type ',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
    </div>
</div>

<h3>Payment Profile</h3>

<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('PayPal Email:', '');
            $data = array(
                'name'          => 'paypal_email:   ',
                'id'            => 'paypal_email ',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
    </div>
</div>

<h4>Accepted Payments:</h4>
<div class="row temphide">
    <div class="col-md-6">
        <div class="form-group" >
            <?php
            echo form_label('PayPal:', '');
            $data = array(
                'name'          => 'paypal',
                'id'            => 'paypal',
                'value'         => 'accept',
                'checked'       => TRUE,
                'style'         => 'margin:10px'
            );

            echo form_checkbox($data)
            ?>
        </div>
        <div class="form-group" >
            <?php
            echo form_label('Taxes:', '');
            $data = array(
                'name'          => 'taxes',
                'id'            => 'taxes ',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',
            );
            echo form_dropdown('options', '', '#', $data)
            ?>
        </div>
        <div class="form-group" >
            <?php
            echo form_label('Payment Instructions', '');
            $data = array(
                'name'          => 'payment_instructions',
                'id'            => 'payment_instructions',
                'value'         => '',
                'class'         => 'form-control',
                'placeholder'   => '',

            );
            echo form_textarea($data);
            ?>
        </div>


    </div>
</div>



<button type="submit" class="btn btn-primary">Add Item</button>



<?php echo form_close() ?>




































<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script type="text/javascript">

    // Ajax post
    $(document).ready(function () { // start of doc ready.

//        https://stackoverflow.com/questions/40509191/ajax-error-403-forbidden-codeigniter
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

        $('.parent').livequery('change', function (event) {

            // alert($('#categ_options').val());
            event.preventDefault(); // stops the jump when an anchor clicked.

            $(this).nextAll('.parent').remove();
            $(this).nextAll('label').remove();

//            $("div#subcat select").remove(); //first of all clear select items
            $('#show_sub_categories').append('<span id="loader">loading</span>');



            var cat_id = $(this).val(); // Select box do have values not text. If input have text, then $(this).text()  // https://stackoverflow.com/questions/23911438/how-to-get-data-from-database-using-ajax-in-codeigniter

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
                    console.log(result);
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
        //The append() method inserts specified content at the end of the selected elements.
        //Tip: To insert content at the beginning of the selected elements, use the prepend() method.

    }

</script>
