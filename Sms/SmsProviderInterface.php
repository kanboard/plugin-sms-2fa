<?php

namespace Kanboard\Plugin\SmsTwoFactor\Sms;

/**
 * SMS Provider Interface
 *
 * @package  sms
 * @author   Frederic Guillot
 */
interface SmsProviderInterface
{
    /**
     * Send SMS
     *
     * @access public
     * @param  string $to     Phone number
     * @param  string $secret Secret code
     */
    public function send($to, $secret);
}
