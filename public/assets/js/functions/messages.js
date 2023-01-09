














const d = document;
const message_box = d.querySelector(".message");

export default function feedbackMessage() {

     let m = d.querySelector('.message>span');
        if(m.innerHTML == 'The d n i field is required.')
           m.innerHTML = 'La cedula es requerida';
        if(m.innerHTML == 'The password field is required.')
           m.innerHTML = 'La contraseña es requerida';

    if(message_box.classList.contains('response'))
    {   
        message_box.classList.add('message-active');

        
        setTimeout(()=>{ 

            message_box.classList.remove('message-active');

         }, 5000)
    }



}

