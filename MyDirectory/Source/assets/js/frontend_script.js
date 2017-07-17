
var city = "";

//check password in signup
$(document).ready(function () {
        $("#reg").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });




$('.sh').click(function(){
  if($('.results li').hasClass('clctn'))
  {
    $('.results_crnt').hide();
  }
  else
  {
     $('.results_crnt').show();
  }
   

});

//current location
$("#check li").click(function(){
      
            //alert("hai");
var options = {
enableHighAccuracy: true,
timeout: 1000,
maximumAge: 0
};

if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);

}
else {
$('.styled-select').html(city);
setcity(city);
}
            
     
});

// Find current city when site loaded
var current_city = localStorage.currentCity;
if(current_city == undefined || current_city == "") {

$('.styled-select').html(city);
var options = {
enableHighAccuracy: true,
timeout: 1000,
maximumAge: 0
};

if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);

}
else {
  $('.styled-select').html(city);
  setcity(city);
}

}
else {
    setcity(current_city);
    $('.styled-select').html(current_city);
}  
//});

function successCallback(position){

var x = position.coords.latitude;
var y = position.coords.longitude;
displayLocation(x,y);

//location.reload();
}

function errorCallback(error){
var errorMessage = 'Unknown error';
switch(error.code) {
  case 1:
    errorMessage = 'Permission denied';
    break;
  case 2:
    errorMessage = 'Position unavailable';
    break;
  case 3:
    errorMessage = 'Timeout';
    break;
}
console.log(errorMessage);
} 

/*-------------------------------
------- Set current city --------
---------------------------------*/
function setcity(city) {

    $('.loader1').show();  
    $.ajax({
            type: "POST",
            url: base_url+"Login/settings",
            data: {city:city},
            success: function(response) {
                $('.loader1').hide(); 

                localStorage.currentCity = response;
                $('.styled-select').val(response);
               
                $('.results_crnt').hide();

            }
    });
}

function displayLocation(latitude,longitude){


var request = new XMLHttpRequest();

var method = 'GET';
var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&key=AIzaSyBAmX1KaY0ljSpxGgzCqvqJJ0uXNae9BwM';
var async = true;

request.open(method, url, async);
request.onreadystatechange = function(){
  if(request.readyState == 4 && request.status == 200){
    var data = JSON.parse(request.responseText);
    var address = data.results[0];
    var add = address.formatted_address;
    var value=add.split(",");
    var count=value.length;
    city=value[count-3];
    //$('.styled-select').html(city+" ");
  

    setcity(city);
    //location.reload();

  }
};
request.send();

}    
    
//autocomplete for city search

    $("#country").keyup(function () {

        $('.results_crnt').hide();

        var keyword = $("#country").val();
        $.ajax({
            type: "POST",
            url: base_url+'Search/city_search',
            data: {
                 keyword: keyword
            },
            dataType: "json",
            success: function (data) {
           

                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#country').attr("data-toggle", "dropdown");
                   // $('#DropdownCountry').dropdown('toggle');
                }
               /* else if (data.length == 0) {
                    $('#country').attr("data-toggle", "");
                }*/
                 else if (data.length == 0 || data == "0") {
                    $('#DropdownCountry').empty();
                    $('#country').attr("data-toggle", "");
                    if((keyword.replace(/\s+/g, '')) != '') {
                    $('#DropdownCountry').html('<div role="presentation" > No results</div>');
                    $('.search .dropdown-menu').show();
                    }
                    //$('#DropdownCity').dropdown('toggle');
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                    $('.results_crnt').hide();

                        $('#DropdownCountry').append('<li class="clctn" role="presentation" ><a>' + value['city'] + '</a></li>');
                        
                        $('.search .dropdown-menu').show();//xtra
                });

                search();
            }
        });
    });
    

//autocomplete for business search

    $("#business").keyup(function () {

            var keyword = $("#business").val()
        $.ajax({
            type: "POST",
             focus: function (event, ui) {
            event.preventDefault();
            jQuery(this).val(ui.item.suggestion);
        },
            url: base_url+'Search/business_search',

            data: {
                business_keyword: keyword
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownBusiness').empty();
                    $('#business').attr("data-toggle", "dropdown");
                    $('#DropdownBusiness').dropdown('toggle');
                }
               /* else if (data.length == 0) {
                    $('#business').attr("data-toggle", "");
                }*/
                 else if (data.length == 0 || data == "0") {
                    $('#DropdownBusiness').empty();
                    $('#business').attr("data-toggle", "");
                    if((keyword.replace(/\s+/g, '')) != '') {
                    $('#DropdownBusiness').html('<div role="presentation" > No results</div>');
                    $('.search_business .dropdown-menu').show();
                    }
                    //$('#DropdownCity').dropdown('toggle');
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                       /* var a='';
                        if(value['business_category_name']!='')
                        {
                            a+='<li role="presentation"><a>'+ value['business_category_name']+'</a></li>';
                        }
                        if(value['business_name']!='')
                        {
                            a+='<li role="presentation"><a>'+ value['business_name']+'</a></li>';
                        }*/
                        $('#DropdownBusiness').append('<li role="presentation"><a>'+ value['business_category_name']+'</a></li>');
                       $('.search_business .dropdown-menu').show();//xtra
                });
            }
        });
    });
    $('ul.txtbusiness').on('click', 'li a', function () {
        $('#business').val($(this).text());

        $('#business').attr("data-toggle", "");//xtra
        
        $('#DropdownBusiness').empty();//xtra
        $('#DropdownBusiness').dropdown('toggle');//xtra
        $('.search_business .dropdown-menu').hide();//xtra
      
    });

//autocomplete city search for business page

    $("#bcountry").keyup(function () {

        var keyword = $("#bcountry").val();
        $.ajax({
            type: "POST",
            url: base_url+'Search/city_search',
            data: {
                 keyword: keyword
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownbCountry').empty();
                    $('#bcountry').attr("data-toggle", "dropdown");
                   // $('#DropdownCountry').dropdown('toggle');
                }
               /* else if (data.length == 0) {
                    $('#country').attr("data-toggle", "");
                }*/
                 else if (data.length == 0 || data == "0") {
                    $('#DropdownbCountry').empty();
                    $('#bcountry').attr("data-toggle", "");
                    if((keyword.replace(/\s+/g, '')) != '') {
                    $('#DropdownbCountry').html('<div role="presentation" > No results</div>');
                    $('.bsearch .dropdown-menu').show();
                    }
                    //$('#DropdownCity').dropdown('toggle');
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownbCountry').append('<li role="presentation" ><a>' + value['city'] + '</a></li>');
                        $('.bsearch .dropdown-menu').show();//xtra
                });
                bsearch();
            }
        });
    });
    

//autocomplete  business search for business page

    $("#bbusiness").keyup(function () {

            var keyword = $("#bbusiness").val()
        $.ajax({
            type: "POST",
            url: base_url+'Search/business_search',
            data: {
                business_keyword: keyword
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownbBusiness').empty();
                    $('#bbusiness').attr("data-toggle", "dropdown");
                    $('#DropdownbBusiness').dropdown('toggle');
                }
               /* else if (data.length == 0) {
                    $('#business').attr("data-toggle", "");
                }*/
                 else if (data.length == 0 || data == "0") {
                    $('#DropdownbBusiness').empty();
                    $('#bbusiness').attr("data-toggle", "");
                    if((keyword.replace(/\s+/g, '')) != '') {
                    $('#DropdownbBusiness').html('<div role="presentation" > No results</div>');
                    $('.bsearch_business .dropdown-menu').show();
                    }
                    //$('#DropdownCity').dropdown('toggle');
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                       /*  var a='';
                        if(value['business_category_name']!='')
                        {
                            a+='<li role="presentation"><a>'+ value['business_category_name']+'</a></li>';
                        }
                        if(value['business_name']!='')
                        {
                            a+='<li role="presentation"><a>'+ value['business_name']+'</a></li>';
                        }*/
                        $('#DropdownbBusiness').append('<li role="presentation"><a>'+ value['business_category_name']+'</a></li>');
                       $('.bsearch_business .dropdown-menu').show();//xtra
                });
            }
        });
    });
    $('ul.txtbbusiness').on('click', 'li a', function () {
        $('#bbusiness').val($(this).text());

        $('#bbusiness').attr("data-toggle", "");//xtra
        
        $('#DropdownbBusiness').empty();//xtra
        $('#DropdownbBusiness').dropdown('toggle');//xtra
        $('.bsearch_business .dropdown-menu').hide();//xtra
      
    });



});
function bsearch() {
$('ul.txtbcountry li').on('click', function () {
     $('#bcountry').val($(this).text());

        $('#bcountry').attr("data-toggle", "");//xtra
        
        $('#DropdownbCountry').empty();//xtra
        $('#DropdownbCountry').dropdown('toggle');//xtra
        $('.bsearch .dropdown-menu').hide();//xtra
   
        
         });

}


function search() {
$('ul.txtcountry li').on('click', function () {
     $('#country').val($(this).text());

        $('#country').attr("data-toggle", "");//xtra
        
        $('#DropdownCountry').empty();//xtra
        $('#DropdownCountry').dropdown('toggle');//xtra
        $('.search .dropdown-menu').hide();//xtra
   
     save_homecity($(this).text());
    });

}
//Save Home City

function save_homecity(city) {

    $('.loader1').show(); 
    $.ajax({
            type: "POST",
            url: base_url+"Login/settings",
            data: {city:city},
            success: function(response) {

                $('.loader1').hide(); 

                localStorage.currentCity = response;
                $('.styled-select').html(response);
                //location.reload();
                window.location.href = window.location.href;
            },
            error: function(e) {
            }
        });
}

//rating for all results

$.each( $('.ratings'), function() {
   var id =$(this).attr('data-id');
   var title =$(this).attr('data-title');
                                                                                                                                                                                            
     $("#"+title).raty(
    {
     
    start: id,  // Start with a score value.
    starOff:base_url+'assets/images/star-off.png',                                  
    starOn: base_url+'assets/images/star-on.png', 
    readOnly:  true,

   });

    
});
$(document).ready(function() {
     
// map();
       
});
  var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: -34.397, lng: 150.644},
           zoom:15,
           mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        ViewCustInGoogleMap(data);
        
      }

 
function ViewCustInGoogleMap(data,merge_json) {


     merge_json = merge_json || false;
    
      if(merge_json) {
        new_data = JSON.parse(data);
        $.merge(people,new_data);
      }
      else {
            people = JSON.parse(data); 
      }


            for (var i = 0; i < people.length; i++) {
                setMarker(people[i]);
               
            }
            /*zoom map pointer*/
            var LatLngList = [];
            
                if(people.length>1)
                {
                    for(var i=0;i< people.length; i++)
                    {
                  
                      var myarr = people[i].LatitudeLongitude.split(",");
                      LatLngList.push(new google.maps.LatLng(myarr[0],myarr[1]));
                    }

                    latlngbounds = new google.maps.LatLngBounds();

                    LatLngList.forEach(function(latLng){
                        latlngbounds.extend(latLng);
                    });

                   map.setCenter(latlngbounds.getCenter());
                   map.fitBounds(latlngbounds); 


                }else{
                    var myarr = people[0].LatitudeLongitude.split(",");
                     latlng = new google.maps.LatLng(myarr[0],myarr[1]);
                    map.setCenter(latlng);

                }
                    
              /*end zoom map pointer*/
          



        }

      function setMarker(people) {
        
      
            geocoder = new google.maps.Geocoder();
            infowindow = new google.maps.InfoWindow();
            if ((people["LatitudeLongitude"] == null) || (people["LatitudeLongitude"] == 'null') || (people["LatitudeLongitude"] == '')) {
                geocoder.geocode({ 'address': people["Location"] }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                    //  alert(latlng);
                        marker = new google.maps.Marker({
                            position: latlng,
                            map: map,
                            icon: base_url + 'assets/images/pointer.png',//icon image set
                            
                            draggable: false,
                           html: "<b>"+people["DisplayText"]+"</b><div>"+people["Address"]+"</div><div>"+people["Location"]+"</div><div><a href="+ people["Website"]+">Website</a></div>"
                        });
                       
                        //marker.setPosition(latlng);
                      //  map.setCenter(latlng);
                        google.maps.event.addListener(marker, 'click', function(event) {
                            infowindow.setContent(this.html);
                            infowindow.setPosition(event.latLng);
                            infowindow.open(map, this);
                        });
                    }
                    else {
                        alert(people["DisplayText"] + " -- " + people["Location"] + ". This address couldn't be found");
                    }
                });
            }
            else {
                var latlngStr = people["LatitudeLongitude"].split(",");
                var lat = parseFloat(latlngStr[0]);
                var lng = parseFloat(latlngStr[1]);
                latlng = new google.maps.LatLng(lat, lng);
                marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: base_url + 'assets/images/pointer.png',
                    
                    draggable: false,               // cant drag it
                    html: "<b>"+people["DisplayText"]+"</b><div>"+people["Address"]+"</div><div>"+people["Location"]+"</div><div><a href="+ people["Website"]+">Website</a></div>"  // Content display on marker click
                    //icon: "images/marker.png"       // Give ur own image
                });


                //marker.setPosition(latlng);
                //map.setCenter(latlng);
                google.maps.event.addListener(marker, 'click', function(event) {
                    infowindow.setContent(this.html);
                    infowindow.setPosition(event.latLng);
                    infowindow.open(map, this);
                });
            }
        }  

//rating for business detail

$.each( $('.b_rating'), function() {
   var id =$(this).attr('data-id');
   var title =$(this).attr('data-title');
    var read =$(this).attr('data-read');
                                                                                                                                                                                          
     $("#"+title).raty(
    {
     
    start: id,  // Start with a score value.
    starOff:base_url+'assets/images/star-off.png',                                  
    starOn: base_url+'assets/images/star-on.png', 
    readOnly:read,

   });

    
});

//image upload in business details


$('.img_preview').on("change", function() {
    show_uploaded_image(this);

});

function show_uploaded_image(input) {



           if (input.files && input.files[0]) {
               var reader = new FileReader();
                 

               reader.onload = function (e) {
                   // Image Classname
                    $('.preview_uploaded_image')
                       .attr('src', e.target.result);
                     // Div Classname    
                    $('.preview_div').hide();
                    $('.upldbtn').show();
                    $('.desc').hide();
                    $('.shimg').show();
                    $('#fakeBrowse').hide();
                    
               };

               reader.readAsDataURL(input.files[0]);
           }
       }


function HandleBusBrowseClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
}

function HandleBuschange()
{
    var fileinput = document.getElementById("browse");
    
   // textinput.value = fileinput.value;
}

 
 //login  popup 
$('.lgnbadge').click(function() {
       
   $('#myModal').modal('show');
    
 });
    
$('.yp-badges').click(function() {
  
  var business_id=$('.favrt').val();  
  var catId=$('.cat').val(); 
   
   $.ajax({
        url:base_url+'SearchResult/favourite',
        type:'get',
        data:{business_id:business_id,category:catId},
        success:function(res){
        console.log(res);
           if(res==1)
           {
           $('.yp-badge1').show();
           $('.yp-badge').hide();
           location.reload();
           }
         else{
           $('.yp-badge').show();
           $('.yp-badge1').hide();
           location.reload();   
             }
           }
       });
 

});

//profile image upload 
$('.imgShow').on("change", function() {
    show_profile_image(this);

});

function show_profile_image(input) {



           if (input.files && input.files[0]) {
               var reader = new FileReader();
                 

               reader.onload = function (e) {
                   // Image Classname
                    $('.prfl_image')
                       .attr('src', e.target.result);
                     // Div Classname    
                    
                    $('.imgShow').hide();
                     $('.Getimg').show();
                     $('.sub').show();
                     $('#fakeBrowse').hide();
                     $('.pcls').show();
                    
               };

               reader.readAsDataURL(input.files[0]);
           }
       }


function HandleBrowseClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
}

function Handlechange()
{
    var fileinput = document.getElementById("browse");
    
   // textinput.value = fileinput.value;
}


//search map show page   

function mapShowFunc(a)
{

   var catID=$(a).attr('data-cid');
   
    window.location.href = base_url+"SearchResult/mapShow/"+catID;
}

//business details map show page   
function BusMapShow(b)
{

   var bID=$(b).attr('data-BId');
   
    window.location.href = base_url+"SearchResult/BusMapShow/"+bID;
}

//delete reviews
function doconfirm()
{
   job=confirm("Are you sure to delete?");
   if(job!=true)
   {
       return false;
   }
}
//delete user added  image
function doconfirmDel()
{
   job=confirm("Are you sure to delete?");
   if(job!=true)
   {
       return false;
   }
}
$('.into').click(function(){
$('.loader1').show();
location.reload();
});

function Busrating(id){
  

  var bid=id;
  var score=$('#b_rating'+id+'-score').val(); 
  var comments=$('.cmnts'+id).val();  

   
   $.ajax({
        url:base_url+'SearchResult/rating',
        type:'get',
        data:{bid:bid,score:score,comments:comments},
        success:function(res){
        console.log(res);
           if(res==1)
           {
           
           location.reload();
           }
         else{
           
           location.reload();   
             }
           }
       });
 

}

function Prflrating(id){
  

  var bid=id;
  var score=$('#b_rating'+id+'-score').val(); 
  var comments=$('.cmnts'+id).val();  

   
   $.ajax({
        url:base_url+'Profile/editRating',
        type:'get',
        data:{bid:bid,score:score,comments:comments},
        success:function(res){
        console.log(res);
           if(res==1)
           {
           
           location.reload();
           }
         else{
           
           location.reload();   
             }
           }
       });
 

}
$('.addBusi').click(function(){

 window.location.href = base_url+"Business/addBusiness";
});

function HandleclctnClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
}

function clctnchange()
{
    var fileinput = document.getElementById("browse");
    
  //  textinput.value = fileinput.value;
}
//collection image upload 
$('.cimgShow').on("change", function() {
    show_clctn_image(this);

});

function show_clctn_image(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
                 

        reader.onload = function (e) {
            // Image Classname
            $('.upldimgshow')
                 .attr('src', e.target.result);
                // Div Classname    
                    
             $('.upldimg').hide();
             $('.upldimgshow').show();
             $('.show').show();
             $('.sh').show();
             $('#fakBrowse').hide();
                   
            // $('.pcls').show();
                    
        };

         reader.readAsDataURL(input.files[0]);
    }
}


$.each( $('.b_rating1'), function() {
   var id =$(this).attr('data-id');
   var title =$(this).attr('data-title');
    var read =$(this).attr('data-read');
                                                                                                                                                                                          
     $("#"+title).raty(
    {
     
    start: id,  // Start with a score value.
    starOff:base_url+'assets/images/star-off.png',                                  
    starOn: base_url+'assets/images/star-on.png', 
    readOnly:read,

   });

    
});

function Busirating(id1){
  

  var bid=id1;
  var score=$('#b_rating1'+id1+'-score').val(); 
  var comments=$('.cmnts'+id1).val();  

   
   $.ajax({
        url:base_url+'SearchResult/rating',
        type:'get',
        data:{bid:bid,score:score,comments:comments},
        success:function(res){
        console.log(res);
           if(res==1)
           {
           
           location.reload();
           }
         else{
           
           location.reload();   
             }
           }
       });
 

}



//Map Details in edit business

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



