jQuery(function($) {

    $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 2000,
        singleItem: true,
        loop:true,
        responsiveRefreshRate : 200,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: [620, 2],
        itemsMobile: [479, 1],
    });


    $("#owl-demo2, #owl-demo3, #owl-demo4").owlCarousel({
        autoPlay: 3000,
        navigation: false,
        pagination: false,
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: [620, 2],
        itemsMobile: [479, 1],
        singleItem: false

    });

});


jQuery(function($) {
    $('.nav-wrapper .nav').nav();
    $('.nav-button, nav-wrapper .nav').click(function(e) {
        e.stopPropagation();
    });

    $('html').click(function() {
        $('.nav-wrapper .nav').hide();
    })


    $('.header-login-wrap .header-login').on('click', function() {
        var width = $(window).width(),
            height = $(window).height();
        if ((width <= 767) && (height >= 100)) {
            $(this).parents('.header-login-wrap').find('.login-dropdown').slideToggle();

        } else {}
        // console.log( $(this).parents('.category-block'));
    })

    $('.mob-foot-block .heading').on('click', function() {
        $(this).parents('.mob-foot-block').find('.foot-content').slideToggle();
        $(this).parents('.mob-foot-block').find('.plus-arrow').toggleClass("expand-arrow");
    })





    $(".read-more").on('click touchstart', function(event) {
        var txt = $(".teaser-more").is(':visible') ? 'Read more' : 'Read less';
        $(this).parent().prev(".teaser-more").toggleClass("visible");
        $(this).html(txt);
        event.preventDefault();
    });



});


jQuery(function($) {
    $('.call-click , .call-hidden').hover(function(event) {
        $('.slide-call').addClass('active_call', 5000);
        $('.slide-call').css('z-index', '212');
        event.stopPropagation();
    }, function() {
        $('.slide-call').removeClass('active_call', 5000);
        $('.slide-call').css('z-index', '202');
    });



    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('body.inner-page').addClass("sticky");
        } else {
            $('body.inner-page').removeClass("sticky");
        }
    });



    $('.main-nav .carets, .main-nav .carets-r').click(function(){
      $(this).siblings('ul').slideToggle();
      $(this).parent().toggleClass('nav-active');
    })

    $('.common-tab .nav-tabs a span').click(function (e) {
        //e.preventDefault()
        $(this).tab('show')
    })


    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })  

});






jQuery(function($) {
  var sync1 = $(".milestone-tabs #sync1");
  var sync2 = $(".milestone-tabs #sync2"); 
  sync1.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    navigation: true,
    pagination:false,
    items : 1,
    afterAction : syncPosition,
    responsiveRefreshRate : 200,
    transitionStyle : "fade"
  }); 
  sync2.owlCarousel({
    items : 8,
    itemsDesktop      : [1199,8],
    itemsDesktopSmall     : [979,5],
    itemsTablet       : [768,4],
    itemsMobile       : [479,2],
    pagination:false,
    responsiveRefreshRate : 100,
    transitionStyle : "fade",
    afterInit : function(el){
      el.find(".owl-item").eq(0).addClass("synced");
    }
  }); 
  function syncPosition(el){
    var current = this.currentItem;
    $(".milestone-tabs #sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if($(".milestone-tabs #sync2").data("owlCarousel") !== undefined){
      center(current)
    }
  } 
  $(".milestone-tabs #sync2").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    sync1.trigger("owl.goTo",number);
  }); 
  function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    } 
    if(found===false){
      if(num>sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", num - sync2visible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        sync2.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      sync2.trigger("owl.goTo", num-1)
    }    
  } 
});


jQuery(function($) {
  $(".owl-demo-milestone").owlCarousel({
    navigation: true,
    pagination: false,
    items: 4,
    itemsDesktop: [1199, 4],
    itemsDesktopSmall: [980, 3],
    itemsTablet: [768, 3],
    itemsTabletSmall: [620, 2],
    itemsMobile: [479, 1],
    singleItem: false 
  });
 
});

jQuery(function($) {
    $('input#atm_location:checkbox').click(function () {        
        $('.atm-locate span').toggleClass('checkbox-checked');
    });

    $('input#branch_lo:checkbox').click(function () {        
        $('.brch-locate span').toggleClass('checkbox-checked');
    }); 
});

jQuery(function($) {
    $('#side-menu').metisMenu();
});