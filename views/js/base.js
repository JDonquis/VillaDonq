const navContent = document.querySelector(".nav_content")
const nav_section = document.querySelector(".nav-section")
const btnNav = document.querySelector(".trigger_nav")
const nav_links = document.querySelectorAll(".nav_content a")
const timeline = gsap.timeline({ paused: true, defaults: { duration: .5, ease: Expo.easeInOut } })
    .to('.path-1', { rotation: 40 })
    .to('.path-2', { opacity: 0 }, '<')
    .to('.path-3', { rotation: -40 }, '<')
    .to(navContent, { y: '100vh', }, '<')
    .to('.nav-section > *', { opacity: 0 }, '<')
    .to(btnNav, { opacity: 1 }, '<')
    .from(".main_nav li", { opacity: 0, x: '-130px', stagger: .10 });


timeline.reverse()

btnNav.onclick = () => {
    timeline.reversed(!timeline.reversed())
    // nav-section.childNodes.forEach( e => e.classList == 'trigger_nav'? '' : e.style= 'opacity: 0')
    nav_section.style = 'z-index: 120'
}
// close with click esc
document.addEventListener('keydown', (e) => {
    timeline.reverse()
})  

// animation to go another page
nav_links.forEach(a => {
    a.onclick = (e) => {
        e.preventDefault()
        nav_section.style = 'z-index:1'
        screenShow.style = 'transform: translateX(0)'
        timeline.timeScale(2)
        timeline.reverse(timeline.reversed())
        setTimeout(() => {
            window.location.href = e.target.href
        }, 660);
    }
})


const all_links = document.querySelectorAll("a")
all_links.forEach(a => {
    a.onclick = (e) => {
        e.preventDefault()

        screenShow.classList.add('toUp')
        setTimeout(() => {
            window.location.href = a.href
        }, 500);
     }
    }
)