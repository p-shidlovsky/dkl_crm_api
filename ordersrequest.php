<?php
    require_once('DklApiConnect.php');
    $api = new DklApiConnect('public key', 'private key');

    $data = [
        'name' => 'Имя, фамилия запрашивающего (text)',
        'company' => 'Наименование фирмы запрашивающего (text)',
        'email' => 'test@test.com',
        'phone' => '+123123123',
        'city_from' => 'Город отправителя (text)',
        'region_from' => 'Регион/Штат отправителя (text)',
        'country_from' => 'Страна отправителя (text)',
        'zip_code_from' => 'Почтовый индекс отправителя (text)',
        'city_to' => 'Город получателя (text)',
        'region_to' => 'Регион/Штат получателя (text)',
        'country_to' => 'Страна получателя (text)',
        'zip_code_to' => 'Почтовый индекс получателя (text)',
        'type' => '4_air_freight_door_to_airport',
        'insurance'=>1,
        'insurance_price'=>10.2,
        'insurance_currency'=>'$',
        'items_totalweight'=>34,
        'items_price'=>342,
        'client_comment'=>'Комментарий (text)Комментарий (text)Комментарий (text)Комментарий (text)Комментарий (text)Комментарий (text)',
        'items' => [
            ['client_comment'=>'Комент','items_type'=>1,'delivery_type'=>'package','items_count'=>12,'items_weight'=>44,'items_length'=>5,'items_width'=>54,'items_height'=>9,'items_price'=>49,'items_price_currency'=>'USD'],
            ['client_comment'=>'Комент 2','items_type'=>0,'delivery_type'=>'pallet','items_count'=>120,'items_weight'=>440,'items_length'=>500,'items_width'=>540,'items_height'=>900,'items_price'=>490,'items_price_currency'=>'EUR'],
        ],
    ];

    $types_list = $api->getTypesList();
    $respons = $api->setParams($data)->addRequestOrder();

    print_r($types_list);
    print_r($respons);
?>