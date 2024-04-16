(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

})(jQuery);


$(document).ready(function() {
    $('#horseBtn').click(function() {
        console.log("Bouton 'Horses' cliqué");
        $('#horseFields').show();
        $('#accessoireFields').hide();
    });

    $('#accessoireBtn').click(function() {
        console.log("Bouton 'Accessoires' cliqué");
        $('#horseFields').hide();
        $('#accessoireFields').show();
    });
});
$(document).ready(function() {
    $('#horseBtn2').click(function() {
        console.log("Bouton 'Horses' du deuxième carrousel cliqué");
        $('#horseFields').show();
        $('#accessoireFields').hide();
    });

    $('#accessoireBtn2').click(function() {
        console.log("Bouton 'Accessoires' du deuxième carrousel cliqué");
        $('#horseFields').hide();
        $('#accessoireFields').show();
    });

    $('#horseBtn3').click(function() {
        console.log("Bouton 'Horses' du troisième carrousel cliqué");
        $('#horseFields').show();
        $('#accessoireFields').hide();
    });

    $('#accessoireBtn3').click(function() {
        console.log("Bouton 'Accessoires' du troisième carrousel cliqué");
        $('#horseFields').hide();
        $('#accessoireFields').show();
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const otherImagesInput = document.getElementById('other_images');
    otherImagesInput.addEventListener('change', function() {
        const selectedFiles = otherImagesInput.files;
        const maxAllowed = 4;
        if (selectedFiles.length > maxAllowed) {
            otherImagesInput.value = '';
            alert('Vous ne pouvez pas ajouter plus de 4 images.');
        }
    });
});
