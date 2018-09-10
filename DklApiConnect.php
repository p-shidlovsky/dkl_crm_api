<?php
namespace common\components;

// DKL API connection class, for API version 1;

class DklApiConnect
{

    private $publkey;
    private $privatekey;
    private $root_url = 'http://dklcrm.profitserver.in.ua/api/v1/';

    private $params =[];


    function __construct($publkey, $privatekey,$url=false)
    {
        $this->publkey = $publkey;
        $this->privatekey = $privatekey;
        $this->params['data'] =[];
        if($url){
            $this->root_url = $url;
        }
    }

    public function setParams($params)
    {
        $this->params['data'] = $params;
        return $this;
    }

    public function getParams()
    {
        return $this->params['data'];
    }

    public function clearParams()
    {
        $this->params['data'] = [] ;
        return $this;
    }

    //Запрос ценового предложение
    public function addRequestOrder(){
        return $this->makeRequest('ordersrequest/create');
    }

    //Вызов курьера (Заказ)
    public function addOrder(){
        return $this->makeRequest('orders/create');
    }
    
    //Получить список типов доставки
    public function getTypesList(){
        return $this->makeRequest('gettypeslist');
    }

    //Получить список причин експорта
    public function getExportCauseList(){
        return $this->makeRequest('getexportcauselist');
    }
    
    //Получить список условий експорта
    public function getExportTermsList(){
        return $this->makeRequest('getexporttermslist');
    }

    //Получить список кто оплачивает
    public function getStockPayList(){
        return $this->makeRequest('getstockpaynames');
    }

    
    
    

    public function makeRequest($path)
    {
        try {
            $data = base64_encode(json_encode($this->params['data']));
            $signature = base64_encode(sha1($this->privatekey.$data.$this->privatekey,1));
            $this->params['signature'] = $signature;

            $full_data = json_encode($this->params);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER , TRUE );
            curl_setopt($ch, CURLOPT_URL, $this->root_url.$path);
            curl_setopt($ch, CURLOPT_POST, count($full_data));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $full_data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'X-Auth-Token: '.$this->publkey,
                'Content-Type: application/json'
            ));
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        } catch (\Exception $e) {
            return false;
        }
    }


}