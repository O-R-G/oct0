const scripts = ['Product.js', 'Cart.js', 'Shop.js', 'config.js'];
const shop_dir = '/static/js/shop/';
for(let i = 0; i < scripts.length; i++)
{
  scripts[i] = shop_dir + scripts[i];
}

let shopObj = null;
function loadScripts(urls = [], callback){
  let loaded = 0;
  for(let i = 0; i < urls.length; i++)
  {
    var script = document.createElement('script');
    script.setAttribute('data-csp-nonce', 'xyz-123');
    script.onload = function(){
      loaded ++;
      if(loaded == urls.length && typeof callback == 'function')
        callback();
    };
    script.setAttribute('src', urls[i]);
    document.head.appendChild(script);
  }
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

function init_shop(container, products){
  let addedProducts = !getCookie('addedProducts') ? {} : JSON.parse(getCookie('addedProducts'));
  loadScripts(scripts, function(){
    loadScripts([paypal_config['url']], function(){
      shopObj = new Shop(container, products, addedProducts, paypal_config);
    })
  });
}
function init_product(container, products){
  let addedProducts = !getCookie('addedProducts') ? {} : JSON.parse(getCookie('addedProducts'));
  loadScripts(scripts, function(){
    loadScripts([paypal_config['url']], function(){
      shopObj = new Shop(container, products, addedProducts, paypal_config);
    })
  });
}