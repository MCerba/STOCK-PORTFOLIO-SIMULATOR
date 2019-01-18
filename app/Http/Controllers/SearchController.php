<?php

namespace App\Http\Controllers;
use App\ApiCalls;
use Illuminate\Http\Request;

/**
 * Class SearchController is managing all actions linked with search
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     *
     * This function is called whenever the user inter data into search field and clicks on search button.
     * It uses findStocks method in ApiCalls class to get all stocks.
     * It makes validations if stock is unavailable or price is equal to 0, this stock is removed from the list.
     *
     * @return search View and pass it array of stocks , array of prise in USD and array of original price
     */
    public function search()
    {
        //This array will contain all the stock prices is USD
        $prices = [];

        //This array will contain all the stock prices in their original currency
        $originalPrices = [];

        $stocks = \Request::get('search');

        $apiCalls = new ApiCalls();

        //This array will get all the stocks from the api
        $stocksArray = $apiCalls->findStocks($stocks);

        //This array will contain all the stock objects
        $filtered_stocks = [];

        //Loop through all the retrieved stocks
        foreach ($stocksArray as $stock){
            //If the stock information is available then retrieve the necessary information
            if ($stock->name != "N/A" && $stock->price != 0 ){

                //Add the stock to the array
                $filtered_stocks[] = $stock;

                if ($stock->currency !== 'USD')
                {
                    //Convert the price to USD
                    $usdPrice = $stock->price / $apiCalls->getExchangeRate($stock->currency);
                    //Add the converted price to the $price array
                    array_push($prices, round($usdPrice, 2));

                    //Also add the price in the original currency to the $originalPrices array
                    array_push($originalPrices, $stock->price);

                    //The currency is already in USD
                } else {
                    //Add the price to both arrays
                    array_push($prices, $stock->price);
                    array_push($originalPrices, $stock->price);
                }
            }
        }

        return view('search', [
            'stocks' => $filtered_stocks,
            'prices' => $prices,
            'originalPrices' => $originalPrices
        ]);
    }
}
