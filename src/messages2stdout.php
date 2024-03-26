<?php

require_once '../vendor/autoload.php';
\Ease\Shared::init(['MODEM_PASSWORD'], isset($argv[1]) ? $argv[1] : '../.env');

$modem = new \SpojeNet\SmsInput\Modem();
$modem->setAddress(\Ease\Shared::cfg('MODEM_IP', '192.168.8.1'));
try {
    $modem->login('admin', \Ease\Shared::cfg('MODEM_PASSWORD'));
    $smsCount = $modem->getSmsCount();
    if ($smsCount->LocalInbox) {
        $messageData = [];
        foreach ($modem->getMessages($smsCount->LocalInbox) as $message) {
            $messageData[] = $message->getData();
        }
        echo json_encode($messageData, \Ease\Shared::cfg('DEBUG') ? JSON_PRETTY_PRINT : 0);
    }
} catch (\Exception $exc) {
    $modem->addStatusMessage($exc->getMessage(), 'debug');
    $modem->addStatusMessage($modem->getStatus(), 'error');
    $status = false;
}
