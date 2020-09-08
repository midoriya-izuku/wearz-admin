<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers'; // add this line with your table name

    protected $with = ['defaultAddress','orders'];
    public function addresses(){
        return $this->hasMany('App\Address');
    }

    public function defaultAddress(){
        return $this->belongsTo('App\Address','address_id');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
