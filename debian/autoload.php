<?php

declare(strict_types=1);

require_once '/usr/share/php/Composer/InstalledVersions.php';
require_once '/usr/share/php/Ease/autoload.php';

// HSPDev\HuaweiApi — no system autoloader, register PSR-4 manually
spl_autoload_register(function (string $class): void {
    $prefix = 'HSPDev\\HuaweiApi\\';
    if (str_starts_with($class, $prefix)) {
        $file = '/usr/share/php/HuaweiApi/HSPDev/HuaweiApi/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

// SpojeNet\SmsInput — project's own classes
spl_autoload_register(function (string $class): void {
    $prefix = 'SpojeNet\\SmsInput\\';
    if (str_starts_with($class, $prefix)) {
        $file = '/usr/lib/sms-input/sms-input/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

(function (): void {
    $versions = [];
    foreach (\Composer\InstalledVersions::getAllRawData() as $d) {
        $versions = array_merge($versions, $d['versions'] ?? []);
    }
    $name    = 'unknown';
    $version = '0.0.0';
    $versions[$name] = ['pretty_version' => $version, 'version' => $version,
        'reference' => null, 'type' => 'project', 'install_path' => __DIR__,
        'aliases' => [], 'dev_requirement' => false];
    \Composer\InstalledVersions::reload([
        'root' => ['name' => $name, 'pretty_version' => $version, 'version' => $version,
            'reference' => null, 'type' => 'project', 'install_path' => __DIR__,
            'aliases' => [], 'dev' => false],
        'versions' => $versions,
    ]);
})();
