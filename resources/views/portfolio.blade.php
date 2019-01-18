@extends('layouts.app')
<?php
$count = 0;
$totalPortfolio = 0;
?>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">Your Portfolio</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <?php
                            $noStock = true;
                        ?>

                        @if (count($stocks) == 0)
                            <p>No stocks to display</p>
                            <?php
                            $noStock = true;
                            ?>
                        @else

                            <h1>Stocks You Own</h1>
                            @if($errors->has('amountToSell'))
                                <tr>
                                    <div class="alert alert-danger">
                                        <p>{{$errors->first('amountToSell')}}</p>
                                    </div>
                                </tr>
                            @endif
                            @if($errors->has('error'))
                                <tr>
                                    <div class="alert alert-danger">
                                        <p>{{$errors->first('error')}}</p>
                                    </div>
                                </tr>
                            @endif
                            @if(Session::has('success'))
                                <tr>
                                    <div class="alert alert-success">
                                        <p>{{Session::get('success')}}</p>
                                    </div>
                                </tr>
                            @endif
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>
                                        <div>Company Name</div>
                                    </th>
                                    <th>
                                        <div>Ticker Symbol</div>
                                    </th>
                                    <th>
                                        <div>Amount of Stocks</div>
                                    </th>
                                    <th>
                                        <div>Currency</div>
                                    </th>
                                    <th>
                                        <div>Total Value</div>
                                    </th>
                                    <th>
                                        <div>Date of Purchase</div>
                                    </th>
                                    <th>
                                        <div>Amount of stocks to sell</div>
                                    </th>

                                </tr>
                                </thead>

                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>
                                            <div>{{$stock->company_name}}</div>
                                        </td>
                                        <td>
                                            <div>{{$stock->ticker_symbol}}</div>
                                        </td>
                                        <td>
                                            <div>{{$stock->num_stocks}}</div>
                                        </td>
                                        <td>
                                            <div>{{$stock->currency}}</div>
                                        </td>
                                        <td>

                                            <div>{{$price = $prices[$count] * $stock->num_stocks}}$ USD</div>
                                        </td>
                                        <td>
                                            <div>{{$stock->purchase_date}}</div>
                                        </td>
                                        <td>
                                            <form action="/portfolio" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="tickerSymbol" value="{{$stock->ticker_symbol}}"/>
                                                <input type="text" name="amountToSell" value="{{$stock->num_stocks}}">
                                                <button type="submit">Sell</button>
                                            </form>
                                        </td>

                                    </tr>
                                    <?php
                                        $totalPortfolio += $price;
                                        $count++;
                                        $noStock = false;
                                    ?>

                                @endforeach
                            </table>

                        @endif

                        @if($noStock == false)
                            <br>
                            <p>The total value of your portfolio is currently {{$totalPortfolio}} USD</p>
                            <p>You have {{Auth::user()->money_left}}$ USD left for your purchases</p>
                        @else
                            <br>
                            <p>The total value of your portfolio is currently 0$ USD</p>
                            <p>You have {{Auth::user()->money_left}}$ USD left for your purchases</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection