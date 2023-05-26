const paypal_config = {
    client_id: {
        'usd': 'AZOWN6t-ioLBjw9HiXfGexBtH5WsFqAy92SU5CTHYeX8PwBSk8j-C5LYZL0aY-f1dRRF138bGmC4KoOs',
        'eur': 'AXn_nFsUAS9wwsD7ArbuKnwPPmgsMKqxLyEIHT7d-oIEVbU-x36TMkKV7v-biQA8O3fZcycLEYvWQtBG'
    },
    currencies: {
        'eur': {
            'name'  : 'eur',
            'symbol': '€',
            'isDefault': true
        }
        // ,'usd': {
        //     'name'  : 'usd',
        //     'symbol': '$',
        //     'isDefault': false
        // }
        // ,'gbp': {
        //     'name'  : 'gbp',
        //     'symbol': '£',
        //     'isDefault': false
        // }
    }
    ,shippingOptions: {
        'default': 'book',
        'book': {
            'EUR': {
                'SHIP_EU': {
                    'id': "SHIP_EU",
                    'label': "WITHIN EU",
                    'type': "SHIPPING",
                    'selected': true,
                    'amount': {
                        'value': 10.00,
                        'currency_code': "EUR"
                    }
                },
                'SHIP_WORLD': {
                    'id': "SHIP_WORLD",
                    'label': "REST OF THE WORLD",
                    'type': "SHIPPING",
                    'selected': false,
                    'amount': {
                        'value': 40.00,
                        'currency_code': "EUR"
                    }
                }
            }
            // ,'USD': [
            //     {
            //         "id": "SHIP_US",
            //         "label": "DOMESTIC",
            //         "type": "SHIPPING",
            //         "selected": true,
            //         "amount": {
            //             'value': "10.00",
            //             'currency_code': "USD"
            //         }
            //     }
            // ]
            // ,'GBP': [
            //     {
            //         'id': "SHIP_UK",
            //         'label': "WITHIN UK",
            //         'type': "SHIPPING",
            //         'selected': true,
            //         'amount': {
            //             'value': "10.00",
            //             'currency_code': "GBP"
            //         }
            //     },
            //     {
            //         'id': "SHIP_WORLD",
            //         'label': "REST OF THE WORLD",
            //         'type': "SHIPPING",
            //         'selected': false,
            //         'amount': {
            //             'value': "30.00",
            //             'currency_code': "GBP"
            //         }
            //     }
            // ]
        },
        'print': {
            'EUR': {
                'SHIP_EU': {
                    'id': "SHIP_EU",
                    'label': "WITHIN EU",
                    'type': "SHIPPING",
                    'selected': true,
                    'amount': {
                        'value': 8.00,
                        'currency_code': "EUR"
                    }
                },
                'SHIP_WORLD': {
                    'id': "SHIP_WORLD",
                    'label': "REST OF THE WORLD",
                    'type': "SHIPPING",
                    'selected': false,
                    'amount': {
                        'value': 40.00,
                        'currency_code': "EUR"
                    }
                }
            }
            // ,'USD': [
            //     {
            //         'id': "SHIP_US",
            //         'label': "DOMESTIC",
            //         'type': "SHIPPING",
            //         'selected': true,
            //         'amount': {
            //             'value': 10.00,
            //             'currency_code': "USD"
            //         }
            //     }
                
            // ] 
            // ,'GBP': [
            //     {
            //         'id': "SHIP_UK",
            //         'label': "WITHIN UK",
            //         'type': "SHIPPING",
            //         'selected': true,
            //         'amount': {
            //             'value': 5.00,
            //             'currency_code': "GBP"
            //         }
            //     },
            //     {
            //         'id': "SHIP_WORLD",
            //         'label': "REST OF THE WORLD",
            //         'type': "SHIPPING",
            //         'selected': false,
            //         'amount': {
            //             'value': 30.00,
            //             'currency_code': "GBP"
            //         }
            //     }
            // ]
        }
    }
    ,shippingFeesByItem: {
        'EUR': {
            "SHIP_EU": {
                'book': '10.00',
                'print': '8.00',
                // 'archive': 8.00,
                // 'edition': 8.00,
                // 'subscription-2': 20.00,
                // 'subscription-12': 120.00
            },
            "SHIP_WORLD": {
                'book': '40.00',
                'print': '40.00',
                // 'archive': 40.00,
                // 'edition': 40.00
            }
        },
        // 'USD': {
        //     "SHIP_US": {
        //         'issue': 10.00,
        //         'annual': 10.00,
        //         'archive': 10.00,
        //         'edition': 10.00,
        //         'subscription-2': 20.00,
        //         'subscription-12': 120.00
        //     }
        // },
        // 'GBP': {
        //     "SHIP_UK": {
        //         'issue': 10.00,
        //         'annual': 5.00,
        //         'archive': 5.00,
        //         'edition': 5.00,
        //         'subscription-2': 20.00,
        //         'subscription-12': 120.00
        //     },
        //     "SHIP_WORLD": {
        //         'issue': 30.00,
        //         'annual': 30.00,
        //         'archive': 30.00,
        //         'edition': 30.00
        //     }
        // }
    },
    shippingFeeByAmount: {
        'EUR': {
            '8.00': {
                '1': '8.00',
                '2': '7.00',
                '3': '6.00',
                '4': '5.00',
                '5': '4.00'
            },
            '10.00': {
                '1': '10.00',
                '2': '9.00',
                '3': '8.00',
                '4': '7.00',
                '5': '6.00'
            },
            '20.00': {
                '1': '20.00',
                '2': '18.00',
                '3': '16.00',
                '4': '14.00',
                '5': '12.00'
            },
            '40.00': {
                '1': '40.00',
                '2': '37.00',
                '3': '34.00',
                '4': '31.00',
                '5': '29.00'
            },
        },
        // 'GBP': {
        //     '5.00': {
        //         '1': '5.00',
        //         '2': '4.50',
        //         '3': '3.50'
        //         // '4': '3.50',
        //         // '5': '3.50'
        //     },
        //     '10.00': {
        //         '1': '10.00',
        //         '2': '9.00',
        //         '3': '8.00',
        //         '4': '7.00',
        //         '5': '6.00'
        //     },
        //     '20.00': {
        //         '1': '20.00',
        //         '2': '18.00',
        //         '3': '16.00',
        //         '4': '14.00',
        //         '5': '12.00'
        //     },
        //     '30.00': {
        //         '1': '30.00',
        //         '2': '28.00',
        //         '3': '26.00',
        //         '4': '24.00',
        //         '5': '22.00'
        //     },
        // },
        // 'USD': {
        //     '10.00': {
        //         '1': '10.00',
        //         '2': '9.00',
        //         '3': '8.00',
        //         '4': '7.00',
        //         '5': '6.00'
        //     },
        //     '20.00': {
        //         '1': '20.00',
        //         '2': '18.00',
        //         '3': '16.00',
        //         '4': '14.00',
        //         '5': '12.00'
        //     },
        // },
    }
}
const url = new URL(window.location.href);
const searchParams = url.searchParams;
paypal_config['currency'] = searchParams['currency'] == undefined ? paypal_config['currencies']['eur'] : paypal_config['currencies'][searchParams['currency']];
paypal_config['url'] = 'https://www.paypal.com/sdk/js?client-id=' + paypal_config.client_id[paypal_config['currency']['name'].toLowerCase()] + '&disable-funding=credit,card';
paypal_config['url'] += paypal_config['currency']['name'] != 'usd' ? '&currency=' + paypal_config['currency']['name'].toUpperCase() : '';
