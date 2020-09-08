<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function customer() {
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function defaultCustomerAddress(){
        return $this->hasOne('App\Customer');
    }

    public function order(){
        return $this->hasOne('App\Order');
    }
}
