// Add your custom JS here.
jQuery(document).ready(function ($) {
    function checkScroll() {
        var startY = 100; //The point where the navbar changes in px

        if ($(window).scrollTop() > startY) {
        $('#main-nav').addClass("scrolled");
        $('.logo-link').addClass("scrolled");
        } else {
        $('#main-nav').removeClass("scrolled");
        $('.logo-link').removeClass("scrolled"); // $('#main-nav').removeClass("bg-light");
        }
    }

    if ($('#main-nav').length > 0) {
        $(window).on("scroll load resize", function () {
        checkScroll();
        });
    } // $('.navbar-toggler').on('click',function () {
    //     if ($("#navbarNavDropdown").hasClass("show")) {
    //         $('#main-nav').removeClass('bg-light');
    //     } else {
    //         $('#main-nav').addClass('bg-light');
    //     }
    // });

    jQuery.event.special.touchstart = {
        setup: function( _, ns, handle ) {
            this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
        }
    };
    jQuery.event.special.touchmove = {
        setup: function( _, ns, handle ) {
            this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
        }
    };
    jQuery.event.special.wheel = {
        setup: function( _, ns, handle ){
            this.addEventListener("wheel", handle, { passive: true });
        }
    };
    jQuery.event.special.mousewheel = {
        setup: function( _, ns, handle ){
            this.addEventListener("mousewheel", handle, { passive: true });
        }
    };

});
  