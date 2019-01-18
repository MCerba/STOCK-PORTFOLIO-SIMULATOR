<?php

namespace App\Http\Controllers;

use App\ApiCalls;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
use App\Stock;

/**
 * Class StockController is managing all actions linked with stocks
 * @package App\Http\Controllers
 */
class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $stocks = $request->user()->stocks()->get();
        $prices = [];

        // Find the latest closing prices

        $apiCalls = new ApiCalls();

        // Convert the prices from stored currency to USD (if applicable)
        foreach ($stocks as $stock)
        {
            if ($stock->currency !== 'USD')
            {
                $usdPrice = $stock->last_price / $apiCalls->getExchangeRate($stock->currency);

                array_push($prices, round($usdPrice, 2));

            } else
            {
                array_push($prices, $stock->last_price);
            }
        }

        return view('portfolio', [
            'stocks' => $stocks,
            'prices' => $prices
        ]);
    } // End index method

    /**
     * This function is called whenever the user clicks on the buy button. It makes some validations (check if the quantity
     * is equal to 0. It checks if the user has enough money to buy.) If the user has already the stock and can purchase
     * it will update the quantity. If the user can buy and has not the stock in his portfolio it will add a new Stock to
     * his portfolio.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buy(Request $request){
        //If the user entered a quantity of 0 then return a message showing that the quantity is invalid
        if ($request->amountToBuy == '0') {
            return Redirect::back()->withErrors(['error' => 'Quantity must be greater than 0']);
        }

        //The total price is the Quantity of stocks to buy * price of the stock + 10$ fees
        $totalPrice = ($request->price * $request->amountToBuy) + 10;

        //Get the user information
        $user = $request->user();

        //If the user doesn't have enough money then return a message showing balance insufficient
        if($user->money_left < $totalPrice){
            return Redirect::back()->withErrors(['error' => 'Your Balance is Insufficient']);
        }

        //Get the stocks that the user owns in his portfolio
        $userStocks = $user->stocks()->get();

        //Get the ticker of the stock that the user wants to buy
        $tikcerToBuy = $request->symbol;

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
                        'num_stocks' => $value->num_stocks + $request->amountToBuy,
                        'purchase_date' => $date,
                        'last_price' => $request->originalPrice
                    ]);

                //The new balance after purchasing
                $balance = round(($user->money_left - $totalPrice), 2);

                //Update the balance of the user after the purchase
                $user
                    ->where('id', $user->id)
                    ->update(['money_left' => $balance]);

                //Display that the purchase was successful
                return Redirect::back()->with(['success'=> 'Purchase Successful! Quantity for '.$tikcerToBuy. ' is now '.  ($value->num_stocks + $request->amountToBuy)]);
            }
        }//If it didn't hit the return that means that user doesn't have the stock in his portfolio

        //Check if the user has 5 different Stocks
        if (count($userStocks) != 5) {
            //Save the Stock into the database
            $date = Carbon::today();
            $user
                ->stocks()
                ->create([
                    'company_name' => $request->name,
                    'ticker_symbol' => $request->symbol,
                    'num_stocks' => $request->amountToBuy,
                    'last_price' => $request->originalPrice,
                    'currency' => $request->currency,
                    'purchase_date' => $date
                ]);

            //The new balance after purchasing
            $balance = round(($user->money_left - $totalPrice), 2);

            //Update the balance of the user after the purchase
            $user
                ->where('id', $user->id)
                ->update(['money_left' => $balance]);

            //Display that the purchase was successful
            return Redirect::back()->with(['success'=> 'Purchase Successful! ' . ($request->symbol) . ' Added to your portfolio']);

        }else{
            //Display that the user can't purchase
            return Redirect::back()->withErrors(['error' => 'You have reached your limit of 5 stocks. No more new stocks can be added.']);
        }
    }

    /**
     * This method is used to sell stocks, it updates the number of stocks in the Stock table
     * If all stocks are sold for a company it will delete the corresponding record in the database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function sell(Request $request){

        $apiCall = new ApiCalls();
        $jsonResponse = $apiCall->getStock(request('tickerSymbol'));

        if(array_key_exists("Message", $jsonResponse)){
            throw ValidationException::withMessages(["error" => "Invalid ticker symbol"])->redirectTo('/portfolio');
        }

        $userId = $request->user()->id;
        $numOfStocks = Stock::where([
            ['ticker_symbol', request('tickerSymbol')],
            ['user_id', $userId]
        ])->first()->num_stocks;
        $tickerSymbol = request('tickerSymbol');
        $lastPrice = Stock::where('ticker_symbol', $tickerSymbol)->first()->last_price;

        // Convert to USD
        $apiCall = new ApiCalls();
        $currency = Stock::where('ticker_symbol', $tickerSymbol)->first()->currency;
        $rate = $apiCall->getExchangeRate($currency);
        $lastPrice = $lastPrice/$rate;

        // Validation of form
        request()->validate([
            'amountToSell' => "required|integer|between:1, " .$numOfStocks
        ]);

        if(($request->user()->money_left + ($lastPrice * request('amountToSell')) - 10) < 0.0){
            throw ValidationException::withMessages(["error" => "Insufficient cash"])->redirectTo('/portfolio');
        }

        // Updates the number of stocks in the database
        Stock::where([
            ['ticker_symbol', request('tickerSymbol')],
            ['user_id', $userId]
        ])->update([
            'num_stocks' => $numOfStocks - request('amountToSell')
        ]);

        // Deletes the record in the Stock table when all stocks for a company are sold
        Stock::where('num_stocks', 0)->delete();

        // Update amount of money left (money made from sale - 10$ transaction fee)
        $request->user()->money_left = $request->user()->money_left + ($lastPrice * request('amountToSell')) - 10;
        $request->user()->save();

        // Redirects to the portfolio page
        return Redirect::back()->with([
            'success' => 'Transaction completed'
        ]);
    }
}// End Stock Controller class