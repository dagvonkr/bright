import $ from 'jquery';
import 'slick-carousel';
// require('jquery/dist/jquery.min.js');
// var Flickity = require('flickity/dist/flickity.pkgd.js');
// require('readmore-js');

$(document).ready(function($){
  // console.log($.fn.jquery, jQuery.fn.jquery);


// Navbar bar appearing on scroll
$(function () {
  var bar = $('.nav-bar-on-scroll');
  var top = bar.css('top');
  $(window).scroll(function () {

  if ($(this).scrollTop() > 0) {
    bar.stop().css({
      'position': 'absolute'
    });
  }

  if ($(this).scrollTop() > 600) {
    bar.stop().css({
        'position': 'fixed'
    }).animate({
      'top': '0px',
        'height': '100px',
        'opacity': '1'
    }, 60);
  } else {
    bar.stop().css({
      'position': 'fixed'
    }).animate({
      'top': top,
          'height': '0',
          'opacity': '0'
    }, 60);
  }
  });
});

  // Scroll animation for menu
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top // - some pixels
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }
  });

  // hamburger
  $('html').on('click',function (e) {
    if ($(e.target).parents('.site-content' ).length == 0){
      console.log('Click');
      $('.responsive-menu').hide('expand');

    }
  });
  $( '.bax-menu' ).on('click','.menu-btn',function(e){
    e.stopPropagation();
    $('.responsive-menu').toggle('expand');
  });

  // Animation fadeIn on scroll
  $(window).scroll( function(){
    /* Check the location of each desired element */
    $('.fadein').each( function(i){
      var bottom_of_object = $(this).offset().top + $(this).outerHeight();
      var bottom_of_window = $(window).scrollTop() + $(window).height();
      /* If the object is completely visible in the window, fade it it */
      if( bottom_of_window > bottom_of_object ){
        $(this).animate({
          opacity: 1,
          transform: "translate(0px,200px)"
        },500);
      }
    });
  });

  // Slick carousel
  $('.produkt-carousel').slick({
    centerMode: true,
    centerPadding: '10px',
    slidesToShow: 3,
    autoplay: true,
    dots: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });

  // Kenneths expand/collapse
  $('body').on('click', '.btn-collapse',function (e) {

    e.preventDefault();
    var collapseID = e.currentTarget.hash;
    var $collapseContainer = $(collapseID);

    if (collapseID == ""){
      var row_number = $(this).closest('.collapse-container').prev().attr('data-row-number');
      $(".profiles > li[data-row-number='" +  row_number + "']").removeClass('active');
      $(this).closest('.collapse-container').slideToggle("normal")
    }
    else {
      toggleCollapse(collapseID);
    }

    if ($(this).hasClass('btn-collapse--scroll')){
      //Scroll to top of content container
      $('html, body').animate({
        scrollTop: $collapseContainer.offset().top
      }, 500);
    }

  });

  function toggleCollapse(collapseID){
    var $collapseContainer = $(collapseID);

    //Toggles data-expanded attribute for each button with same target container
    $('.btn-collapse[href="' + collapseID + '"]').each( function () {
      $(this).attr('data-container-expanded', $(this).attr('data-container-expanded') == 'true' ? 'false' : 'true');
    });

    //Toggle state content container open/close
    //600ms, 400ms and 200ms, respectively "slow", "normal", "fast"
    $collapseContainer.slideToggle("normal", function () {});
  }

  var breakpoint = (function() {

    var currentbreakpoint = "";

    var get_value = function () {
      return window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, '');
    };

    $(window).resize(function () {
      if (currentbreakpoint !== get_value()){
        currentbreakpoint = get_value();
        $(window).trigger('breakpoint');
      }
    }).resize();


    return {
      get_value: get_value
    };

  })();

  var collapse_profile = (function() {

    // Initialize varibles
    //////////////////////////////////
    var profile_list = $('.profiles > li');
    var profile_row_count = 0;
    var collapse_container = "<li class='collapse-container' data-expanded='false'>" + "<div class='profile--content'></div>"+ "<a href='#' class='btn-collapse'>"+ "<span class='text-less'>See Less</span>"+ "</a>" +"</li>";

    // Initialize Functions
    //////////////////////////////////

    var get_profile_row_count = function () {
      switch ( breakpoint.get_value() ) {
        case "smartphone": return 1; break;
        case "tablet":     return 2; break;
        case "desktop":    return 3; break;
      }
    };

    var create_containers = function(){

      var items_per_row = get_profile_row_count();

      profile_list.each(function (index, profile_item) {

        var $profile_item = $(profile_item);

        var indexPlusOne = index + 1;
        var item_row_number = Math.ceil( indexPlusOne / items_per_row );

        $profile_item.attr('data-row-number', item_row_number);

        if ( (indexPlusOne / items_per_row) == item_row_number || $profile_item.is(':last-child')){
          $profile_item.after(collapse_container);
        }
      })
    };

    var clearActive = function () {

    };

    create_containers(profile_row_count);

    // Event bindings
    profile_list.on('click', '.profile--item' , function(e){
      e.preventDefault();

      var selected = $(e.delegateTarget);
      var $collapseContainer = selected.nextAll('.collapse-container').first();

      var item_row_number = selected.attr('data-row-number');
      var $selected_row_items = profile_list.filter('[data-row-number="' + item_row_number + '"]');

      var content = $(e.currentTarget).attr('data-content');

      $selected_row_items.not(selected).removeClass('active');
      selected.toggleClass('active');

      $collapseContainer.find('.profile--content').html(content);

      if ( ! $selected_row_items.hasClass('active')){
        $collapseContainer.slideUp("normal", function () {});
        return false;
      }

      $collapseContainer.slideDown("normal", function () {});

    })

    return {
      get_profile_row_count : get_profile_row_count,
      clearActive : clearActive
    }

  })();

  $(window).on('breakpoint', collapse_profile.set_profile_row_count).trigger('breakpoint');



});
