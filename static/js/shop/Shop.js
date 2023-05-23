class Shop {
    constructor(container, productData = [], addedProductData = {}, client_id){
        this.container = container;
        this.productData = productData;
        this.addedProductData = addedProductData;
        this.products = [];
        this.cart = null;
        this.elements = {};
        this.paypal_config = {
            'client_id': client_id,
            'url': 'https://www.paypal.com/sdk/js?client-id='+client_id+'&disable-funding=credit,card'
        }
        this.init(container);
    }
    init(){
        
        for(let p_id in this.addedProductData)
        {
            this.addedProductData[p_id]['price']['amount'] = parseFloat(this.addedProductData[p_id]['price']['amount']);
            this.addedProductData[p_id]['amount'] = parseInt(this.addedProductData[p_id]['amount']);
        }
        this.renderElements();
    }
    renderElements(){
        let productsContainer = document.createElement('DIV');
        productsContainer.id = 'products-container';
        this.container.appendChild(productsContainer);
        this.elements.productsContainer = productsContainer;
        let cartContainer = document.createElement('DIV');
        cartContainer.id = 'cart-container';
        this.container.appendChild(cartContainer);
        this.elements.cartContainer = cartContainer;

        this.cart = new Cart(this.elements.cartContainer, this.addedProductData, this.paypal_config);

        for(let i = 0; i < this.productData.length; i++)
        {
            let p = new Product(this.elements.productsContainer, this.productData[i], true);
            this.products.push(p);
            if(p.elements.buttonAddToCart){
                p.elements.buttonAddToCart.addEventListener('click', function(){
                    this.cart.addItem(p.data);
                }.bind(this));
            }
        }
    }
    // renderProduct(id = '', name = '', url = '', price = {}, inStock = true, imageSrc = [], shipping = [], description = '', isListItem = false){
    //     let c = 'product';
    //     c += !inStock ? ' sold-out' : ' in-stock';
    //     c += isListItem ? ' list-item' : '';
    //     id = id ? id : url; 
    //     let wrapper = document.createElement('DIV');
    //     wrapper.className = c;
    //     wrapper.id = id;
    //     let html = '<a class="product-link" href="'+url+'">';
    //     if(name) html += '<h3 class="product-name">' + name + '</h3>';
    //     if(imageSrc.length)
    //     {
    //         html += '<div class="product-thumbnail-wrapper">';
    //         for(let i = 0; i < imageSrc.length; i++)
    //             html += '<img class="product-thumbnail" src="'+imageSrc[i]+'">';       
    //         html += '</div>';
    //     }
    //     if(description) html += '<div class="product-description">' + description + '</div>';
    //     html += '</a>';
    //     let buttonsContainer = document.createElement('DIV');
    //     buttonsContainer.className = 'buttons-container';
    //     if(inStock)
    //     {
    //         let addToCartButton = document.createElement('BUTTON');
    //         addToCartButton.className = 'shop-button button-addToCart';
    //         addToCartButton.innerText = 'ADD TO CART';
    //         let expandButton = document.createElement('BUTTON');
    //         expandButton.className = 'shop-button button-expand';
    //         expandButton.innerHTML = '<span class="currency-symbol">' + price.symbol + '</span><span class="price-amount">' + price.amount + '</span>';
    //         buttonsContainer.appendChild(addToCartButton);
    //         buttonsContainer.appendChild(expandButton);
    //         expandButton.addEventListener('click', function(){
    //             wrapper.classList.toggle('expanded');
    //         });
    //         addToCartButton.addEventListener('click', this.addProductToCart);
    //     }
    //     else
    //     {
    //         buttonsContainer.innerHTML = '<div class="pseudo-shop-button">Sold out</div>';
    //     }
    //     // html += '</div>';
    //     wrapper.innerHTML = html;
    //     wrapper.appendChild(buttonsContainer);
    //     this.elements.productsContainer.appendChild(wrapper);
    // }
    renderCart(){
        let wrapper = document.createElement('DIV');
        wrapper.id = 'cart-wrapper';
        let html = '<div id="items-wrapper">';
        html += this.renderCartRow();
        for(let i = 0; i < this.addedProductData.length; i++)
        {
            let p = this.addedProductData[i];
            html += this.renderCartRow(p);
        }
        html += '</div>';
        html += '<div class="buttons-container"><button class="shop-button">Checkout</button></div><div id="close-cart-button"></div>';
        wrapper.innerHTML = html;
        let toggle = document.createElement('DIV');
        toggle.id = 'cart-toggle';
        toggle.className = 'buttons-container';
        toggle.innerHTML = '<button class="shop-button">CART (<span id="cart-toggle-total">'+this.cart.quantity+'</span>)</button>';
        this.elements.cartContainer.appendChild(wrapper);
        this.container.appendChild(toggle);
    }
    renderCartRow(product = null){
        let c = 'cart-row';
        c += product ? ''  : ' columnNames';
        let html = '<div class="'+c+'">';
        let columns = this.cart.columns;
        if(!product)
        {
            for(let i = 0; i < columns.length; i++)
            {
                html += '<div class="cart-col item-'+columns[i]['class']+'">' + columns[i]['display'] + '</div>';
            }
            html += '</div>';
            return html;
        }
    }

    checkout(){
        paypal.Buttons({
	        createOrder: function(data, actions) {
	        	// console.log('createOrder . . .');
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
			            items: items
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
					[].forEach.call(items, function(el){
						return_url += '&items[]='+ encodeURIComponent(el['quantity'] + ' × '+ el['name']);
					});
					actions.redirect(return_url);
	            });
	        }
	  	}).render('#' + buttonContainerId);
    }
}