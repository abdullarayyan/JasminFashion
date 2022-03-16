<?php


namespace App\classes;

use App\Models\Accessory;
use App\Models\Party;
use App\Models\Product;

class IHouse
{
    public function getSequenceProduct()
    {
        $orderObj = Product::query()->count();
        if ($orderObj) {
            return $orderObj+1;
        } else {
            return 1;
        }
    }
    public function getSequenceAccessories()
    {
        $orderObj = Accessory::query()->count();
        if ($orderObj) {
            return $orderObj+1;
        } else {
            return 1;
        }
    }
    public function getSequenceParties()
    {
        $orderObj = Party::query()->count();
        if ($orderObj) {
            return $orderObj+1;
        } else {
            return 1;
        }
    }
}
