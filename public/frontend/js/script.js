$('.slider.owl-carousel').owlCarousel({
    rtl: false,
    loop: true,
    margin: 10,
    dots: true,
    autoplay: true,
    autoplayTimeout: 4000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});


$('.global-slider.owl-carousel').owlCarousel({
    rtl: false,
    loop: true,
    margin: 10,
    nav: true,
    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
    autoplay: true,
    autoplayTimeout: 4000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});


$('.partnaers.owl-carousel').owlCarousel({
    rtl: false,
    loop: false,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 4000,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 2
        },
        1000: {
            items: 4.4
        }
    }
});

// window.sr = ScrollReveal();
// sr.reveal('.navbar', {
//     duration: 2000,
//     origin: 'bottom',
// });
// sr.reveal('.slider', {
//     duration: 2000,
//     origin: 'top',
//     distance: '300px',
// });
// sr.reveal('.section-title', {
//     duration: 2000,
//     origin: 'left',
//     distance: '300px',
// });
// sr.reveal('.contint-card', {
//     duration: 2000,
//     origin: 'bottom',
//     distance: '300px',
// });

// sr.reveal('.global-slider', {
//     duration: 2000,
//     origin: 'top',
//     distance: '300px',
// });
// sr.reveal('.portfolio-contints', {
//     duration: 2000,
//     origin: 'top',
//     distance: '300px',
// });
// sr.reveal('.form-portfolio', {
//     duration: 2000,
//     origin: 'top',
//     distance: '300px',
// });
// sr.reveal('.news-card', {
//     duration: 2000,
//     origin: 'top',
//     distance: '300px',
// });
// sr.reveal('.news-card-ce', {
//     duration: 2000,
//     origin: 'bottom',
//     distance: '300px',
// });
// sr.reveal('.contact-us', {
//     duration: 2000,
//     origin: 'left',
//     distance: '300px',
// });
// sr.reveal('.footer', {
//     duration: 2000,
//     origin: 'bottom',
// });
// sr.reveal('.partnaers', {
//     duration: 2000,
//     origin: 'bottom',
// });


var scroll = new SmoothScroll('a[href*="#"]');



