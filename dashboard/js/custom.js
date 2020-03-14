/**
 * ame module
 */

var ame = (function() {
    'use script';
    var isValidForm = false;
    var options = {
        registration_form: $('#student_reg_form'),
        validFormRegEx: {
            name: '/{d}/',
        }
    };

    //toggle diploma section
    var _toggleDiploma = function(isDiploma) {
        if(isDiploma) {
            options.registration_form.find('.diploma').show();
            //_resetFormSection('twelve')
            options.registration_form.find('.twelve').hide();        
        } else {
            options.registration_form.find('.diploma').hide();
            //_resetFormSection('diploma');
            options.registration_form.find('.twelve').show();
        }
    }

    //toggle passing year
    var _togglePassingYear = function(passingYear, elem) {
        var selectId = $(elem).attr('id');
        var percentId = selectId.replace('passing_year', 'percentage');
        if(passingYear === 2019) {
            //$(elem).val = "";
            $('#'+percentId).parent().hide();
        } else {
            $('#'+percentId).parent().show();
        }
    }

    var _resetFormSection = function(sectionClass) {
        $(sectionClass).find('input', 'select').val('');
    }

    var _renderCityList = function(cityList) {
        var select =  options.registration_form.find('#city');
        select.empty();
        cityList.forEach(function(city) {
            var opt = "<option value='"+ city +"'>"+ city +"</option>";
            select.append(opt);
        })
    }

    var _renderStateList = function(states) {
        var select =  options.registration_form.find('#state');        
        for (var k in states) {
            if (states.hasOwnProperty(k)) {
               var opt = "<option value='"+ k +"'>"+ k +"</option>";
               select.append(opt);
            }
        }

        select.on('change', function() {
            _renderCityList(states[this.value]);
        })

    }

    var validationRegField = function() {
        
    }

    var pupulateStateCityList = function() {
        var selectState = "<select name='State' id='state' class='form-control required'  required='required'></select>";
        var cityState = "<select name='City' id='city' class='form-control required'  required='required'></select>";
        var stateElem = options.registration_form.find('#state1');
        var cityElem = options.registration_form.find('#city1');

        $.ajax({url: "../data/state-city-list.json", success: function(result){ 
            if(result) {
                stateElem.replaceWith(selectState);
                cityElem.replaceWith(cityState);
                _renderStateList(result);
            }
        }});
    }

    var init = function () {
        var self = this;

        pupulateStateCityList();

        var isDiploma = options.registration_form.find('input[name=diploma_student]:checked').val(); //0-no/1-yes
        _toggleDiploma(parseInt(isDiploma));

        options.registration_form.find('input[name=diploma_student]').on('change', function() {
            var isDiploma = this.value; //0-no/1-yes
            _toggleDiploma(parseInt(isDiploma));
        });


        options.registration_form.find('select[id^="class_"], select#diploma_passing_year').on('change', function(){
            var selectedYear = parseInt(this.value);
            _togglePassingYear(selectedYear, this);
        })
        if(jQuery().datepicker) {
            $('#dob').datepicker({
                changeYear: true,
                changeMonth: true,
                yearRange: '1980:' + new Date().getFullYear()
            })
        }
        
        options.registration_form.find('input').on('keyup', function() {            
            validationRegField(this.id, this.value);
        })        
    }    

    return {
        init: init
    }

})();

var ame1 = (function() {
    'use script';
    var isValidForm = false;
    var options = {
        registration_form: $('#student_reg_form1'),
        validFormRegEx: {
            name: '/{d}/',
        }
    };

    //toggle diploma section
    var _toggleDiploma = function(isDiploma) {
        if(isDiploma) {
            options.registration_form.find('.diploma').show();
            //_resetFormSection('twelve')
            options.registration_form.find('.twelve').hide();        
        } else {
            options.registration_form.find('.diploma').hide();
            //_resetFormSection('diploma');
            options.registration_form.find('.twelve').show();
        }
    }

    //toggle passing year
    var _togglePassingYear = function(passingYear, elem) {
        var selectId = $(elem).attr('id');
        var percentId = selectId.replace('passing_year', 'percentage');
        if(passingYear === 2019) {
            //$(elem).val = "";
            $('#'+percentId).parent().hide();
        } else {
            $('#'+percentId).parent().show();
        }
    }

    var _resetFormSection = function(sectionClass) {
        $(sectionClass).find('input', 'select').val('');
    }

    var _renderCityList = function(cityList) {
        var select =  options.registration_form.find('#city');
        select.empty();
        cityList.forEach(function(city) {
            var opt = "<option value='"+ city +"'>"+ city +"</option>";
            select.append(opt);
        })
    }

    var _renderStateList = function(states) {
        var select =  options.registration_form.find('#state'); 
        var opt = "<option value=''>Select State</option>";
        select.append(opt);       
        for (var k in states) {
            if (states.hasOwnProperty(k)) {
               opt = "<option value='"+ k +"'>"+ k +"</option>";
               select.append(opt);
            }
        }

        select.on('change', function() {
            _renderCityList(states[this.value]);
        })

    }

    var validationRegField = function(elemId, value) {
        
    }

    var pupulateStateCityList = function() {
        var selectState = "<select name='State' id='state' class='form-control required'  required='required'></select>";
        var cityState = "<select name='City' id='city' class='form-control required'  required='required'></select>";
        var stateElem = options.registration_form.find('#state');
        var cityElem = options.registration_form.find('#city');

        $.ajax({url: "../data/state-city-list.json", success: function(result){ 
            if(result) {
                stateElem.replaceWith(selectState);
                cityElem.replaceWith(cityState);
                _renderStateList(result);
            }
        }});
    }

    var init = function () {
        var self = this;

        pupulateStateCityList();

        var isDiploma = options.registration_form.find('input[name=diploma_student]:checked').val(); //0-no/1-yes
        _toggleDiploma(parseInt(isDiploma));

        options.registration_form.find('input[name=diploma_student]').on('change', function() {
            var isDiploma = this.value; //0-no/1-yes
            _toggleDiploma(parseInt(isDiploma));
        });

        
        options.registration_form.find('#diploma_percentage').parent().hide();

        options.registration_form.find('select[id^="class_"], select#diploma_passing_year').on('change', function(){
            var selectedYear = parseInt(this.value);
            _togglePassingYear(selectedYear, this);
        })
        if(jQuery().datepicker) {
            $('#dob').datepicker({
                changeYear: true,
                changeMonth: true,
                yearRange: '1980:' + new Date().getFullYear()
            })
        }

        options.registration_form.find('input').on('keyup', function() {            
            validationRegField(this.id, this.value);
        })

        options.registration_form.find('button[type="submit"]').on('click', function(e) {
            e.preventDefault();
            if(isValidForm) {
                console.log('submit');
            } else {
                console.log('not working');
            }
        })
    }

    return {
        init: init
    }

})();

$(function() {
    'use strict'; // Start of use strict
   
    /*------------------------------------------------------------------
    Navigation Hover effect
    ------------------------------------------------------------------*/
    $('ul.navbar-nav li.dropdown').hover(function() {
        $(this).find('.sub-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.sub-menu').stop(true, true).delay(200).fadeOut(500);
    });

     //MobileMenu Activated
    $('.mainmenu-area nav').meanmenu();

    /*--------------------------
    scrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
/*---------------------------------------------------------------------
		Magnific Popup 
    ------------------------------------------------------------------------*/
    if ($('.front-gallery, .gallery-section').length) {

        $('.front-gallery, .gallery-section').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>by sbtechnosoft</small>';
                }
            }
        });
    }
    if ($('.image-popup-no-margins').length) {

        $('.image-popup-no-margins').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom',
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    }
    /*---------------------------------------------------------------------
    Gallery Post Hove Effect for Caption Script
    ------------------------------------------------------------------------*/
    function gallery_hover() {

        if ($(".gallery-caption img").length) {
            $(".gallery-caption img").on('mouseover', function() {
                var img_width = $(".gallery-caption img").width();
                var img_height = $(".gallery-caption img").height();
                $(".gallery-caption .blur").css({
                    "height": img_height,
                    "width": img_width
                });
            });
        }
    }
    gallery_hover();
    /*---------------------------------------------------------------------
    Image Filter Script 
    ------------------------------------------------------------------------*/
    var $container = $('.portfolioContainer');

    if ($('.portfolioFilter').length) {

        $('.portfolioFilter a').on('click', function() {

            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });
    }   
    /*------------------------------------------------------------------
    Header Navigation
    ------------------------------------------------------------------*/
    if ($(window).width() > 767) {
        $('ul.navbar-nav li.dropdown').on('hover', function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    }

    /*-----------------------------------------------------------------
    Student Registration form
    ------------------------------------------------------------------*/
    ame.init();
    ame1.init();
    
});

/*------------------------------------------------------------------
WOW
------------------------------------------------------------------*/
wow = new WOW({
    animateClass: 'animated',
    offset: 100
});
wow.init();
/*------------------------------------------------------------------
 Loader 
------------------------------------------------------------------*/
jQuery(window).on("load scroll", function() {
    'use strict'; // Start of use strict
    // Loader 
     $("#dvLoading").fadeOut("fast");
	 
    //Animation Numbers	 
    jQuery('.animateNumber').each(function() {
        var num = jQuery(this).attr('data-num');
        var top = jQuery(document).scrollTop() + (jQuery(window).height());
        var pos_top = jQuery(this).offset().top;
        if (top > pos_top && !jQuery(this).hasClass('active')) {
            jQuery(this).addClass('active').animateNumber({
                number: num
            }, 2000);
        }
    });
});

/*------------------------------------------------------------------
Count Down
------------------------------------------------------------------*/
if ($(".count-down").length) {
    var year = parseInt($(".count-down").attr("data-countdown-year"), 10);
    var month = parseInt($(".count-down").attr("data-countdown-month"), 3) - 1;
    var day = parseInt($(".count-down").attr("data-countdown-day"), 10);
    $(".count-down").countdown({
        until: new Date(year, month, day),
        padZeroes: true
    });
}
