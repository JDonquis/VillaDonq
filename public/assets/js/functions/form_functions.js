


export function focus_input()
{   
    // all the UI of the .card_form, like the animation when is focus one of its inputs
document.querySelectorAll(".card_form input").forEach(input => {
    if (input.type !== 'file' && input.type !== 'submit' && input.type !== 'hidden' ) {
        if (input.value) {
            input.nextElementSibling.classList.add('focus_valid')
        }
        input.onfocus = () =>{ 
            if (input.type === 'date') {
                input.classList.add('focus_valid')
            }
            input.nextElementSibling.classList.add('focus_valid')
            
        }
        input.onblur = () => {
            if (input.type == 'date') {
                !input.value ?  input.classList.remove('focus_valid'): ''
            }

            !input.value ? input.nextElementSibling.classList.remove('focus_valid') : ''
        }
    } else {
        input.onchange = () => input.style.color = '#21E6C1'
    }
})     
}

export function show_hide_password()
{
    // show and hide password
const open_eye = document.querySelector(".open_eye")
const closed_eye = document.querySelector(".closed_eye")
document.querySelector(".card_form i").onclick = () => {
    const psw = document.querySelector("#contraseña");

    if (psw.type == 'password') {
        psw.type = 'text'
        closed_eye.style = 'display: none'
        open_eye.style = 'display: block'
    } else {
        psw.type = 'password'
        closed_eye.style = 'display: block'
        open_eye.style = 'display: none'
    }
}

}
