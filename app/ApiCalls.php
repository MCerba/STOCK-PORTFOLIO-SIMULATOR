<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiCalls
{
    function __construct()
    { }

    /**
     * @param $currency String which represents currency
     * @return rate - double which represents currency rate
     */
    public function getExchangeRate ($currency)
    {
        if ($currency == "GBX") {
            $currency = "GBP";
        }

        $conversion = "USD" . $currency;
        $url = "https://www.freeforexapi.com/api/live?pairs=" . $conversion;
        $result = file_get_contents($url);
        $jsonObj = json_decode($result);

        $rate = $jsonObj->rates->$conversion->rate;

        return $rate;
    }

    /**
     * @param $searchString - string to make a coll to the search API
     * @return array if json objects which represents stocks
     */
    public function findStocks($searchString)
    {
        $token = "MvYBAarExo6Nf1oj6q7Ta6KT6mH7nLtgxr4Zw6xkJwhLwslp2DbVZoIBfGqx";
        $url = "https://www.worldtradingdata.com/api/v1/stock_search?search_term=" . $searchString . "&search_by=symbol&limit=50&page=1&api_token=" .$token;

        $result = file_get_contents($url);
        $jsonObj = json_decode($result);

        return $jsonObj->data;
    }

    /**\
     * @param $ticker particular ticker to find the stock
     * @return jsonObj representing the stock
     */
    public function getStock($ticker)
    {
        $url = "https://www.worldtradingdata.com/api/v1/stock?symbol=" . $ticker . "&api_token=" .
            "MvYBAarExo6Nf1oj6q7Ta6KT6mH7nLtgxr4Zw6xkJwhLwslp2DbVZoIBfGqx";

        $result = file_get_contents($url);
        $jsonObj = json_decode($result);

        return $jsonObj;
    }


}