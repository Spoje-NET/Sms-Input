<?php

declare(strict_types=1);

/**
 * Modem Handler
 *
 * @author     Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright  2024 Vitex Software
 */

namespace SpojeNet\SmsInput;

/**
 * Description of Modem
 *
 * @author vitex
 */
class Modem extends \HSPDev\HuaweiApi\Router
{
    use \Ease\Logger\Logging;

    /**
     *
     *
     * @param int $howMuch
     *
     * @return \SpojeNet\SmsInput\Sms
     */
    public function getMessages($howMuch = 20)
    {
        $messages = [];
        $msgResponse = json_decode(json_encode($this->getSms(1, $howMuch)), true);
        if (array_key_exists('code', $msgResponse)) {
            $this->addStatusMessage(self::$errors[(string) $msgResponse['code']], 'warning');
        }
        $entries = (array_key_exists('Messages', $msgResponse) ? (array_keys($msgResponse['Messages']['Message'])[0] == 0 ? $msgResponse['Messages']['Message'] : [$msgResponse['Messages']['Message']] ) : []);
        foreach ($entries as $message) {
            $messages[] = new Sms(
                $message['Smstat'],
                $message['Index'],
                $message['Phone'],
                $message['Content'],
                $message['Date'],
                $message['Sca'],
                $message['SaveType'],
                $message['Priority'],
                $message['SmsType']
            );
        }

        return $messages;
    }
}
