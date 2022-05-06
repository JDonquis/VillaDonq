const screenShow = document.querySelector(".screenShow")
document.addEventListener('DOMContentLoaded', function () {
    screenShow.querySelector('.shadowsLoader').classList.remove('shadowsLoader')
    // gsap.to(screenShow, { x: '-100%', duration: .5, ease: Expo.easeInOut })
    screenShow.style = ' transition: all .5s ease; transform: translateX(-100%)'
}, false);
