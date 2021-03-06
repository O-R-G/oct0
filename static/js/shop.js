// load paypal library

// sandbox
var paypal_client_id = 'AZOWN6t-ioLBjw9HiXfGexBtH5WsFqAy92SU5CTHYeX8PwBSk8j-C5LYZL0aY-f1dRRF138bGmC4KoOs';
// live
// paypal_client_id = 'Afwppna4LpZ2tpCOVh4kfISR2Q-VgcwX6nihNbf7hm3ATsDMvDY4TRaTQ47IUxAjSaou9QQYB4ccXxqt';

var paypal_url = 'https://www.paypal.com/sdk/js?client-id='+paypal_client_id+'&disable-funding=credit,card';

document.body.classList.add('loading');

function loadScript(url){
	var script = document.createElement('script');
	script.setAttribute('data-csp-nonce', 'xyz-123');
	script.onload = function(){
		document.body.classList.remove('loading');
	};
	script.setAttribute('src', url);
	document.head.appendChild(script);
	return script;
}


var shippingOptions_arr = 
{
	'issue' : {
	    USD: [
	    {
	    	id: "SHIP_US",
	        label: "DOMESTIC",
	        type: "SHIPPING",
	        selected: true,
	        amount: {
	            value: "10.00",
	            currency_code: "USD"
	        }
		}
		], 
	    EUR: [
	        {
	        	id: "SHIP_EU",
	            label: "WITHIN EU",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "10.00",
	                currency_code: "EUR"
	            }
	        },
	        {
	        	id: "SHIP_WORLD",
	            label: "REST OF THE WORLD",
	            type: "SHIPPING",
	            selected: false,
	            amount: {
	                value: "40.00",
	                currency_code: "EUR"
	            }
	        }
	    ],
	    GBP: [
	        {
	        	id: "SHIP_UK",
	            label: "WITHIN UK",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "10.00",
	                currency_code: "GBP"
	            }
	        },
	        {
	        	id: "SHIP_WORLD",
	            label: "REST OF THE WORLD",
	            type: "SHIPPING",
	            selected: false,
	            amount: {
	                value: "30.00",
	                currency_code: "GBP"
	            }
	        }
	    ]
	},
	'annual': {
	    USD: [
	    {
	    	id: "SHIP_US",
	        label: "DOMESTIC",
	        type: "SHIPPING",
	        selected: true,
	        amount: {
	            value: "10.00",
	            currency_code: "USD"
	        }
		}
		], 
	    EUR: [
	        {
	        	id: "SHIP_EU",
	            label: "WITHIN EU",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "8.00",
	                currency_code: "EUR"
	            }
	        },
	        {
	        	id: "SHIP_WORLD",
	            label: "REST OF THE WORLD",
	            type: "SHIPPING",
	            selected: false,
	            amount: {
	                value: "40.00",
	                currency_code: "EUR"
	            }
	        }
	    ],
	    GBP: [
	        {
	        	id: "SHIP_UK",
	            label: "WITHIN UK",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "5.00",
	                currency_code: "GBP"
	            }
	        },
	        {
	        	id: "SHIP_WORLD",
	            label: "REST OF THE WORLD",
	            type: "SHIPPING",
	            selected: false,
	            amount: {
	                value: "30.00",
	                currency_code: "GBP"
	            }
	        }
	    ]
	},
	'archive': {
	    USD: [
	    {
	    	id: "SHIP_US",
	        label: "DOMESTIC",
	        type: "SHIPPING",
	        selected: true,
	        amount: {
	            value: "10.00",
	            currency_code: "USD"
	        }
		}
		], 
	    EUR: [
	        {
	        	id: "SHIP_EU",
	            label: "WITHIN EU",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "8.00",
	                currency_code: "EUR"
	            }
	        },
	        {
	        	id: "SHIP_WORLD",
	            label: "REST OF THE WORLD",
	            type: "SHIPPING",
	            selected: false,
	            amount: {
	                value: "40.00",
	                currency_code: "EUR"
	            }
	        }
	    ],
	    GBP: [
	        {
	        	id: "SHIP_UK",
	            label: "WITHIN UK",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "5.00",
	                currency_code: "GBP"
	            }
	        },
	        {
	        	id: "SHIP_WORLD",
	            label: "REST OF THE WORLD",
	            type: "SHIPPING",
	            selected: false,
	            amount: {
	                value: "30.00",
	                currency_code: "GBP"
	            }
	        }
	    ]
	},
	'subscription-2': {
	    USD: [
		    {
		    	id: "SHIP_US",
		        label: "DOMESTIC",
		        type: "SHIPPING",
		        selected: true,
		        amount: {
		            value: "10.00",
		            currency_code: "USD"
		        }
			},
			{
		    	id: "SHIP_WORLD",
		        label: "ELSEWHERE",
		        type: "SHIPPING",
		        selected: false,
		        amount: {
		            value: "35.00",
		            currency_code: "USD"
		        }
			}
		], 
	    EUR: [
	        {
	        	id: "SHIP_EU",
	            label: "WITHIN EU",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "10.00",
	                currency_code: "EUR"
	            }
	        }
	    ],
	    GBP: [
	        {
	        	id: "SHIP_UK",
	            label: "WITHIN UK",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "10.00",
	                currency_code: "GBP"
	            }
	        }
	    ]
	},
	'subscription-12': {
	    USD: [
		    {
		    	id: "SHIP_US",
		        label: "DOMESTIC",
		        type: "SHIPPING",
		        selected: true,
		        amount: {
		            value: "10.00",
		            currency_code: "USD"
		        }
			},
			{
		    	id: "SHIP_WORLD",
		        label: "ELSEWHERE",
		        type: "SHIPPING",
		        selected: false,
		        amount: {
		            value: "220.00",
		            currency_code: "USD"
		        }
			}
		], 
	    EUR: [
	        {
	        	id: "SHIP_EU",
	            label: "WITHIN EU",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "10.00",
	                currency_code: "EUR"
	            }
	        }
	    ],
	    GBP: [
	        {
	        	id: "SHIP_UK",
	            label: "WITHIN UK",
	            type: "SHIPPING",
	            selected: true,
	            amount: {
	                value: "10.00",
	                currency_code: "GBP"
	            }
	        }
	    ]
	}
}

// var shippingOptions = shippingOptions_arr[type];

function expandPaypal(buttonAreaId, currency, itemName, type = ''){
	let sButtonArea = document.getElementById(buttonAreaId);
	if( sButtonArea.classList.contains('viewing-paypal') ){
		sButtonArea.classList.remove('viewing-paypal');
	}
	else
	{
		let sViewing_paypal = document.querySelector('.button-area.viewing-paypal');
		if(sViewing_paypal)
			sViewing_paypal.classList.remove('viewing-paypal');
		sButtonArea.classList.add('viewing-paypal');
	}
	let hasButton = sButtonArea.querySelector('.paypal-buttons') !== null;
	if(!hasButton){
		var thisPaypalButtonContainer = sButtonArea.querySelector('.paypal-button-container');
		var thisPrice = thisPaypalButtonContainer.getAttribute('price');
		console.log(thisPaypalButtonContainer.id);
		if(thisPaypalButtonContainer.id == 'paypal-button-container-cart')
			createCartButton();
		else
			createButton(thisPaypalButtonContainer.id, thisPrice, currency, itemName, type);
	}
}
function createButton(buttonContainerId, price, currency, itemName, type){
	// console.log('createButton . . .');
	// console.log(type);
	if(type == 'subscription')
	{
		if(itemName.indexOf('two years') !== -1){
			console.log(itemName.indexOf('two years'));
			var options = shippingOptions_arr[type + '-2'];
		}
		else if(itemName.indexOf('twelve years') !== -1)
			var options = shippingOptions_arr[type + '-12'];
	}
	else
		var options = shippingOptions_arr[type];	
	var baseAmount = parseFloat(price, 10);
	var totalValue = baseAmount + parseFloat(options[currency.toUpperCase()][0].amount.value, 10);
	var currencyUppercase = currency.toUpperCase();
	console.log(options);
	console.log(options[currencyUppercase][0].amount.value);
	console.log(totalValue);
	console.log(baseAmount);
	console.log(itemName);
	paypal.Buttons({
        createOrder: function(data, actions) {
        	console.log('createOrder . . .');
            return actions.order.create({
                // application_context: {
                //     brand_name: 'O-R-G',
                //     shipping_method: "United Postal Service"
                //     // shipping_preference: 'NO_SHIPPING'
                // },
                purchase_units: [{
                	// description: itemName,
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
								value: options[currencyUppercase][0].amount.value
							}
						}
                	},
	              	shipping: {
		              	options: options[currencyUppercase]
		            },
		            items: [{
						name: itemName, /* Shows within upper-right dropdown during payment approval */
						unit_amount: {
							currency_code: currencyUppercase,
							value: baseAmount
						},
						quantity: "1"
					}]
                }]
                
            });
        },
        onShippingChange: function (data, actions) {
			// console.log("SELECTED_OPTION", data.selected_shipping_option); // data.selected_shipping_option contains the selected shipping option
			
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
            	if(type == 'subscription')
            		var return_url = location.protocol + '//' + location.host + "/shop/subscriptions/thank-you";
            	else
            		var return_url = location.protocol + '//' + location.host + "/shop/issues/thank-you";
            	console.log(return_url);
                /* 
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                const element = document.getElementById('paypal-button-container');
                element.innerHTML = 'Thx.';
                */
                // let email = orderData.payer.email_address;
                window.location.href = return_url;
                console.log('on approve');
            });
        }

  	}).render('#' + buttonContainerId);
}

function createCartButton(){
	let sItem_row = document.getElementsByClassName('item-row');

	if(sItem_row.length > 0)
	{
		let currencyUppercase = currency.toUpperCase();
		let buttonContainerId = 'paypal-button-container-cart';
		let items = [];
		let type = '';
		let baseAmount = 0.0;
		let shipping_option_priority = {
			'subscription-12': 40,
			'subscription-2': 30,
			'issue': 20,
			'archive': 15,
			'annual': 10
		};
		[].forEach.call(sItem_row, function(el, i){
			let thisItemName = el.querySelector('.item-name').innerText;
			let thisItemPrice = el.querySelector('.item-price').innerText;
			let thisItemQuantity = el.querySelector('.item-quantity').innerText;
			let thisItem = {
				name: thisItemName, 
				unit_amount: {
					currency_code: currencyUppercase,
					value: thisItemPrice
				},
				quantity: thisItemQuantity
			};
			items.push(thisItem);

			let thisType = el.getAttribute('type');
			if(type == '')
				type = thisType;
			else 
			{
				if( typeof shipping_option_priority[thisType] === undefined )
					thisType = 'issue';
				if(shipping_option_priority[thisType] > shipping_option_priority[type])
					type = thisType;
			}

			baseAmount += parseFloat(thisItemPrice, 10) * parseInt(thisItemQuantity);

		});
		let options = shippingOptions_arr[type];
		let totalValue = baseAmount + parseFloat(options[currency.toUpperCase()][0].amount.value, 10);
		console.log('baseAmount = ' + baseAmount);
		console.log('shipping = ' + parseFloat(options[currency.toUpperCase()][0].amount.value, 10));
		console.log('totalValue = ' + totalValue);
		console.log(items);
		paypal.Buttons({
	        createOrder: function(data, actions) {
	        	console.log('createOrder . . .');
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
									value: options[currencyUppercase][0].amount.value
								}
							}
	                	},
		              	shipping: {
			              	options: options[currencyUppercase]
			            },
			            items: items
	                }]
	                
	            });
	        },
	        onShippingChange: function (data, actions) {
				// console.log("SELECTED_OPTION", data.selected_shipping_option); // data.selected_shipping_option contains the selected shipping option
				
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
	            	if(type == 'subscription')
	            		var return_url = location.protocol + '//' + location.host + "/shop/subscriptions/thank-you";
	            	else
	            		var return_url = location.protocol + '//' + location.host + "/shop/issues/thank-you";
	            	console.log(return_url);
	                /* 
	                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
	                var transaction = orderData.purchase_units[0].payments.captures[0];
	                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
	                const element = document.getElementById('paypal-button-container');
	                element.innerHTML = 'Thx.';
	                */
	                // let email = orderData.payer.email_address;
	                window.location.href = return_url;
	                console.log('on approve');
	            });
	        }

	  	}).render('#' + buttonContainerId);
	} else console.log('cart is empty');
}

