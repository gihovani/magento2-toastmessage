define([
    'jquery',
    'uiComponent',
    'ko',
    'underscore',
    'Magento_Customer/js/customer-data',
    'jquery/jquery-storageapi',
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
            settings: {}
        },
        initialize: function () {
            this._super();
            const self = this;
            this.displayMessage($.cookieStorage.get('mage-messages'));
            customerData.get('messages').subscribe(function (data) {
                if ('messages' in data) {
                    self.displayMessage(data.messages);
                    customerData.set('messages', {});
                }
            });

            this.clearCookie();
        },
        clearCookie: function () {
            $.mage.cookies.set('mage-messages', '', {
                samesite: 'strict',
                domain: ''
            });
        },
        displayMessage: function (messages) {
            const self = this;
            if (!_.isEmpty(messages) && messages.hasOwnProperty('text')) {
                self.toast(messages);
                return;
            }

            messages = _.unique(messages, 'text');
            if (!_.isEmpty(messages) && messages.length > 0) {
                $(messages).each(function (index, message) {
                    self.toast(message);
                });
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
