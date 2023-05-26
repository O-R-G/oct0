class Cart {
    constructor(container, addedProducts = {}, paypal_config){
        this.container = container;
        this.addedProducts = addedProducts;
        console.log(this.addedProducts);
        this.quantity = 0;
        this.elements = {};
        this.elements.itemQuantity = {};
        this.elements.itemSubtotal = {};
        this.paypal_config = paypal_config;
        this.buttons_container_id = 'cart-buttons-container';
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
        this.elements.buttonsContainer.id = this.buttons_container_id;
        this.elements.buttonCheckout = document.createElement('BUTTON');
        this.elements.buttonCheckout.className = 'shop-button';
        this.elements.buttonCheckout.id = 'checkout-button'
        this.elements.buttonCheckout.innerText = 'Checkout';
        this.elements.buttonCheckout.addEventListener('click', this.createPaypalButton.bind(this));

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
                        let q = -this.addedProducts[p.id]['quantity'];
                        delete this.addedProducts[p.id];
                        this.updateCartQuantity(q);
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
        let str = JSON.stringify(this.addedProducts);
        console.log(str);
        document.cookie = "addedProducts=" + str + ";path=/";
    }
    cleanCookie(){
        document.cookie = "addedProducts=;path=/";
    }
    getTotalFeeOfTypeByAmount(shippingPlanId, type, amount, currency){
        /* 
            return total shipping fee by amount of a certain product type
        */
        let output = 0;
        let fee = parseFloat(this.paypal_config.shippingFeesByItem[currency][shippingPlanId][type]).toFixed(2);
        let thisShippingFeeByAmount = this.paypal_config.shippingFeeByAmount[currency][fee + ''];
        for(let i = 1; i <= amount; i++)
        {
            output += thisShippingFeeByAmount[i] == undefined ? parseFloat(thisShippingFeeByAmount[Object.keys(thisShippingFeeByAmount)[Object.keys(thisShippingFeeByAmount).length - 1]]) : parseFloat(thisShippingFeeByAmount[i]);
        }
        return output;
    }
    getCommonShippingOption(typeToQuantity){
        /* 
            return an array of common shipping options of the passed product types 
            with fees added up for each option.
        */
        let output = null;
        let currencyUppercase = this.paypal_config['currency']['name'].toUpperCase();
        for(let type in typeToQuantity)
        {
            if(!output) {
                output = this.paypal_config.shippingOptions[type][currencyUppercase];
                for(let id in output){
                    output[id]['amount']['value'] = this.getTotalFeeOfTypeByAmount(id, type, typeToQuantity[type], currencyUppercase); 
                }
                continue;
            }
            else
            {
                let thisOption = this.paypal_config.shippingOptions[type][currencyUppercase];
                for(let id in output){
                    if(thisOption[id] == undefined)
                        delete output[id];
                    else
                        output[id]['amount']['value'] += this.getTotalFeeOfTypeByAmount(id, type, typeToQuantity[type], currencyUppercase); 
                }
            }
        }
        return output;
    }
    createPaypalButton(){
        // let sItem_row = document.getElementsByClassName('item-row');
        if(Object.keys(this.addedProducts).length > 0)
        {
            let currencyUppercase = this.paypal_config['currency']['name'].toUpperCase();
            let buttonContainerId = this.buttons_container_id;
            let paypal_items = [];
            // let types = [];
            let baseAmount = 0.0;
            
            let totalItemQuantity = 0;
            let hasSubscription = false;
            let typeToQuantity = {};
            for(let p_id in this.addedProducts){

                let thisItemName = this.addedProducts[p_id]['paypalName'];
                let thisItemPrice = this.addedProducts[p_id]['price']['amount'];
                let thisItemQuantity = this.addedProducts[p_id]['quantity'];
                let thisType = this.addedProducts[p_id]['type'] == undefined ? this.paypal_config.shippingOptions.default : this.addedProducts[p_id]['type'];
                typeToQuantity[thisType] = typeToQuantity[thisType] == undefined ? this.addedProducts[p_id]['quantity'] : typeToQuantity[thisType] + this.addedProducts[p_id]['quantity'];
                let thisItem = {
                    name: thisItemName, 
                    unit_amount: {
                        currency_code: currencyUppercase,
                        value: thisItemPrice
                    },
                    quantity: thisItemQuantity
                };
                paypal_items.push(thisItem);
                if(thisType == 'subscription')
                    hasSubscription = true;
                baseAmount += thisItemPrice * thisItemQuantity;
                totalItemQuantity += thisItemQuantity;
            };
            let shippingOptions = this.getCommonShippingOption(typeToQuantity);
            let options = Object.values(shippingOptions);
            let totalValue = baseAmount + parseFloat(options[0].amount.value, 10);
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: currencyUppercase,
                                value: totalValue,
                                breakdown: {
                                    item_total: { 
                                        currency_code: currencyUppercase,
                                        value: baseAmount
                                    },
                                    shipping: {
                                        currency_code: currencyUppercase,
                                        value: options[0].amount.value
                                    }
                                }
                            },
                              shipping: {
                                  options: options
                            },
                            items: paypal_items
                        }]
                        
                    });
                },
                onShippingChange: function (data, actions) {
                    if(data.amount.currency_code == 'USD' && data.shipping_address.country_code != 'US'){
                        return actions.reject();
                    }
                    else
                    {
                        data.amount.value = parseFloat(baseAmount, 10) + parseFloat(data.selected_shipping_option.amount.value, 10);
                        data.amount.value = data.amount.value + '';
                        return actions.order.patch([{
                            op: "replace",
                            path: "/purchase_units/@reference_id=='default'/amount",
                            value: { 
                                value: data.amount.value, 
                                currency_code: data.amount.currency_code,
                                breakdown: {
                                    item_total: { 
                                        currency_code: currencyUppercase,
                                        value: baseAmount
                                    },
                                    shipping: {
                                        currency_code: currencyUppercase,
                                        value: parseFloat(data.selected_shipping_option.amount.value, 10)
                                    }
                                }
                            }
                        }]);
                    }
                },
                style: {
                    color: 'black'
                },
                onError: function (err) {
                    // For example, redirect to a specific error page
                    // window.location.href = "/your-error-page-here";
                    // window.location.href = "/shop/issues/error";
                    console.log(err);
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        eraseCookie('serving-library-shop-cart');
                        var return_url = location.protocol + '//' + location.host + "/shop/thx";
                        let email = orderData.payer.email_address;
                        return_url += '?email=' + encodeURIComponent(email)+'&currency='+encodeURIComponent(currencyUppercase);
                        [].forEach.call(paypal_items, function(el){
                            return_url += '&items[]='+ encodeURIComponent(el['quantity'] + ' × '+ el['name']);
                        });
                        actions.redirect(return_url);
                    });
                }
              }).render('#' + buttonContainerId);
        } else console.log('cart is empty');
    }
}