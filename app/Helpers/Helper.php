<?php

function format_price($value)
{

    $currency = \App\Models\Country::where('currency_code', \App\Models\Config::getByName('currency'))->first();

    if(!$currency) return $value;

    if($currency->currency_code == 'USD') {
        return $currency->currency_symbol.$value;
    } else if($currency->currency_code == 'RSD') {
        return $value.' din';
    }

    return $value;

}
