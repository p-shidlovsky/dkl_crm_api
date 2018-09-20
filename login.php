<?php
    require_once('DklApiConnect.php');
    $api = new DklApiConnect('public key', 'private key');

    $data=[
            'email'=>'p_shidlovsky@mail.ru1233',
            'password' => '123123'
        ];

    $respons = $api->setParams($data)->userLogin(); // Ответ API

    print_r($respons);
?>