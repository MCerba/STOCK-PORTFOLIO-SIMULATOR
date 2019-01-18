<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['id', 'user_id', 'company_name', 'ticker_symbol', 'num_stocks', 'last_price', 'currency', 'purchase_date'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
