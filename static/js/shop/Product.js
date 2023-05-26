class Product{
    constructor(container, data, isListItem = false){
        this.container = container;
        this.data = data;
        this.id = data.id;
        this.name = data.name;
        this.description = data.description;
        this.url = data.url;
        this.price = data.price;
        this.inStock = data.inStock;
        this.imageSrc = data.imageSrc;
        this.isListItem = isListItem;
        this.elements = {};
        this.init();
    }
    init(){
        this.renderElements();
        this.addListeners();
    }
    renderElements(){
        let c = 'product';
        c += ! this.inStock ? ' sold-out' : ' in-stock';
        c += ! this.isListItem ? '' : ' list-item';
        this.elements.wrapper = document.createElement('DIV');
        this.elements.wrapper.className = c;
        let html = '<a class="product-link" href="'+this.url+'">';
        if(this.name) html += '<h3 class="product-name">' + this.name + '</h3>';
        if(this.imageSrc.length)
        {
            html += '<div class="product-thumbnail-wrapper">';
            for(let i = 0; i < this.imageSrc.length; i++){
                html += '<img class="product-thumbnail" src="'+this.imageSrc[i]+'">';       
            }
            html += '</div>';
        }
        if(this.description) html += '<div class="product-description">' + this.description + '</div>';
        html += '</a>';
        let buttonsContainer = document.createElement('DIV');
        buttonsContainer.className = 'buttons-container';
        if(this.inStock)
        {
            let buttonAddToCart = document.createElement('BUTTON');
            buttonAddToCart.className = 'shop-button button-addToCart';
            buttonAddToCart.innerText = 'ADD TO CART';
            this.elements.buttonAddToCart = buttonAddToCart;

            let buttonExpand = document.createElement('BUTTON');
            buttonExpand.className = 'shop-button button-expand';
            buttonExpand.innerHTML = '<span class="currency-symbol">' + this.price.symbol + '</span><span class="price-amount">' + this.price.amount + '</span>';
            buttonsContainer.appendChild(buttonAddToCart);
            buttonsContainer.appendChild(buttonExpand);
            this.elements.buttonExpand = buttonExpand;

            buttonAddToCart.addEventListener('click', this.addProductToCart);
        }
        else
        {
            buttonsContainer.innerHTML = '<div class="pseudo-shop-button">Sold out</div>';
        }
        // html += '</div>';
        this.elements.wrapper.innerHTML = html;
        this.elements.wrapper.appendChild(buttonsContainer);
        this.container.appendChild(this.elements.wrapper);
    }
    getElements(){
        // this.elements.buttonExpand = this.elements.wrapper.querySelector('.button-expand');
    }
    addListeners(){
        if(this.elements.buttonExpand) this.elements.buttonExpand.onclick = this.toggleExpand.bind(this);
        // if(this.elements.buttonAddToCart) this.elements.buttonAddToCart.onclick = this.addToCart.bind(this);
    }
    toggleExpand(){
        this.elements.wrapper.classList.toggle('expanded'); 
    }
    addToCart(){
        this.shopObj.cart.addToCart();
    }
}
