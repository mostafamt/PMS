$(document).ready(function () {
    'use strict';
    $(window).scroll(function () {
        var navbar = $('.navbar');
        if ($(window).scrollTop() >= navbar.height()) {
            navbar.addClass('scrolled');
        } else {
            navbar.removeClass('scrolled');
        }
    });
    
    $('.tab-switch li').click(function () {
        $(this).addClass('selected').siblings().removeClass('selected');
        $('.tabs .tab-content > div').hide();
        $('.' + $(this).data('class')).show();

    });
    $('.tab-switch li').click(function () {
        $(this).addClass('selected').siblings().removeClass('selected');
        $('.tabs .tab-content-img > div').hide();
        $('.' + $(this).data('class')).show();

    });

   $('.nav .dropdown .catigory').click(function () {
        $('.selection').toggle();
    });
});
