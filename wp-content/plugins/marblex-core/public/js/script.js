(function (jQuery) {
  "use strict";
  
  var registerDependencies = function () {
    if (null != PluginJsConfig && null != PluginJsConfig.js_dependencies) {
      var js_dependencies = PluginJsConfig.js_dependencies;
      for (var dependency in js_dependencies) {
        asyncloader.register(js_dependencies[dependency], dependency);
      }
    }
      // console.log(PluginJsConfig.js_dependencies);
    },
    timer = function () {
      jQuery('.timer').countTo();
    },

    service_image_effect = function(e){
      jQuery('.pt-service-box-4-list .item:first-child .pt-service-box').addClass("active");
      jQuery('.pt-service-box-4-list .item').on({
        mouseenter: function() {
          jQuery('.pt-service-box-4-list .pt-service-box').removeClass('active');
          jQuery(this).find(".pt-service-box").addClass('active');
        },

      });

    },

    owl_carousel = function () {
      jQuery('.owl-carousel').each(function () {
        var app_slider = jQuery(this);
        var rtl = false;
        var prev = 'ion-ios-arrow-left';
        var next = 'ion-ios-arrow-right';
        var prev_text = 'Prev';
        var next_text = 'Next';
        if (jQuery('body').hasClass('pt-is-rtl')) {
          rtl = true;
          prev = 'ion-ios-arrow-forward';
          next = 'ion-ios-arrow-back';
        }
        if (app_slider.data('prev_text') && app_slider.data('prev_text') != '') {
          prev_text = app_slider.data('prev_text');
        }
        if (app_slider.data('next_text') && app_slider.data('next_text') != '') {
          next_text = app_slider.data('next_text');
        }
        app_slider.owlCarousel({
          rtl: rtl,
          items: app_slider.data("desk_num"),
          loop: app_slider.data("loop"),
          margin: app_slider.data("margin"),
          nav: app_slider.data("nav"),
          dots: app_slider.data("dots"),
          loop: app_slider.data("loop"),
          autoplay: app_slider.data("autoplay"),
          autoplayHoverPause: true,
          autoplayTimeout: app_slider.data("autoplay-timeout"),
          navText: ["<i class='" + prev + "'></i>", "<i class='" + next + "'></i>"],
          responsiveClass: true,
          responsive: {
            // breakpoint from 0 up
            0: {
              items: app_slider.data("mob_sm"),
              nav: true,
              dots: false
            },
            // breakpoint from 480 up
            480: {
              items: app_slider.data("mob_num"),
              nav: true,
              dots: false
            },
            // breakpoint from 786 up
            786: {
              items: app_slider.data("tab_num")
            },
            // breakpoint from 1023 up
            1023: {
              items: app_slider.data("lap_num")
            },
            1199: {
              items: app_slider.data("desk_num")
            }
          }
        });
      });
    },

    isotope = function() {
      jQuery('.pt-masonry').isotope({
        itemSelector: '.pt-masonry-item',
                // layoutMode: 'masonry',
                layoutMode: 'fitRows',
                masonry: {
                  columnWidth: '.grid-sizer',
                  isFitWidth: true,
                  percentPosition: true,
                }
              });
      jQuery('.pt-grid').isotope({
        itemSelector: '.pt-grid-item',
      });
      jQuery('.pt-filter-button-group').on('click', '.pt-filter-btn', function() {
        var filterValue = jQuery(this).attr('data-filter');
        console.log(filterValue);
        jQuery('.pt-masonry').isotope({
          filter: filterValue
        });
        jQuery('.pt-grid').isotope({
          filter: filterValue
        });
        jQuery('.pt-filter-button-group .pt-filter-btn').removeClass('active');
        jQuery(this).addClass('active');
        updateFilterCounts();
      });
      var initial_items = 5;
      var next_items = 3;
      if (jQuery('.pt-masonry').length > 0) {
        var initial_items = jQuery('.pt-masonry').data('initial_items');
        var next_items = jQuery('.pt-masonry').data('next_items');
      }
      if (jQuery('.pt-grid').length > 0) {
        var initial_items = jQuery('.pt-grid').data('initial_items');
        var next_items = jQuery('.pt-grid').data('next_items');
      }

      function showNextItems(pagination) {
        var itemsMax = jQuery('.visible_item').length;
        var itemsCount = 0;
        jQuery('.visible_item').each(function() {
          if (itemsCount < pagination) {
            jQuery(this).removeClass('visible_item');
            itemsCount++;
          }
        });
        if (itemsCount >= itemsMax) {
          jQuery('#showMore').hide();
        }
        if (jQuery('.pt-masonry').length > 0) {
          jQuery('.pt-masonry').isotope('layout');
        }
        if (jQuery('.pt-grid').length > 0) {
          jQuery('.pt-grid').isotope('layout');
        }
      }
            // function that hides items when page is loaded
            function hideItems(pagination) {
              var itemsMax = jQuery('.pt-filter-items').length;
                // console.log(itemsMax);
                var itemsCount = 0;
                jQuery('.pt-filter-items').each(function() {
                  if (itemsCount >= pagination) {
                    jQuery(this).addClass('visible_item');
                  }
                  itemsCount++;
                });
                if (itemsCount < itemsMax || initial_items >= itemsMax) {
                  jQuery('#showMore').hide();
                }
                if (jQuery('.pt-masonry').length > 0) {
                  jQuery('.pt-masonry').isotope('layout');
                }
                if (jQuery('.pt-grid').length > 0) {
                  jQuery('.pt-grid').isotope('layout');
                }
              }
              jQuery('#showMore').on('click', function(e) {
                e.preventDefault();
                showNextItems(next_items);
              });
              hideItems(initial_items);

              function updateFilterCounts() {
                // get filtered item elements
                if (jQuery('.pt-masonry').length > 0) {
                  var itemElems = jQuery('.pt-masonry').isotope('getFilteredItemElements');
                }
                if (jQuery('.pt-grid').length > 0) {
                  var itemElems = jQuery('.pt-grid').isotope('getFilteredItemElements');
                }
                var count_items = jQuery(itemElems).length;
                // console.log(count_items);
                if (count_items > initial_items) {
                  jQuery('#showMore').show();
                } else {
                  jQuery('#showMore').hide();
                }
                if (jQuery('.pt-filter-items').hasClass('visible_item')) {
                  jQuery('.pt-filter-items').removeClass('visible_item');
                }
                var index = 0;
                jQuery(itemElems).each(function() {
                  if (index >= initial_items) {
                    jQuery(this).addClass('visible_item');
                  }
                  index++;
                });
                if (jQuery('.pt-masonry').length > 0) {
                  jQuery('.pt-masonry').isotope('layout');
                }
                if (jQuery('.pt-grid').length > 0) {
                  jQuery('.pt-grid').isotope('layout');
                }
              }
            },
            pop_video = function () {
              jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps, .button-play').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                preloader: true,
              });
            },

            woo_commerce_quantity = function() {
              jQuery(document).on('click', 'button.plus, button.minus', function() {
                var qty = jQuery(this).parent('.quantity').find('.qty');
                var val = parseFloat(qty.val());
                var max = parseFloat(qty.attr('max'));
                var min = parseFloat(qty.attr('min'));
                var step = parseFloat(qty.attr('step'));
            // Format values
            if (!val || val === '' || val === 'NaN') val = 0;
            if (max === '' || max === 'NaN') max = '';
            if (min === '' || min === 'NaN') min = 0;
            if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;
            if (jQuery(this).is('.plus')) {
              if (!isNaN(max)) {
                if (max > val) {
                  qty.val(val + step).change();
                }
              } else {
                qty.val(val + step).change();
              }
              return false;
            } else {
              if (!isNaN(min)) {
                if (min < val) {
                  qty.val(val - step).change();
                }
              } else {
                qty.val(val - step).change();
              }
              return false;
            }
          });
            },
            slick_slider = function () {

              if ( jQuery('.slick-slider-main').length ) {


                var $slider = jQuery('.slick-slider-main')
                .slick({
                  slidesToShow: 1,
                  infinite: false,
                  arrows: true,
                  autoplay: false,
                  dots: false,
                  lazyLoad: 'ondemand',
                  autoplaySpeed: 3000,
                  loop: true,
                  asNavFor: '.slick-slider-thumb'
                });

                var $slider2 = jQuery('.slick-slider-thumb')

                .slick({
                  slidesToShow: 1,
                  infinite: false,
                  lazyLoad: 'ondemand',
                  asNavFor: '.slick-slider-main',
                  autoplay: false,
                  dots: false,
                  Default:'50px',
                  arrows: false,
                  centerMode: false,
                  loop: true,
                  focusOnSelect: true
                });

              }
            },
            circle_progress = function () {
              jQuery('.pt-circle-progress-bar').each(function () {
                var number = jQuery(this).data('skill-level');
                var empty_color = jQuery(this).data('empty-color');
                var fill_color = jQuery(this).data('fill-color');
                var size = jQuery(this).data('size');
                var thickness = jQuery(this).data('thickness');
                jQuery(this).circleProgress({
                  value: '0.' + number,
                  size: size,
                  emptyFill: empty_color,
                  fill: {
                    color: fill_color
                  }
                }).on('circle-animation-progress', function (event, progress) {
                  jQuery(this).find('.pt-progress-count').html(Math.round(number * progress) + '%');
                });
              });
            },
            progress_bar = function() {
              jQuery('.pt-progress-bar > span').each(function() {
                var app_slider = jQuery('.pt-progressbar-box');
                jQuery(this).progressBar({
                  shadow: false,
                  animation: true,
                  height: app_slider.data('h'),
                  percentage: false,
                  border: false,
                  animateTarget: true,
                });
              });
            },
            
            hover_image_effect = function(e){
              jQuery('.protfolio-tabs-item a').on({
                mouseenter: function() {
                  jQuery('.protfolio-tabs-item a.active').removeClass('active');
                  jQuery(this).addClass('active');
                },
                mouseleave: function(e) {
                  var $clid = jQuery('.protfolio-tabs-item a').eq('2')[0];
                  jQuery($clid).addClass('active');
                  if (e.currentTarget == $clid) 
                  {
                    jQuery($clid).addClass('active');
                  }else{
                    jQuery(this).removeClass('active');
                  } 
                }
              });

            },
            Timeline = function(){
              jQuery(' .cntl').each(function() {
                jQuery(this).cntl({
                 revealbefore: 300,
                 anim_class: 'cntl-animate',
                 onreveal: function(e){
                  console.log(e);
                }

              });
              });
            },
            accordion = function () {
              jQuery('.pt-accordion-block .pt-accordion-box .pt-accordion-details').hide();
              jQuery('.pt-accordion-block .pt-accordion-box:first').addClass('pt-active').children().slideDown('slow');
              jQuery('.pt-accordion-block .pt-accordion-box').on("click", function () {
                if (jQuery(this).children('div.pt-accordion-details').is(':hidden')) {
                  jQuery('.pt-accordion-block .pt-accordion-box').removeClass('pt-active').children('div.pt-accordion-details').slideUp('slow');
                  jQuery(this).toggleClass('pt-active').children('div.pt-accordion-details').slideDown('slow');
                }
              });
            };
            jQuery(document).ready(function () {

              registerDependencies();

              if (jQuery('.timer').length > 0) {
                asyncloader.require(['jquery.countTo'], function () {
                  timer();
                });
              }
              if (jQuery('.pt-masonry , .pt-grid ').length > 0) {
                asyncloader.require(['isotope.pkgd'], function() {
                  isotope();
                });
              }
              if (jQuery('.owl-carousel').length > 0) {
                asyncloader.require(['owl.carousel'], function () {
                  owl_carousel();
                });
              }
              if (jQuery('.pt-service-box-4-list').length > 0) {

               service_image_effect();
             }

             if (jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps, .button-play').length > 0) {
              asyncloader.require(['jquery.magnific-popup'], function () {
                pop_video();
              });
            }
            if (jQuery('.slick-slider-main').length > 0) {
              
              
             slick_slider();
           }
           if (jQuery('.pt-circle-progress-bar').length > 0) {
            asyncloader.require(['circle-progress'], function () {
              circle_progress();
            });
          }

          if (jQuery('.pt-progressbar-box').length > 0) {

            asyncloader.require(['progressbar.js'], function() {
              progress_bar();
            });
          }

          jQuery('p:empty').remove();
          if (jQuery(' .cntl').length > 0) {
            asyncloader.require(['jquery.cntl'], function() {
              Timeline();
            });
          }

        });

            jQuery(window).on('load', function(e) {
              if (jQuery('.protfolio-tabs-item').length > 0) {
               hover_image_effect();
             }

           });

          })(jQuery);