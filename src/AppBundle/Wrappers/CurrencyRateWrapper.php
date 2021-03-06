<?php

namespace AppBundle\Wrappers;


class CurrencyRateWrapper
{

    protected $apiUrl;

    protected $methodUrl = 'latest';

    protected $client;


    /**
     * CryptCurrencyRateWrapper constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->apiUrl = $url;
    }


    public function getRate($currencyTo)
    {
        $client = $this->client;
        $url = $this->apiUrl . $this->methodUrl .   '?base=' . $currencyTo;
        // var_dump($url); die();
        $res = $client->request('GET', $url);

        return json_decode($res->getBody());
    }

}