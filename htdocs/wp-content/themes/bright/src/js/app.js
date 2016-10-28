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
  $(".scroll").on('click', function(event) {

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
  // lag et område som denne fungerer på. Finn en annen måte og
  // lukke X'en, som er avhengig av menyen og ikke bare on/off on click

  // åkai, HTML under her er vel og bra for alt, men bare ikke på å trigge
  // hamburger animasjon

  // Lag true/false --> open === true/false og if animasjonen. Sjekk currentTarget i e (sjekk console log)

  var hamburgerIsOpen = false;

  $('html').on('click',function (e) {

    hamburgerIsOpen = false;

    if ($(e.target).parents('.menu-btn' ).length == 0){
      // console.log('Click');
      $('.responsive-menu').hide('expand');
    }

    // console.log('are you open hamburger menu?', hamburgerIsOpen)

    // console.log('responsive menu over-->', $('.responsive-menu'))

  });

  $( '.menu-wrapper' ).on('click','.menu-btn',function(e){

    hamburgerIsOpen = true;

    e.stopPropagation();
    console.log('Click expand');
    $('.responsive-menu').toggle('expand');
    $('.menu-btn').toggleClass('open');


    console.log('are you open hamburger menu?', hamburgerIsOpen)

    console.log('responsivemenu-->', $('.responsive-menu'))

  });


  if (hamburgerIsOpen) {
    $('.menu-btn').toggleClass('open');
  }

  // hamburger icon animation
    // $('.menu-btn').click(function(){
    //   $(this).toggleClass('open');
    //   console.log('hamburger animation')
    // });


  // Mini cart
$('body').on('added_to_cart',function(e,data) {
        //alert('Added ' + data['div.widget_shopping_cart_content']);
        if ($('#hidden_cart').length == 0) { //add cart contents only once
            //$('.added_to_cart').after('<a href="#TB_inline?width=600&height=550&inlineId=hidden_cart" class="thickbox">View my inline content!</a>');
            $(this).append('<a href="#TB_inline?width=300&height=550&inlineId=hidden_cart" id="show_hidden_cart" title="<h2>Cart</h2>" class="thickbox" style="display:none"></a>');
            $(this).append('<div id="hidden_cart" style="display:none">'+data['div.widget_shopping_cart_content']+'</div>');
        }
        $('#show_hidden_cart').click();
    });


$("form.cart").on("change", "input.qty", function() {
    if (this.value === "0")
        this.value = "1";

    $(this.form).find("button[data-quantity]").data("quantity", this.value);
});

/* remove old "view cart" text, only need latest one thanks! */
$(document.body).on("adding_to_cart", function() {
    $("a.added_to_cart").remove();
});

// $('.menu-cart').click('added_to_cart',function(e,data) {
//         if ($('#hidden_cart').length == 0) { //add cart contents only once
//             $(this).append('<a href="#TB_inline?width=300&height=250&inlineId=hidden_cart" id="show_hidden_cart" title="<h2>Cart</h2>" class="thickbox" style="display:none"></a>');

//       // Some customization:

//         $(this).append('<div id="hidden_cart" style="display:none">'+' '+'</div>');
//         }
//         $('#show_hidden_cart').click();

//     });

  // $('.menu-cart').click('added_to_cart',function(e,data) {
  //     //alert('Added ' + data['div.widget_shopping_cart_content']);
  //     if ($('#hidden_cart').length == 0) { //add cart contents only once
  //         //$('.added_to_cart').after('<a href="#TB_inline?width=600&height=550&inlineId=hidden_cart" class="thickbox">View my inline content!</a>');
  //         $(this).append('<a href="#TB_inline?width=300&height=550&inlineId=hidden_cart" id="show_hidden_cart" title="<h2>Cart</h2>" class="thickbox" style="display:none"></a>');
  //         $(this).append('<div id="hidden_cart" style="display:none">'+data['div.widget_shopping_cart_content']+'</div>');
  //     }
  //     $('#show_hidden_cart').click();
  // });




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
    centerPadding: '60px',
    speed: 400,
    slidesToShow: 3,
    autoplay: true,
    dots: false,
    arrows: false,
    responsive: [
      {
        breakpoint: 750,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '0px',
          slidesToShow: 3
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


  // + - Read more animations and hover

  // switch image on hover
  // var sourceSwap = function () {
  //   var $this = $(this);
  //   var newSource = $this.data('alt-src');
  //   $this.data('alt-src', $this.attr('src'));
  //   $this.attr('src', newSource);
  // }
  // $('.btn-collapse').hover(function() {
  //   $('img.plus').each(sourceSwap, sourceSwap);
  // });


  // Kenneths expand/collapse
  $('body').on('click', '.btn-collapse',function (e) {


    // if ($.trim($(this).text()) === 'See more') {
    //   $(this).text('See less');
    // }
    // else {
    //     $(this).text('See more');
    // }

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



    if ($(this).hasClass('btn-collapse--scroll') || $(this).hasClass('btn-collapse-2-scroll')){

      var expandingContainer = $(this).attr('data-container-expanded');

      if (expandingContainer === 'true'){

        // product containers
        if ($(this).hasClass('btn-collapse--scroll')) {
          $('html, body').animate({
            scrollTop: $collapseContainer.offset().top + 400
          }, 400);
        }

        // our story and about containera
        if ($(this).hasClass('btn-collapse-2-scroll')) {
          $('html, body').animate({
            scrollTop: ($collapseContainer.offset().top) - 250

          }, 400);
        }

        // console.log('closest-->',  $(this).closest('.btn-collapse--scroll').find('.plus'))
        $(this).closest('.max-width-container').find('.plus').addClass('plus-rotate');
        $(this).closest('.max-width-container').find('.readmore-text').text('See less');
      }
      else{
        $('html, body').animate({
          scrollTop: ( $(this).closest('.max-width-container').offset().top) - 100
        }, 400);

        $(this).closest('.max-width-container').find('.plus').removeClass('plus-rotate');
        $(this).closest('.max-width-container').find('.readmore-text').text('See more');
      }
    }

    // making a seperate so the scroll will be different


  });

  function toggleCollapse(collapseID){
    var $collapseContainer = $(collapseID);

    //Toggles data-expanded attribute for each button with same target container
    $('.btn-collapse[href="' + collapseID + '"]').each( function () {
      $(this).attr('data-container-expanded', $(this).attr('data-container-expanded') == 'true' ? 'false' : 'true')
        // her tenker jeg man lager custom attributes
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
    var collapse_container = "<li class='collapse-container' data-expanded='false'>" + "<div class='profile--content'></div>"+ "<a href='#' class='btn-collapse'>"+ "<span class='text-less-people'>See Less</span>"+ "</a>" +"</li>";


    // Initialize Functions
    //////////////////////////////////

    var get_profile_row_count = function () {
      switch ( breakpoint.get_value() ) {
        case "smartphone": return 2; break;
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

  // google maps
  google.maps.event.addDomListener(window, 'load', init);
  function init() {
      var mapOptions = {
          // How zoomed in you want the map to start at (always required)
          zoom: 12,
          // The latitude and longitude to center the map (always required)
          center: new google.maps.LatLng(59.92640, 10.67598),
          styles: [{"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"} ] }, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#fbf6ed"} ] }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": "100"}, {"visibility": "simplified"}, {"gamma": "0.66"}, {"weight": "0.75"} ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#46bcec"}, {"visibility": "on"} ] }, {"featureType": "water", "elementType": "geometry.fill", "stylers": [{"color": "#cecece"} ] }, {"featureType": "water", "elementType": "labels.text", "stylers": [{"color": "#181818"}]}]
      };
      var mapElement = document.getElementById('map');
      var map = new google.maps.Map(mapElement, mapOptions);

      var marker = new google.maps.Marker({
          position: new google.maps.LatLng(40.6700, -73.9400),
          map: map,
          title: 'Snazzy!'
      });
  }

  // autofocus on the input
  $(':input').focus();

});
