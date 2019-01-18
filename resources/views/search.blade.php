@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card ">
                <div class="card-header">Results of searching "{{\Request::get('search')}}"</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($stocks) == 0)
                        <p>No stocks to display</p>
                    @else
                     <?php
                      $count = 0;

                     ?>

                            <h1>Stocks that you can buy</h1>
                            <h5>Each buy operation will cost you $10.</h5>
                     @if(Session::has('success'))
                         <div class="alert alert-success">
                             <p>{{Session::get('success')}}</p>
                         </div>
                         @endif

                         @if($errors->has('error'))
                             <div class="alert alert-danger">
                                 <p>{{$errors->first('error')}}</p>
                             </div>
                         @endif
                            <table class="table table-bordered">
                                <tr>
                                    <th>
                                        <div>Company Name</div>
                                    </th>
                                    <th>
                                        <div>Ticker Symbol</div>
                                    </th>
                                    <th>
                                        <div>Currency</div>
                                    </th>
                                    <th>
                                        <div>Price In USD</div>
                                    </th>
                                    <th>
                                        <div>Buy stocks</div>
                                    </th>

                                </tr>

                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>
                                            <div>{{$stock->name}}</div>
                                        </td>
                                        <td>
                                            <div>{{$stock->symbol}}</div>
                                        </td>
                                        <td>
                                            <div>{{$stock->currency}}</div>
                                        </td>
                                        <td>
                                            <div>${{$prices[$count]}}</div>
                                        </td>
                                        <td>
                                            <form action="buy" method="POST">
                                                @csrf
                                                <input name="name" type="hidden" value={{$stock->name}}>
                                                <input name="symbol" type="hidden" value={{$stock->symbol}}>
                                                <input name="currency" type="hidden" value={{$stock->currency}}>
                                                <input name="price" type="hidden" value={{$prices[$count]}}>
                                                <input name="originalPrice" type="hidden" value="{{$originalPrices[$count]}}">
                                                <input type="number"  name="amountToBuy">
                                                <button type="submit" id="sell-stock">Buy</button>
                                            </form>
                                        </td>

                                    </tr>
                                    <?php
                                    $count++;
                                    ?>

                                @endforeach
                            </table>

                    @endif

                </div>
            </div>


        </div>
    </div>
@endsection