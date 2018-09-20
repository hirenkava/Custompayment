/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*browser:true*/
/*global define*/
define(
    [		
        'Magento_Checkout/js/view/payment/default',
		'jquery'
    ],
    function (Component,$) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Hirenkava_Custompayment/payment/custompayment',
				eVoucherNumber:'',
				eVoucherAmount:''
            },
			 initObservable: function () {
                this._super()
                    .observe('eVoucherNumber');
				this._super()
                    .observe('eVoucherAmount');	
                return this;
            },
			getData: function () {
                return {
                    "method": this.item.method,
                    'evoucher': this.eVoucherNumber(),
					'voucher_amount': this.eVoucherAmount(),
                    "additional_data": null
                };

            },
            validate: function () {
                var form = 'form[data-role=custompayment-form]';
                return $(form).validation() && $(form).validation('isValid');
            },
            /** Returns send check to info */
            getMailingAddress: function() {
                return window.checkoutConfig.payment.checkmo.mailingAddress;
            },

           
        });
    }
);
