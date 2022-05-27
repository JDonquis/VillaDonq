const d = document;

//Config Gsap
export function gsap_timeline(nav,btn)
{   
    const navContent = d.querySelector(nav);
    const btnNav = d.querySelector(btn);
    
    const timeline = gsap.timeline({ paused: true, defaults: { duration: .5, ease: Expo.easeInOut } })
    .to('.path-1', { rotation: 40 })
    .to('.path-2', { opacity: 0 }, '<')
    .to('.path-3', { rotation: -40 }, '<')
    .to(navContent, { y: '100vh', }, '<')
    .to('.nav-section > *', { opacity: 0 }, '<')
    .to(btnNav, { opacity: 1 }, '<')
    .from(".main_nav li", { opacity: 0, x: '-130px', stagger: .10 });

    timeline.reverse()

    return timeline;
}

//Hamburger button animation
export function button_nav(btn,nav,timeline) 
{

    const n=d.querySelector(nav);
    d.addEventListener("click",e=>{
        
        if(e.target.matches(btn) || e.target.matches(`${btn} *`))
        {   
            timeline.reversed(!timeline.reversed())
            n.style = 'z-index: 120';

            // nav-section.childNodes.forEach( e => e.classList == 'trigger_nav'? '' : e.style= 'opacity: 0')
            
        }

    })  
}

/*Close the nav menu with animition when push ESC*/
export function close_nav(timeline) {  d.addEventListener('keydown', (e) => { e.keyCode==27?timeline.reverse():0; } ) }

// animation of nav_links to go another page
export function nav_links_animation(nv_links,section,screen,timeline)
{   
    const nav_section=d.querySelector(section);
    const screenShow=d.querySelector(screen);

    d.addEventListener("click",e=>{

        if(e.target.matches(nv_links))
        {
            e.preventDefault();
            nav_section.style = 'z-index:1';
            timeline.timeScale(2);
            timeline.reverse(timeline.reversed());

            setTimeout(() =>{ window.location.href = e.target.href }, 660);
                
    } })

}

/*Efect the change of screen to up when click in links except of nav links*/
export function links_animation(screen)
{
    
    const screenShow = d.querySelector(screen);
        
    d.addEventListener("click",e=>{

        if(e.target.matches("a:not(.nav_links)"))
        {               
            e.preventDefault();
            screenShow.classList.add('toUp');
            setTimeout(() => {
                window.location.href = e.target.href
             }, 500);
        }
    })
}
