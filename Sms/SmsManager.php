<?php

namespace Kanboard\Plugin\SmsTwoFactor\Sms;

use Exception;
use Kanboard\Core\Base;

/**
 * SMS Manager
 *
 * @package  sms
 * @author   Frederic Guillot
 */
class SmsManager extends Base
{
    /**
     * Sms Provider instance
     *
     * @access private
     * @var SmsProviderInterface
     */
    private $smsProvider;

    /**
     * Define the provider
     *
     * @access public
     * @param  SmsProviderInterface $provider
     */
    public function setProvider(SmsProviderInterface $provider)
    {
        $this->smsProvider = $provider;
    }

    /**
     * Send SMS
     *
     * @access public
     * @param  string $to     Phone number
     * @param  string $secret Secret code
     */
    public function send($to, $secret)
    {
        try {
            $this->logger->debug('SmsManager: Send SMS to '.$to);
            $this->smsProvider->send($to, $secret);
        } catch (Exception $e) {
            $this->logger->error('SmsManager: SMS Provider Error => '.$e->getMessage());
        }
    }
}
