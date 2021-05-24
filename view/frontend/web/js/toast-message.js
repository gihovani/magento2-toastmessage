/**
 * Copyright GG2. All rights reserved.
 */

define([
    'jquery',
    'uiComponent',
    'ko',
    'underscore',
    'Magento_Customer/js/customer-data',
    'jquery/jquery-storageapi',
    'mage/cookies',
    'Gg2_ToastMessage/js/bootoast'
], function (
    $,
    Component,
    ko,
    _,
    customerData
) {
    'use strict'

    return Component.extend({
        defaults: {
            settings: {
                'success': {'position': 'top-center'}
            },
            messages: [],
            post_messages: []
        },
        initialize: function () {
            this._super();
            const self = this;
            this.displayMessage($.cookieStorage.get('mage-messages'));
            this.messages = customerData.get('messages').subscribe(function (messages) {
                if (messages && messages.messages) {
                    self.displayMessage(messages.messages);
                }
            });
        },
        displayMessage: function (messages) {
            const self = this;
            messages = _.unique(messages, 'text');
            if (!_.isEmpty(messages) && messages.length > 0) {
                $(messages).each(function (index, message) {
                    self.toast(message);
                });
                $.cookieStorage.set('mage-messages', '');
                customerData.set('messages', {});
            }
        },
        toast: function (message) {
            let toastConf = {};
            if (this.settings.hasOwnProperty(message.type)) {
                toastConf = this.settings[message.type];
            } else {
                toastConf = this.settings['info'];
            }
            if (!toastConf.icon) {
                delete toastConf.icon;
            }
            if (!toastConf.heading) {
                delete toastConf.heading;
            }

            setTimeout(function () {
                toastConf.text = message.text;
                toastConf.stack = 1;
                $.toast(toastConf);
            }, 0);
        }
    });
});
