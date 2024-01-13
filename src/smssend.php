<?php

require_once '../vendor/autoload.php';
\Ease\Shared::init(['MODEM_PASSWORD'], isset($argv[1]) ? $argv[1] : '../.env');

$modem = new \HSPDev\HuaweiApi\Router();
$modem->setAddress(\Ease\Shared::cfg('MODEM_IP', '192.168.8.1'));
try {
    $modem->login('admin', \Ease\Shared::cfg('MODEM_PASSWORD'));
    $status = $modem->sendSms(\Ease\Shared::cfg('SMS_SENDER'), time());
} catch (\Exception $exc) {
//            $this->addStatusMessage($this->getMessage(), 'error');
//            $this->addStatusMessage($exc->getMessage(), 'debug');
    $status = false;
}
