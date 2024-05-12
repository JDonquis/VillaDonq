const d = document;
const focusFirstInput = (el) => setTimeout(() =>  d.querySelector(el).focus(), 200);
//This function is for open and close the modals : when you click in a trigger_modal class is open the modal with the class of the trigger data-modal atribute and viceverse
export function openModalDown() {
  const trigger = d.querySelectorAll('.trigger_modal');
  console.log(trigger)
  const nav_btn = d.querySelector('.trigger_nav')


  trigger.forEach(t => {
    t.addEventListener("click", () => { run(t)})
  })
  
  function run(t){
    const modal = d.querySelector(`.${t?.getAttribute('data-modal') || 'full_screen_down'}`)
    modal.classList.toggle("full_screen_down")
    console.log(modal)
    if (t?.classList.contains('trigger_nav') || modal.classList.contains('nav_content')){
      nav_btn.classList.toggle("is-active");
      nav_btn.style = "z-index: 1030 !important;";
      transitionsElements(".nav_content  li", "leftToRight", '', .1, 0.1);    
    }

    // click entrar-btn
    if(t?.classList.contains('entrar-btn')) {
      focusFirstInput('#CI_o_correo')
    }
  }

  d.addEventListener("keydown", (e) => {
    if (e.keyCode == 27) {
      run()
    }
  });
}


// animation of nav_links to go another page
// export function nav_links_animation(nv_links, section, screen, timeline) {
//   const nav_section = d.querySelector(section);
//   const screenShow = d.querySelector(screen);

//   d.addEventListener("click", (e) => {
//     if (e.target.matches(nv_links)) {
//       e.preventDefault();
//       // nav_section.style = "z-index:1";
//       timeline.timeScale(2);
//       timeline.reverse(timeline.reversed());

//       setTimeout(() => {
//         window.location.href = e.target.href;
//       }, 660);
//     }
//   });
// }

/*Efect the change of screen to up when click in links except of nav links*/
export function links_animation() {
  const screenShow = d.querySelector(".screenShow");
  window.addEventListener("pageshow", function (event) {
    var historyTraversal =
      event.persisted ||
      (typeof window.performance != "undefined" &&
        window.performance.navigation.type === 2);
    if (historyTraversal) {
      // Handle page restore.
      window.location.reload();
    }
  });
  d.addEventListener("click", (e) => {
    if (e.target.classList.contains("transition_link")) {
      e.preventDefault();
      screenShow.classList.add("toUp");
      const url = e.target.closest("a.transition_link");
      setTimeout(() => {
        window.location.href = url;
      }, 499);
    }
  });
}

// transitions of objects
export function transitionsElements(object, animation_type, delay = 0, duration = 1) {
  let obj = d.querySelectorAll(object);
  if (obj.length > 1) {
    obj.forEach((e) => {
      e.style = `animation-duration: ${duration}s; animation-delay: .${delay++}s;`;
      e.classList.toggle(animation_type);
    });
  } else {
    obj[0].style = `animation-duration: ${duration}s; animation-delay: ${delay}s;`;
    obj[0].classList.toggle(animation_type);
  }
}
