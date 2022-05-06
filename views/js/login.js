const fieldset = document.querySelector(".login_form fieldset")
document.querySelectorAll('.login_form span input').forEach(element => {

    // show password
    document.querySelector(".login_form i").onclick = () => {
        const psw = document.querySelector("#contraseña");

        if (psw.type == 'password') {
            psw.type = 'text'
            document.querySelector(".closed_eye").style = 'display: none'
            document.querySelector(".open_eye").style = 'display: block'
        } else {
            psw.type = 'password'
            document.querySelector(".closed_eye").style = 'display: block'
            document.querySelector(".open_eye").style = 'display: none'
        }
    }
});

//close fullScreen
const btnClose = document.querySelector(".close_btn")
const btnShow = document.querySelector(".entrar-btn")
const fullScreen = btnClose.parentElement;

const moveY = (sign) => gsap.to(fullScreen, {y: `${sign}vh`, duration: .5, ease: Expo.easeInOut })

// si existe 
if (btnShow) {
    btnShow.onclick = () => {
        nav_section.style = 'z-index: 1'
        moveY('0')
    }
    btnClose.onclick = () => moveY('-100')  
    // close with key esc
    document.addEventListener('keydown', (e) => {
        if (e.key == 'Escape') moveY('-100')
    })  
} else {
    fullScreen.style = 'transform: translateY(0vh); z-index: 1'
    btnClose.onclick = (e) => {
        e.preventDefault()
        moveY('-100')
        screenShow.style = 'transform: translateX(0); z-index: 0'

        setTimeout(() => {
            window.location.href = 'index.html'
        }, 500);
    }
    
}