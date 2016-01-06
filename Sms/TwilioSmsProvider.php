<?php

namespace Kanboard\Plugin\SmsTwoFactor\Sms;

require_once __DIR__.'/../vendor/Twilio/Services/Twilio.php';

use Services_Twilio;

/**
 * Twilio SMS Provider
 *
 * @package  sms
 * @author   Frederic Guillot
 */
class TwilioSmsProvider implements SmsProviderInterface
{
    /**
     * Account SID
     *
     * @access private
     * @var string
     */
    private $accountSid = '';

    /**
     * Auth Token
     *
     * @access private
     * @var string
     */
    private $authToken = '';

    /**
     * Twilio phone number
     *
     * @access private
     * @var string
     */
    private $from = '';

    /**
     * Constructor
     *
     * @access public
     * @param  string $accountSid
     * @param  string $authToken
     * @param  string $from
     */
    public function __construct($accountSid, $authToken, $from)
    {
        $this->accountSid = $accountSid;
        $this->authToken = $authToken;
        $this->from = $from;
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
        $client = new Services_Twilio($this->accountSid, $this->authToken);
        $client->account->messages->sendMessage($this->from, $to, t('Kanboard code: %d', $secret));
    }
}
