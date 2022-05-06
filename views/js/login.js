const fieldset = document.querySelector(".login_form fieldset")
document.querySelectorAll('.login_form span input').forEach(element => {

    // element.oninput = () => {
    //     const nroLetters = element.value.length;
    //     if (nroLetters < 20) {
    //         let shadow = ''
    //         for (let i = 0; i < nroLetters; i++) {
    //             shadow += (shadow ? ',' : '') + i * 1 + '1px ' + i * 1 + `px 0 hsl(191, 80%, ${26 + nroLetters * 0.1}%)`
    //         }
    //         fieldset.style = `transform: rotateY(-${nroLetters}deg);
    //                         box-shadow:  ${shadow};
    //                         background-color: hsl(214, 79%, ${14 + nroLetters * 0.10}%) !important;
    //     `;
    //     }
    // }
    // element.onchange = () => {
    //     fieldset.style = `transform: rotateY(0deg)`;
    // }


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

if (btnShow) {
    btnShow.onclick = () => {
        nav_section.style = 'z-index: 1'
        moveY('0')
    }
    btnClose.onclick = () => moveY('-100')
    console.log('culo');

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