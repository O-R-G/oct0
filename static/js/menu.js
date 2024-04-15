// hide_show_menu

var menu = document.getElementById('menu');
var main = document.getElementById('main');
// var badge_ = document.getElementById('badge');

// badge_ is currently declared in badge-menu.php for the sake of a/b testing
if(typeof badge_ != 'undefined' && badge_)
    badge_.addEventListener('click', hide_show_menu);

function hide_show_menu() {
    menu.classList.toggle("hidden");
    main.classList.toggle("transparent");
    badge.start_stop();
}