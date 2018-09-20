<?php
    require_once('DklApiConnect.php');
    $api = new DklApiConnect('public key', 'private key');

    $data=[
            'email'=>'email@mail.ru',
            'password' => '123123'
        ];

    $respons = $api->setParams($data)->userLogin(); // Ответ API

    print_r($respons);
?>