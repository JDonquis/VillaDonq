// const d = document;

// // import { openModalDown }from "functions/animations.js";
// const trigger = d.querySelectorAll('.trigger_modal');
// const nav_btn = d.querySelector('.trigger_nav')

// trigger.forEach(t => {
//   console.log('generaal')
//   t.addEventListener("click", () => { run(t)})
// })

// function run(t){
//     console.log(trigger)
//     const modal = d.querySelector(`.${t?.getAttribute('data-modal') || 'full_screen_down'}`)
//     modal.classList.toggle("full_screen_down")
//     modal.classList.add("full_screen_down")
//   console.log(modal)
//     if (t?.classList.contains('trigger_nav') || modal.classList.contains('nav_content')){
//       nav_btn.classList.toggle("is-active");
//       nav_btn.style = "z-index: 1030 !important;";
//       transitionsElements(".nav_content  li", "leftToRight", '', .4);    
//     }

//     // click entrar-btn
//     if(t?.classList.contains('entrar-btn')) {
//       focusFirstInput('#CI_o_correo')
//     }
//   }

//   d.addEventListener("keydown", (e) => {
//     if (e.keyCode == 27) {
//       run()
//     }
//   });
// // document.addEventListener("keydown", function(event) {
// //     // Check if the Escape key was pressed
// //     if (event.key === "Escape" || event.key === "Esc") {
// //       let element = document.querySelector(".modal_form");
// //       console.log(element)
// //       // Remove the d-block class from the element
// //       element.classList.add("d-none");
// //     //   element.classList.remove("d-block");
// //     }
// //   });