const scripts = ['Product.js', 'Cart.js', 'Shop.js'];
let shopObj = null;
function loadScript(url){
    return new Promise(function(resolve, reject){
        var script = document.createElement('script');
        script.setAttribute('data-csp-nonce', 'xyz-123');
        script.onload = function(){
            resolve('loaded');
        };
        script.setAttribute('src', url);
        document.head.appendChild(script);        
    });
}

async function init_shop(container, products, client_id = ''){
    // document.cookie = "addedProducts=;path=/";
    for(let i = 0; i < scripts.length; i++)
    {
        await loadScript('/static/js/shop/' + scripts[i]);
    }
    addedProducts = !getCookie('addedProducts') ? {} : JSON.parse(getCookie('addedProducts'));
    shopObj = new Shop(container, products, addedProducts, client_id);
}
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return '';
  }


