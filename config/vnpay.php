<?php

// config/vnpay.php
return [
    'vnp_TmnCode' => '2QXUI4J4',
    'vnp_HashSecret' => 'A1B2C3D4E5F6G7H8I9J0',
    'vnp_Url' => 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html',
    'vnp_ReturnUrl' => env('APP_URL') . '/vnpay/return',
];
