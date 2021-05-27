/**
 * Copyright GG2. All rights reserved.
 */
define([
    'ko',
    'jquery',
    'uiComponent',
    'Magento_Ui/js/model/messageList',
    'underscore',
    'Gg2_ToastMessage/js/bootoast'
], function (ko, $, Component, uiMessageList, _) {
    'use strict'

    return Component.extend({
        defaults: {
            selector: '[data-role=checkout-messages]',
            settings: window.checkoutConfig.toastMessageSettings
        },

        /** @inheritdoc */
        initialize: function (config, messageContainer) {
            this._super();
            const self = this;

            this.messageContainer = messageContainer || config.messageContainer || uiMessageList;
            this.messageContainer.getErrorMessages().subscribe(function (data) {
                self.displayMessage(data, 'error');
            });
            this.messageContainer.getSuccessMessages().subscribe(function (data) {
                self.displayMessage(data, 'success');
            });

            return this;
        },
        displayMessage: function (messages, type) {
            const self = this;
            messages = _.unique(messages, 'text');
            if (!_.isEmpty(messages) && messages.length > 0) {
                $(messages).each(function (index, message) {
                    self.toast({'text': message, 'type': type});
                });
            }
        },
        toast: function (message) {
            let toastConf = this.settings[message.type];
            setTimeout(function () {
                toastConf.text = message.text;
                toastConf.stack = 1;
                $.toast(toastConf);
            }, 0);
        }
    });
});
