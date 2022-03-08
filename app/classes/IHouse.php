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
    public function getSequenceAccessories()
    {
        $orderObj = \DB::table('accessories')->latest('id')->first();
        if ($orderObj) {
            return $orderObj->id;
        } else {
            return 1;
        }
    }
    public function getSequenceParties()
    {
        $orderObj = \DB::table('parties')->latest('id')->first();
        if ($orderObj) {
            return $orderObj->id;
        } else {
            return 1;
        }
    }
}
