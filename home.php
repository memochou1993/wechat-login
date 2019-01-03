<?php

echo (new \SimpleSoftwareIO\QrCode\BaconQrCodeGenerator)->size($config['qrcode.size'])->generate($config['qrcode.link']);
