class Cart {
    constructor(container, addedProducts = {}, paypal_config){
        this.container = container;
        this.addedProducts = addedProducts;
        this.quantity = 0;
        this.elements = {};
        this.elements.itemQuantity = {};
        this.elements.itemSubtotal = {};
        this.paypal_config = paypal_config;
        this.columns = [
            { 
                'display': 'Item',
                'class': 'name'
            },
            { 
                'display': 'Price',
                'class': 'price'
            },
            { 
                'display': 'Quantity',
                'class': 'quantity'
            },
            { 
                'display': '',
                'class': 'subtotal'
            },
            { 
                'display': '',
                'class': 'remove'
            }
        ];
        this.init();
    }
    init(){
        for(let p_id in this.addedProducts)
            this.quantity += this.addedProducts[p_id]['quantity'];
        this.renderElements();
        // this.getElements();
        this.addListeners();
    }
    renderElements(){
        this.elements.cartWrapper = document.createElement('DIV');
        this.elements.cartWrapper.id = 'cart-wrapper';

        this.elements.addedProductsWrapper = document.createElement('DIV');
        this.elements.addedProductsWrapper.id = 'added-products-wrapper';
        this.elements.addedProductsWrapper.appendChild(this.renderRow());
        for(let p_id in this.addedProducts) 
            this.elements.addedProductsWrapper.appendChild( this.renderRow(this.addedProducts[p_id]) );

        this.elements.buttonsContainer = document.createElement('DIV');
        this.elements.buttonsContainer.className = 'buttons-container';
        this.elements.buttonCheckout = document.createElement('BUTTON');
        this.elements.buttonCheckout.className = 'shop-button';
        this.elements.buttonCheckout.innerText = 'Checkout';
        this.elements.buttonCloseCart = document.createElement('DIV');
        this.elements.buttonCloseCart.id = 'button-close-cart';

        this.elements.buttonsContainer.appendChild(this.elements.buttonCheckout);
        this.elements.buttonsContainer.appendChild(this.elements.buttonCloseCart);

        this.elements.cartWrapper.appendChild(this.elements.addedProductsWrapper);
        this.elements.cartWrapper.appendChild(this.elements.buttonsContainer)

        this.elements.buttonExpandCart = document.createElement('BUTTON');
        this.elements.buttonExpandCart.id = 'button-expand-cart';
        this.elements.buttonExpandCart.className = 'shop-button';
        this.elements.buttonExpandCart.innerHTML = 'CART (<span id="cart-quantity">' +this.quantity+  '</span>)';

        this.container.appendChild(this.elements.cartWrapper);
        this.container.appendChild(this.elements.buttonExpandCart);
       
    }
    renderRow(p = null){
        let c = 'cart-row';
        c += p ? ''  : ' columnNames';
        let row = document.createElement('DIV');
        row.className = c;
        if(!p)
        {
            let html = '';
            for(let i = 0; i < this.columns.length; i++)
            {
                html += '<div class="cart-col '+this.columns[i]['class']+'-col">' + this.columns[i]['display'] + '</div>';
            }
            row.innerHTML = html;
            return row;
        }
        for(let i = 0; i < this.columns.length; i++)
        {
            let col = document.createElement('DIV');
            col.className  = "cart-col " + this.columns[i]['class'] + "-col";
            switch(this.columns[i]['class'])
            {
                case 'name':
                    col.innerHTML = p['name'];
                    break;
                case 'price':
                    col.innerText = p['price']['symbol'] + p['price']['amount'];
                    break;
                case 'quantity':
                    let buttonIncreaseQuantity = document.createElement('SPAN');
                    buttonIncreaseQuantity.className = 'button-increase-quantity';
                    let buttonDecreaseQuantity = document.createElement('SPAN');
                    buttonDecreaseQuantity.className = 'button-decrease-quantity';
                    let itemQuantity = document.createElement('SPAN');
                    itemQuantity.className = 'item-quantity';
                    itemQuantity.innerText = p['quantity'];
                    col.appendChild(buttonDecreaseQuantity);
                    col.appendChild(itemQuantity);
                    col.appendChild(buttonIncreaseQuantity);
                    buttonIncreaseQuantity.addEventListener('click', function(){
                        this.updateItemQuantity(p.id, p.price, 1);
                    }.bind(this));
                    buttonDecreaseQuantity.addEventListener('click', function(){
                        this.updateItemQuantity(p.id, p.price, -1);
                    }.bind(this));
                    this.elements.itemQuantity[p.id] = itemQuantity;
                    break;
                case 'subtotal':
                    col.innerText = p['price']['symbol'] + p['price']['amount'] * p['quantity'];
                    this.elements.itemSubtotal[p.id] = col;
                    break;
                case 'remove':
                    let buttonRemoveRow = document.createElement('DIV');
                    buttonRemoveRow.className = 'button-remove-row';
                    buttonRemoveRow.innerText = 'remove';
                    buttonRemoveRow.addEventListener('click', function(){
                        row.remove();
                        delete this.addedProducts[p.id];
                        this.updateCookie();
                    }.bind(this));
                    col.appendChild(buttonRemoveRow);
                    break;
                
            }
            row.appendChild(col);
        }
        
        
        return row;
    }
    addItem(p)
    {
        let q = typeof p['quantity'] != 'undefined' ? p['quantity'] : 1;
        if(typeof this.addedProducts[p.id] == 'undefined'){
            p['quantity'] = q;
            this.elements.addedProductsWrapper.appendChild( this.renderRow(p) );
            this.addedProducts[p.id] = p;
            this.updateCartQuantity(q);
        }
        else
            this.updateItemQuantity(p.id, p.price, q);
    }
    getElements(){
        this.elements.wrapper = this.container.querySelector('#cart-wrapper');
        this.elements.toggle = this.container.querySelector('#cart-toggle');
        this.elements.close = this.container.querySelector('#close-cart-button');
        
    }
    addListeners(){
        this.elements.buttonExpandCart.addEventListener('click', function(){
            document.body.classList.toggle('viewing-cart');
        }.bind(this));
        this.elements.buttonCloseCart.addEventListener('click', function(){
            document.body.classList.remove('viewing-cart');
        });
    }
    updateItemQuantity(p_id, p_price, q){
        if(this.addedProducts[p_id]['quantity'] + q <= 0) return;
        this.addedProducts[p_id]['quantity'] += q;
        this.elements.itemQuantity[p_id].innerText = this.addedProducts[p_id]['quantity'];
        this.elements.itemSubtotal[p_id].innerText = p_price['symbol'] + this.addedProducts[p_id]['quantity'] * p_price['amount'];
        this.updateCartQuantity(q);
    }
    updateCartQuantity(q){
        if(this.quantity + q < 0) return;
        this.quantity += q;
        this.elements.buttonExpandCart.innerHTML = 'CART (<span id="cart-quantity">' + this.quantity +  '</span>)';
        this.updateCookie();
    }
    updateCookie(){
        console.log(this.addedProducts);
        document.cookie = "addedProducts=" + JSON.stringify(this.addedProducts) + ";path=/";
    }
    cleanCookie(){
        document.cookie = "addedProducts=;path=/";
    }
}