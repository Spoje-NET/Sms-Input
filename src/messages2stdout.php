<?php

declare(strict_types=1);

/**
 * This file is part of the SmsInput package
 *
 * https://github.com/Spoje-NET/Sms-Input
 *
 * (c) SpojeNetIT s.r.o. <http://spojenet.it/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once '../vendor/autoload.php';
\Ease\Shared::init(['MODEM_PASSWORD'], $argv[1] ?? '../.env');

$modem = new \SpojeNet\SmsInput\Modem();
$modem->setAddress(\Ease\Shared::cfg('MODEM_IP', '192.168.8.1'));

try {
    $modem->login('admin', \Ease\Shared::cfg('MODEM_PASSWORD'));
    $smsCount = $modem->getSmsCount();

    if ((int) $smsCount->LocalInbox) {
        $messageData = [];

        foreach ($modem->getMessages($smsCount->LocalInbox) as $message) {
            $modem->deleteSms($message->getData()['index']);
            $messageData[] = $message->getData();
        }

        echo json_encode($messageData, \Ease\Shared::cfg('DEBUG') ? \JSON_PRETTY_PRINT : 0);
    }
} catch (\Exception $exc) {
    $modem->addStatusMessage($exc->getMessage(), 'debug');
    $modem->addStatusMessage($modem->getStatus(), 'error');
    $status = false;
}
