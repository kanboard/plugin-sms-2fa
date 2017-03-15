<?php

namespace Kanboard\Plugin\SmsTwoFactor\Auth;

use Kanboard\Core\Base;
use Kanboard\Core\Security\PostAuthenticationProviderInterface;

/**
 * SMS Authentication Provider
 *
 * @package  auth
 * @author   Frederic Guillot
 */
class SmsAuth extends Base implements PostAuthenticationProviderInterface
{
    /**
     * User pin code
     *
     * @access private
     * @var string
     */
    private $code = '';

    /**
     * Get authentication provider name
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return t('SMS - Text Message');
    }

    /**
     * Authenticate the user
     *
     * @access public
     * @return boolean
     */
    public function authenticate()
    {
        if ($this->sessionStorage->smsTwoFactorSecret === (int) $this->code) {
            unset($this->sessionStorage->smsTwoFactorSecret);
            return true;
        }

        return false;
    }

    /**
     * Called before to prompt the user
     *
     * @access public
     */
    public function beforeCode()
    {
        $this->sessionStorage->smsTwoFactorSecret = random_int(100000, 999999);
        $to = $this->userMetadataModel->get($this->userSession->getId(), 'phone_number');
        $this->container['smsManager']->send($to, $this->sessionStorage->smsTwoFactorSecret);
    }

    /**
     * Set validation code
     *
     * @access public
     * @param  string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Generate secret
     *
     * @access public
     * @return string
     */
    public function generateSecret()
    {
        return '';
    }

    /**
     * Set secret token
     *
     * @access public
     * @param  string  $secret
     */
    public function setSecret($secret)
    {
    }

    /**
     * Get secret token
     *
     * @access public
     * @return string
     */
    public function getSecret()
    {
        return '';
    }

    /**
     * Get key url (empty if no url can be provided)
     *
     * @access public
     * @param  string $label
     * @return string
     */
    public function getKeyUrl($label)
    {
        return '';
    }
}
