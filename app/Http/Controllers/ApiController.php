<?php

namespace App\Http\Controllers;

use App\ApiCalls;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//use App\Stock;

/**
 * Class ApiController is used to manage All API requests
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    public function getAllStocks(Request $request)
    {
        $user = auth('api')->user();

        if(!$user) {
            return response()->json(['error' => 'invalid_token'], 401);
        } else {


            $stocks = $user->stocks()->get();

            $apiCalls = new ApiCalls();
            $prices = [];

            foreach($stocks as $stock) {
                if ($stock->currency !== 'USD')
                {
                    $usdPrice = $stock->last_price / $apiCalls->getExchangeRate($stock->currency);

                    array_push($prices, round($usdPrice, 2));

                } else
                {
                    array_push($prices, $stock->last_price);
                }
            }

            return response()->json(['stocks' => $stocks, 'prices' => $prices], 200);
        }
    }

    /**
     * This function responsible for manage user money information
     * It makes user Authentication validation
     *
     * @param Request $request Type - GET
     * @return \Illuminate\Http\JsonResponse
     * If user Authentication validation was not passed it returns
     * json object with tha pair 'error' => 'invalid_token' and status code is 401
     * It Authentication validation was passed it returns
     * json object with tha pair 'cash'  and his actual money_left from DB , status code is 200
     */
    public function getCash(Request $request)
    {
        //$user is  null if it not  pass validation
        $user = auth('api')->user();

        //If the user doesn't exist return Error Response 401
        if(!$user) {
            return response()->json(['error' => 'invalid_token'], 401);
        } else {
            //If the user exists return it money_left from DB
            $cash = $user->money_left;
            return response()->json(['cash' => $cash], 200);
        }
    }

    /**
     * This function makes some validations (check if the quantity is equal to 0. It checks if the user has enough
     * money to buy. If the user has already the stock and can purchase it will update the quantity. If the user
     * can buy and has not the stock in his portfolio it will add a new Stock to his portfolio.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function buy(Request $request)
    {
        $apiCall = new ApiCalls();

        $user = auth('api')->user(); //returns null if not valid

        //If the user doesn't exist return Error Response 401
        if (!$user){
            return response()->json(['error' => 'invalid_token'], 401);
        }else {
            //Fetch the stock that user request
            $jsonObj = $apiCall->getStock($request->ticker);

            //If the user entered a quantity of 0 or the ticker doesn't exist return Error Response 400
            if ($request->quantity == '0' || array_key_exists("Message", $jsonObj)) {
                return response()->json(['error' => 'invalid ticker or quantity'], 400);
            }

            //Check the currency. If the Stock is in USD so no need to convert
            if($jsonObj->data[0]->currency == 'USD'){
                //The total price is the Quantity of stocks to buy * price of the stock + 10$ fees
                $totalPrice = ($jsonObj->data[0]->price * $request->quantity) + 10;
            }else{
                //If the Stock is not in USD than convert it to USD
                $totalPrice = ($jsonObj->data[0]->price * $request->quantity) / $apiCall->getExchangeRate($jsonObj->data[0]->currency) + 10;
            }

            //If the user doesn't have enough money, then return Error Response 403
            if($user->money_left < $totalPrice){
                return response()->json(['error' => 'insufficient cash'], 403);
            }

            //Get the stocks that the user owns in his portfolio
            $userStocks = $user->stocks()->get();

            //Get the ticker of the stock that the user wants to buy
            $tikcerToBuy = $jsonObj->data[0]->symbol;

            //Loop through the stocks that user owns in his portfolio
            foreach ($userStocks as $value) {
                //If the user already have the stock in his portfolio
                if($value->ticker_symbol == $tikcerToBuy){
                    //Update the stock of the user
                    $date = Carbon::today();
                    $user
                        ->stocks()
                        ->where('id', $value->id)
                        ->update([
                        'num_stocks' => $value->num_stocks + $request->quantity,
                        'purchase_date' => $date,
                        'last_price' => $jsonObj->data[0]->price
                    ]);

                    //The new balance after purchasing
                    $balance = round(($user->money_left - $totalPrice), 2);

                    //Update the balance of the user after the purchase
                    $user
                        ->where('id', $user->id)
                        ->update(['money_left' => $balance]);

                    //Return a Success Response with the cash left and a Status Code of 200
                    return response()->json(['cashleft' => $balance], 200);
                }
            }//If it didn't hit the return that means that user doesn't have the stock in his portfolio

            //Check if the user has 5 different Stocks
            if (count($userStocks) != 5) {
                //Save the Stock into the database
                $date = Carbon::today();
                $user
                    ->stocks()
                    ->create([
                    'company_name' => $jsonObj->data[0]->name,
                    'ticker_symbol' => $jsonObj->data[0]->symbol,
                    'num_stocks' => $request->quantity,
                    'last_price' => $jsonObj->data[0]->price,
                    'currency' => $jsonObj->data[0]->currency,
                    'purchase_date' => $date
                ]);

                //The new balance after purchasing
                $balance = round(($user->money_left - $totalPrice), 2);

                //Update the balance of the user after the purchase
                $user
                    ->where('id', $user->id)
                    ->update(['money_left' => $balance]);

                //Return a Success Response with the cash left and a Status Code of 200
                return response()->json(['cashleft' => $balance], 200);

            }else{
                return response()->json(['error' => 'Already Have 5 stock'], 403);
                //What do we return as a Response if the user has already 5 different stocks and he wants to add a new one
            }
        }
    }

    /**
     *
     * This function implements sell stocks depending on ticker and quantity from the $request variable.
     * It checks if the user has enough
     * stocks to sell. If the user has enough stock to sell it will update the quantity.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sell(Request $request)
    {
        $tickerSymbol = $request->ticker;
        $quantity = $request->quantity;

        $user = auth('api')->user();

        // Return error 401 if $user is null
        if(!$user){
            return response()->json(['error' => 'invalid_token'], 401);
        }
        else{
            $apiCall = new ApiCalls();
            $jsonResponse = $apiCall->getStock($tickerSymbol);

            // Invalid ticker symbol
            if(array_key_exists("Message", $jsonResponse)){
                return response()->json(['error' => 'invalid ticker or quantity'], 400);
            }

            //Get the stocks that the user owns in his portfolio
            $userStocks = $user->stocks()->get();

            foreach($userStocks as $stock){
                if($stock->ticker_symbol == $tickerSymbol){
                    // Retrieving users' number of stocks for that company
                    $numOfStocks = $user->stocks()->where('ticker_symbol', $tickerSymbol)->first()->num_stocks;

                    // Invalid quantity
                    if($quantity <= 0 || $quantity > $numOfStocks){
                        return response()->json(['error' => 'invalid ticker or quantity'], 400);
                    }

                    // Convert stock price to USD
                    $lastPrice = $user->stocks()->where('ticker_symbol', $tickerSymbol)->first()->last_price;
                    $apiCall = new ApiCalls();
                    $currency = $user->stocks()->where('ticker_symbol', $tickerSymbol)->first()->currency;
                    $rate = $apiCall->getExchangeRate($currency);
                    $lastPrice = $lastPrice/$rate;

                    // Check for insufficient cash
                    if(($user->money_left + ($lastPrice * request('amountToSell')) - 10) < 0.0){
                        return response()->json(['error' => 'insufficient cash'], 403);
                    }

                    // Updates the number of stocks in the database
                    $user->stocks()->where('id', $stock->id)->update([
                        'num_stocks' => $numOfStocks - $quantity
                    ]);

                    // Deletes the record in the Stock table when all stocks for a company are sold
                    $user->stocks()->where('num_stocks', 0)->delete();

                    // Update amount of money left (money made from sale - 10$ transaction fee)
                    $user->money_left = $user->money_left + ($lastPrice * $request->quantity) - 10;
                    $user->save();

                    //Return a Success Response with the cash left and a Status Code of 200
                    return response()->json(['cashleft' => $user->money_left], 200);
                }
            }
            return response()->json(['error' => 'invalid ticker or quantity'], 400);
        }
    }
} // End ApiController