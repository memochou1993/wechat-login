<?php

require __DIR__ . '/vendor/autoload.php';

$config = [
    'home' => 'home',
    'wechat.config' => 'wechat.json',
    'qrcode.size' => 500,
    'qrcode.link' => 'http://' . $_SERVER['HTTP_HOST'] . '/?page=login',
];

$wechat = json_decode(file_get_contents($config['wechat.config']), true);

$app = \EasyWeChat\Factory::officialAccount([
    'app_id' => $wechat['app_id'],
    'secret' => $wechat['secret'],
    'token' => $wechat['token'],
    'oauth' => [
        'scopes'   => explode(',', $wechat['oauth']['scopes']),
        'callback' => $wechat['oauth']['callback'],
    ],
    'log' => [
        'level' => $wechat['log']['level'],
        'file' => __DIR__ . '/' . $wechat['log']['file'],
    ],
]);

include ($_GET['page'] ?? $config['home']) . '.php';
