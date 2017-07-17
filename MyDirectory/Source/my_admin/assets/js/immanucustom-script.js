$(function(){
$('.show-business').on("click", function(){
	var businessdetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#popup-Modal .modal-bodyqwqw').html(loader);
    $('#popup-Modal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'business_information/business_view',
                
				data: {'businessdetails':businessdetails},
				cache: false,
				success: function(result)
				{
					$('#popup-Modal .modal-bodyqwqw').html(result);
					//rating function calling
					rating();
				}
	});
})
});

////user details
$(function(){
$('.show-users').on("click", function(){
	var userdetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#userdetail-popup .modal-body').html(loader);
    $('#userdetail-popup').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'User_details/userdetails_view',
                
				data: {'userdetails':userdetails},
				cache: false,
				success: function(result)
				{
					$('#userdetail-popup .modal-body').html(result);
				}
	});
})
});

////customer  details view popup
$(function(){
$('.show-customer').on("click", function(){
	var customerdetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#popup-customer .modal-body').html(loader);
    $('#popup-customer').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Customer_details/customer_view',
                
				data: {'customerdetails':customerdetails},
				cache: false,
				success: function(result)
				{
					$('#popup-customer .modal-body').html(result);
				}
	});
})
});

//Map Details
$(function() {
$('#pick-map').click(function (e) {
        e.preventDefault();
        $('#myModalmap').modal('show');
    });	
$('#myModalmap').on('shown.bs.modal', function () {
	load_map();
	//google.maps.event.trigger(map, 'resize')
});


$('.select-location').click(function (e) {
	$('#latitude').val($('#pick-lat').val());
	$('#longitude').val($('#pick-lng').val());
	$('#myModalmap').modal('hide');
});



function load_map() {
	
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
						zoom: 7,
						center: new google.maps.LatLng(35.137879, -82.836914),
						mapTypeId: google.maps.MapTypeId.HYBRID
					});
					
	var myMarker = new google.maps.Marker({
		position: new google.maps.LatLng(9.369, 76.803),
		draggable: true
	});
	
    var latitude = document.getElementById('pick-lat');
	var longitude = document.getElementById('pick-lng');
	
	google.maps.event.addListener(myMarker, 'dragend', function (evt) {
		document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
		latitude.value = evt.latLng.lat().toFixed(3);
		longitude.value = evt.latLng.lng().toFixed(3);
	});
	
	google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
		document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
	});
	
	map.setCenter(myMarker.position);
	myMarker.setMap(map);
}
});

// Edit business information

$(function() {
$('#pick-maps').click(function (e) {
        e.preventDefault();
        $('#myModalmaping').modal('show');
    });	
$('#myModalmaping').on('shown.bs.modal', function () {
	load_map();
	//google.maps.event.trigger(map, 'resize')
});


$('.select-location').click(function (e) {
	$('#latitudes').val($('#pick-lats').val());
	$('#longitudes').val($('#pick-lngs').val());
	$('#myModalmaping').modal('hide');
});

function load_map() {
	
	var map = new google.maps.Map(document.getElementById('map_canvasing'), {
						zoom: 7,
						center: new google.maps.LatLng(35.137879, -82.836914),
						mapTypeId: google.maps.MapTypeId.HYBRID
					});
					
	var myMarker = new google.maps.Marker({
		position: new google.maps.LatLng(9.369, 76.803),
		draggable: true
	});
	
    var latitude = document.getElementById('pick-lats');
	var longitude = document.getElementById('pick-lngs');
	
	google.maps.event.addListener(myMarker, 'dragend', function (evt) {
		document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
		latitude.value = evt.latLng.lat().toFixed(3);
		longitude.value = evt.latLng.lng().toFixed(3);
	});
	
	google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
		document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
	});
	
	map.setCenter(myMarker.position);
	myMarker.setMap(map);
}

});

////RATING VALUES GET
function rating() {
	
$('.raty').each(function() {
    var rate = $(this).data("rate");
   $(this).raty({
        readOnly: true,
       score: rate //default stars
   });
    });
}

$(document).ready(function() {
  window.ParsleyValidator
        .addValidator('fileextension', function (value, requirement) {
            var fileExtension = value.split('.').pop();
            
            return fileExtension === requirement;
        }, 32)
        .addMessage('en', 'fileextension', 'The extension doesn\'t match the required');

});


