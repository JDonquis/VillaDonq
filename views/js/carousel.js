const imgSlider = document.querySelectorAll(".home_header img")
const paragraf = document.querySelectorAll(".each_slide p")

const scaleAnimation = (element) => gsap.fromTo(element, { scale: 1 }, { scale: 1.1, duration: 7, ease: Linear.easeNone })
const opacityAnimation = (element, y = 0) => gsap.from(element, { opacity: 0, y: y, duration: 1 })

opacityAnimation(paragraf[0], '60px')
scaleAnimation(imgSlider[0])

const swiper = new Swiper('.swiper', {
  
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },

    lazy: {
        loadPrevNext: true,
      },
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    autoplay: {
        delay: 7000,
        disableOnInteraction: false,
    },
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


swiper.on('slideChange', function () {
    const i = swiper.activeIndex
    opacityAnimation(paragraf[i], '60px')
    scaleAnimation(imgSlider[i])
    if (i ==3) swiper.initialSlide = 0
});