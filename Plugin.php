<?php

namespace Kanboard\Plugin\SmsTwoFactor;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Plugin\SmsTwoFactor\Auth\SmsAuth;
use Kanboard\Plugin\SmsTwoFactor\Sms\SmsManager;
use Kanboard\Plugin\SmsTwoFactor\Sms\TwilioSmsProvider;

class Plugin extends Base
{
    public function initialize()
    {
        $this->container['smsManager'] = function ($container) {
            $sms = new SmsManager($container);
            $sms->setProvider(new TwilioSmsProvider(
                $container['config']->get('twilio_account_sid'),
                $container['config']->get('twilio_auth_token'),
                $container['config']->get('twilio_from_number')
            ));

            return $sms;
        };

        $this->authenticationManager->register(new SmsAuth($this->container));

        $this->template->hook->attach('template:config:integrations', 'SmsTwoFactor:config/integration');
        $this->template->hook->attach('template:user:integrations', 'SmsTwoFactor:user/integration');
    }

    public function onStartup()
    {
        Translator::load($this->language->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'SMS Two-Factor Authentication';
    }

    public function getPluginDescription()
    {
        return t('SMS text messages for two-factor authentication');
    }

    public function getPluginAuthor()
    {
        return 'Frédéric Guillot';
    }

    public function getPluginVersion()
    {
        return '1.0.1';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/kanboard/plugin-sms-2fa';
    }
}
