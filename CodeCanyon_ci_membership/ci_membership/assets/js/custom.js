// Ajax post
// $(document).ready(function() {
//     $("#categ_options").click(function(event) {
//         // alert($('#categ_options').val());
//         event.preventDefault();
//         var cat_id = $("#categ_option").val();
//         jQuery.ajax({
//             type: "POST",
//             url: "/membership/add_item/get_sub_category",
//             dataType: 'json',
//             contentType: 'json',
//             data: {category_id: cat_id},
//             success: function(res) {
//                 if (res)
//                 {
//                     jQuery("div#value").html(res.category);
//                 }
//             }
//         });
//     });
// });
//
//
