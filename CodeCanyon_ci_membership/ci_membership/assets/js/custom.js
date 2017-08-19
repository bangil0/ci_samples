function brandmpn_pair_check(that) {
    var wrapper = $('#brandmpn_pair_wrapper');
    var input = $('#product_brand_mpn');
    if (that.value == "MPN") {
        //alert("checked!!!");
        $(wrapper).show();
        $(input).val('');
        // document.getElementById("brandmpn_pair").style.display = "block";
    } else {
        //document.getElementById("brandmpn_pair").style.display = "none";
        $(wrapper).hide();
        $(input).val('');
    }
}


function condition_desc_check(that) {

    var wrapper = $('#condition_description_wrapper');
    var val = that.value;
    if (val == "1000") {
        $(wrapper).hide();
    }
    else {
        $(wrapper).show();
    }
}


function finishAjax(id, response) {
    $('#loader').remove();
    $('#' + id).append(unescape(response));
    //The append() method inserts specified content at the end of the selected elements.
    //Tip: To insert content at the beginning of the selected elements, use the prepend() method.
}

function finishAjax_prm_cat(id, response) {
    $('#loader').remove();
    $('#show_categ_path').show();
    $('#' + id).val(unescape(response));
    /**
     * manually trigger a change event for the primary category  so that the change handler will get triggered
     * https://stackoverflow.com/questions/28059029/select-option-generate-value-from-ajax-on-change
     */
    $('#primary_category').change();
}


