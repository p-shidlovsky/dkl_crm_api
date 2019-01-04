<?php
    require_once('DklApiConnect.php');
    $api = new DklApiConnect('public key', 'private key');

   $data=[
            //Отправитель
            'name'=>'Имя, фамилия запрашивающего (text)',
            'company'=>'Наименование фирмы запрашивающего (text)',
            'email'=>'test@test.ru',
            'phone'=>'+123123',
            'city_from'=>'Город отправителя (text)',
            'address_from'=>'Адрес отправителя (text)',
            'region_from'=>'Регион/Штат отправителя (text)',
            'country_from'=>'Страна отправителя (text)',
            'zip_code_from'=>'Почтовый индекс отправителя (text)',
            //Получатель
            'name_receiver' => 'ФИО получателя',
            'company_receiver' => 'Фирма получателя',
            'email_receiver' => 'Email получателя',
            'phone_receiver' => 'Email получателя',
            'city_to'=>'Город получателя (text)',
            'address_to'=>'Адрес получателя (text)',
            'region_to'=>'Регион/Штат получателя (text)',
            'country_to'=>'Страна получателя (text)',
            'zip_code_to'=>'Почтовый индекс получателя (text)',
            //Информация о доставке
            'type'=>'4_air_freight_door_to_airport', // Список получаем через метод - getTypesList()
            'insurance'=>1,
            'insurance_price'=>10.2,
            'insurance_currency'=>'$',
            'export_cause' => 'samples_for_testing_only', // Список получаем через метод - getExportCauseList()
            'export_terms' => 'FAS', // Список получаем через метод - getExportTermsList()
            'stock_pay_type' => 1,
            'stock_pay' => '3_THIRDSIDE', // Список получаем через метод - getStockPayList()
            //Данные плательщика 3-тья сторона
            'thirdside_name' => 'ФИО',
            'thirdside_company' => 'Фирма',
            'thirdside_email' => 'Email',
            'thirdside_phone' => '+123123',
            'thirdside_city' => 'Город',
            'thirdside_address' => 'Адрес',
            'thirdside_region' => 'Регион',
            'thirdside_country' => 'Страна',
            'thirdside_zip_code' => 'Почтовый индекс',
            //Информация о доставке
            'stock_delivery_fact_pay' => 1, //Оплата по факту доставки
            'stock_price'=>34.12,
            'stock_price_currency'=>'$',
            'pickup_date'=>'22.06.2018',
            'pickup_timefrom'=>'12:45',
            'pickup_timeto'=>'15:55',
            'stock_comment'=>'Коментарий, спец. информация',
            'items' => [
                ['client_comment'=>'Комент','items_type'=>1,'delivery_type'=>'package','items_count'=>12,'items_weight'=>44,'items_length'=>5,'items_width'=>54,'items_height'=>9,'items_price'=>49,'items_price_currency'=>'USD'],
                ['client_comment'=>'Комент 2','items_type'=>0,'delivery_type'=>'pallet','items_count'=>120,'items_weight'=>440,'items_length'=>500,'items_width'=>540,'items_height'=>900,'items_price'=>490,'items_price_currency'=>'EUR'],
            ],
        ];


        $files = [
          ['path'=>'path_to_file/image.png','name'=>'image.png'],
          ['path'=>'path_to_file/image2.png','name'=>'image2.png'],
        ];

        $export_cause_list = $api->getExportCauseList(); // Список причин експорта
        $export_terms_list = $api->getExportTermsList(); // Список условий експорта
        $stock_pay_list = $api->getStockPayList(); // Список условий експорта
        $types_list = $api->getTypesList(); // Список тип услуги
        $deliverytypes_list = $api->getDeliveryTypeList(); // Список тип отправления посылки
        $respons = $api->setParams($data)->setFiles($files)->addOrder(); // Ответ API при создании вызова курьера(заказа)

        print_r(json_decode($respons));
?>