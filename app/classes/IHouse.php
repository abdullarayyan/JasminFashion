<?php


namespace App\classes;

class IHouse
{
    public function getSequenceProduct()
    {
        $orderObj = \DB::table('products')->latest('id')->first();
        if ($orderObj) {
            return $orderObj->id;
        } else {
            return 1;
        }
    }
}
