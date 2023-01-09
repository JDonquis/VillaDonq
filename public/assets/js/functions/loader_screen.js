
/*For efficiency we create a const 'd' for save the DOM document*/
const d=document;

/*This function is for generate a change of screen*/
export default function loader_screen(screen){

	const screenShow = d.querySelector(screen);
    screenShow.classList.add("hidden_screen_loader");
    document.querySelector(".shadowsLoader").remove()
 }
