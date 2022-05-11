const slider_wrap = document.querySelector(".slider_wrap")
const each_slider = slider_wrap.querySelectorAll(".each_slider_element")
const prev_btn = document.querySelector(".prev")
const next_btn = document.querySelector(".next")
const nav_slider = document.querySelector(".nav_slider")
const progress_bar = document.querySelector(".progress_bar div")
const n_sliders = slider_wrap.childElementCount

let per_view = 1
let per_move = 1


slider_wrap.style.gridTemplateColumns = `repeat(${n_sliders}, ${100 / per_view}%)`

const style = getComputedStyle(slider_wrap)
let gap = style.gap.replace(/\D/g, '')

const each_width = each_slider[0].offsetWidth + +gap;
let default_active = per_view

let active_slider = 0

// nav slider
const formule = (n_sliders - per_view)
let li_active = 0

if (nav_slider) {

    // if ( Math.round(n_sliders/per_move)%2 == 0 ) i = -per_move
    // console.log(i);
    for (let i = 0; i < formule + 1; i++) {
        let li = document.createElement('li')
        li.dataset.n = i
        nav_slider.appendChild(li);
    }
    var all_li_nav = nav_slider.querySelectorAll('li')

    function liActivate() {
        all_li_nav.forEach(li => li.classList.remove('active'))
        all_li_nav[active_slider].classList.add('active')
    }
    liActivate()
    //event on nav list
    nav_slider.childNodes.forEach(li => {
        li.onclick = () => {
            const position = li.dataset.n
            position > active_slider ? translate('>', position) : translate('<', position)
        }
    })
}

if (next_btn || prev_btn) {
    let level_of_opacity_btn = 0;
    function btnOpacity() {
        active_slider == 0 ? prev_btn.classList.add('disable') : prev_btn.classList.remove('disable')
        active_slider == n_sliders - per_view ? next_btn.classList.add('disable') : next_btn.classList.remove('disable')
    }
    btnOpacity()
}

if (progress_bar) {
    progress_bar.style.transition = '.4s all ease'
    function progress() {
        progress_bar.style.width = `${((active_slider + 1) / n_sliders) * 100}%`
    }
    progress()
}


let scroll_x_position = slider_wrap.scrollLeft;
function translate(direction, times = 1) {
    
    function move() {
        active_slider = times
        slider_wrap.scrollLeft = each_width * times
        scroll_x_position = slider_wrap.scrollLeft;
    }

    if (direction == '>') {
        if (active_slider < formule) move()
    }

    if (direction == '<') {
        if (active_slider > 0) move()
    }

    if (opacity_effect_each) {
        console.log(opacity_effect_each);
        each_slider.forEach(e => e.style.opacity = '0')
        each_slider[active_slider].style.opacity = '1'
    }
    btnOpacity?.()
    liActivate?.()
    progress?.()

    
}

next_btn.onclick = () => translate('>', active_slider + 1)
prev_btn.onclick = () => translate('<', active_slider - 1)

let swift_scroll = false;
let swift_move = false

slider_wrap.addEventListener('touchstart', () => {
    swift_move = true
    swift_scroll = false
})

slider_wrap.addEventListener('touchend', e => {
    if (swift_scroll == false) {
        startDebounce()
    }
    swift_move = false
})

slider_wrap.addEventListener('scroll', e => {
    if (swift_move == false) {
        swift_scroll = true;
        startDebounce()
    }
})


function debounce(fn, delay = 50) {
    let time;
    return function (...arg) {
        clearTimeout(time)
        time = setTimeout(() => {
            fn(...arg)
        }, delay);
    }
}

function MoveAfterScroll() {
    let round_slider = Math.round(slider_wrap.scrollLeft / (each_width))
    slider_wrap.scrollLeft > scroll_x_position ? translate('>', round_slider) : translate('<', round_slider)
}
let startDebounce = debounce(MoveAfterScroll)


// automatic change
// setInterval(() => {
//     translate('>', active_slider +1)
// }, 5000);