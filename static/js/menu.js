
// hide_show_menu

var menu = document.getElementById('menu');
var main = document.getElementById('main');
var logo_numeral = document.getElementById('logo-numeral');
console.log(logo_numeral);
// var oct01234567 = document.getElementById('oct01234567');
// var oct0 = document.getElementById('oct0');
// var badge = document.getElementById('badge');
// badge.addEventListener('click', hide_show_menu);

function hide_show_menu() {
    menu.classList.toggle("hidden");
    main.classList.toggle("hidden");
    logo_numeral.classList.toggle("hidden");
    // oct01234567.classList.toggle("hidden");
    // oct0.classList.toggle("hidden");
    // badge_obj.badge_start_stop();
}
