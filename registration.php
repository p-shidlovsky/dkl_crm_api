<?php
    require_once('DklApiConnect.php');
    $api = new DklApiConnect('public key', 'private key');

    $data=[
            'email'=>'email@mail.ru',
            'password' => '123123',
            'login' => 'API USER CREATE',
            'phone' => '123123123',
            'company' => 'Компания',
            'city' => 'Город',
            'country' => 'Страна',
            'address' => 'Адрес',
            'region' => 'Регион',
            'zip_code' => 'Индекс',
            'registration_code' => 'Код',
    ];

    $respons = $api->setParams($data)->userRegister(); // Ответ API

    print_r($respons);
?>