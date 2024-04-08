/*
    user interface control
*/

function init_ui() {

    
}

function set_full_height() {
    console.log('set_full_height');
    let full_height_elements = document.getElementsByClassName('full-height');
    console.log(full_height_elements);
    for(let el of full_height_elements) {
        // console.log(el);
        el.style.height = window.innerHeight + 'px';
    }
}
set_full_height();

window.addEventListener('resize', set_full_height);

console.log('** ui ready **');