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



