function brandmpn_pair_check(that) {
    var wrapper = $('#brandmpn_pair_wrapper');
    var target = $('#product_brand_mpn');
    if (that.value == "MPN") {
        //alert("checked!!!");
        $(wrapper).show();
        $(target).val('');
        // document.getElementById("brandmpn_pair").style.display = "block";
    } else {
        //document.getElementById("brandmpn_pair").style.display = "none";
        $(wrapper).hide();
        $(target).val('');
    }
}


function condition_desc_check(that) {

    var wrapper = $('#condition_description_wrapper');
    var target = that.value;
    if (target == "1000" || target == "#") {
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

}

function finishAjax_name_value(id, response) {
    $('#' + id).append(unescape(response));
}