
         jQuery(document).ready(function($) {
         
         	"use strict";
         
         	 
         	        //add some elements with animate effect
         
         	        $(".box").hover(
         
         	            function () {
         	            $(this).find('span.badge').addClass("animated fadeInLeft");
         	            $(this).find('.ico').addClass("animated fadeIn");
         
         	            },
         	            function () {
         
         	            $(this).find('span.badge').removeClass("animated fadeInLeft");
         
         	            $(this).find('.ico').removeClass("animated fadeIn");
         
         	            }
         
         	        );
         
         	 
         
         	    (function() {
         	 
         
         	        var $menu = $('.navigation nav'),
         
         	            optionsList = '<option value="" selected>Go to..</option>';
         
         	 
         
         	        $menu.find('li').each(function() {
         
         	            var $this   = $(this),
         
         	                $anchor = $this.children('a'),
         
         	                depth   = $this.parents('ul').length - 1,
         
         	                indent  = '';
         
         	 
         
         	            if( depth ) {
         
         	                while( depth > 0 ) {
         
         	                    indent += ' - ';
         
         	                    depth--;
         
         	                }
         
         	 
         
         	            }
         	            $(".nav li").parent().addClass("bold");
         	 
         
         	            optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';
         
         	        }).end()
         
         	        .after('<select class="selectmenu">' + optionsList + '</select>');
         
         	 
         
         	        $('select.selectmenu').on('change', function() {
         
         	            window.location = $(this).val();
         
         	        });
         
         	 
         
         	    })();
         
         	 
         
         	        //Navi hover
         	        $('ul.nav li.dropdown').hover(function () {
         
         	            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
         
         	        }, function () {
         	            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
         
         	        });
         
         	 
         
         	});
             
         /* When the user clicks on the button, 
         toggle between hiding and showing the dropdown content */
         function myFunction() {
             document.getElementById("tabs").classList.toggle("show");
         }
         
         // Close the dropdown if the user clicks outside of it
         window.onclick = function(event) {
           if (!event.target.matches('.dropbtn')) {
         
             var dropdowns = document.getElementsByClassName("dropdown-content");
             var i;
             for (i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               if (openDropdown.classList.contains('show')) {
                 openDropdown.classList.remove('show');
               }
             }
           }
         }
		 
		  function myFunctions() {
             document.getElementById("tabss").classList.toggle("show");
         }
         
         // Close the dropdown if the user clicks outside of it
         window.onclick = function(event) {
           if (!event.target.matches('.dropbtn_yp')) {
         
             var dropdowns = document.getElementsByClassName("dropbtn_yp-content");
             var i;
             for (i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               if (openDropdown.classList.contains('show')) {
                 openDropdown.classList.remove('show');
               }
             }
           }
         }
      
      
         $("#flexiselDemo3").flexisel({
             visibleItems: 5,
             animationSpeed: 1000,
             autoPlay: true,
             autoPlaySpeed: 3000,            
             pauseOnHover: true,
             enableResponsiveBreakpoints: true,
             responsiveBreakpoints: { 
                 portrait: { 
                     changePoint:480,
                     visibleItems: 1
                 }, 
                 landscape: { 
                     changePoint:640,
                     visibleItems: 2
                 },
                 tablet: { 
                     changePoint:768,
                     visibleItems: 3
                 }
             }
         }); 
         
         
         
         
           
     
         $(document).ready(function(){
          
         
                  $( '.popup-change' ).click(function() {
               var new_popup = $(this).data("open");
                $('.modal').modal('hide');
				setTimeout(function() {
                $('#'+new_popup).modal('show');
									}, 500);
         
              });
            }); 


         $(document).ready(function() {
         $("#content-slider").lightSlider({
                   loop:true,
                   keyPress:true
               });
               $('#image-gallery').lightSlider({
                   gallery:true,
                   item:1,
                   thumbItem:9,
                   slideMargin: 0,
                   speed:500,
                   auto:true,
                   loop:true,
                   onSliderLoad: function() {
                       $('#image-gallery').removeClass('cS-hidden');
                   }  
               });
         });			
            
   


    /*amal*/
     $(document).ready(function(){
 
     
/*----------------------------
----------- SCROLL ----------
----------------------------*/
     
$('.yp-left-frame-scroll').slimscroll({
        size: '7px',
        distance : '20px',
        height:'594px'

      });
      
/*-------- * * * * * --------*/  
  $(".js-example-basic-multiple").select2();    
});
/*end amal script*/



jQuery(document).ready(function($) {

    "use strict";

     
            //add some elements with animate effect

            $(".box").hover(

                function () {
                $(this).find('span.badge').addClass("animated fadeInLeft");
                $(this).find('.ico').addClass("animated fadeIn");

                },
                function () {

                $(this).find('span.badge').removeClass("animated fadeInLeft");

                $(this).find('.ico').removeClass("animated fadeIn");

                }

            );

     

        (function() {
     

            var $menu = $('.navigation nav'),

                optionsList = '<option value="" selected>Go to..</option>';

     

            $menu.find('li').each(function() {

                var $this   = $(this),

                    $anchor = $this.children('a'),

                    depth   = $this.parents('ul').length - 1,

                    indent  = '';

     

                if( depth ) {

                    while( depth > 0 ) {

                        indent += ' - ';

                        depth--;

                    }

     

                }
                $(".nav li").parent().addClass("bold");
     

                optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';

            }).end()

            .after('<select class="selectmenu">' + optionsList + '</select>');

     

            $('select.selectmenu').on('change', function() {

                window.location = $(this).val();

            });

     

        })();

     

            //Navi hover
            $('ul.nav li.dropdown').hover(function () {

                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();

            }, function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();

            });

      $('#slider').cycle({
                fx:'scrollHorz',
                next:'#next',
                prev:'#prev',
                timeout:1000,
                pause:1
            });
  jQuery(document).ready(function() {
                    jQuery('.demo').nailthumb({
                        imageCustomFinder: function(el){
                            var image = $('<img />').attr('src',el.attr('href').replace('/full/','/small/')).css('display','none');
                            image.attr('alt',el.attr('title'));
                            el.append(image);
                            return image;
                        },
                        titleAttr:'alt'
                    });
                    Shadowbox.init();
                });

    });
    


// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

$( '.s_up' ).click(function() {
$('#myModal').modal('hide');
$('#mymModal').modal('show');
});
$( '.fgt' ).click(function() {
$('#myModal').modal('hide');
$('#myfModal').modal('show');
});




