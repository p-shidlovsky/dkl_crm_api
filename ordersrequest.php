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
        'insurance' => 1,
        'insurance_price' => 10.2,
        'items_count' => 3,
        'items_totalweight' => 34,
        'items_type' => 1,
        'items_params' => '3-5-7',
        'items_price' => 342,
        'client_comment' => 'Комментарий (text)',
    ];

    $types_list = $api->getTypesList();
    $respons = $api->setParams($data)->addRequestOrder();

    print_r($types_list);
    print_r($respons);
?>