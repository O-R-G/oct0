/*
    user interface control
*/

function init_ui() {

    
}

function set_full_height() {
    let full_height_elements = document.getElementsByClassName('full-height');
    for(let el of full_height_elements) {
        el.height = window.innerHeight + 'px';
    }
}
window.addEventListener('DOMContentLoaded', set_full_height);
window.addEventListener('resize', set_full_height);

function toggle_menu(){
    document.body.classList.toggle('viewing-menu');
}


console.log('** ui ready **');