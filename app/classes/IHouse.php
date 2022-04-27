<?php


namespace App\classes;

use App\Models\Accessory;
use App\Models\Party;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class IHouse
{
    public function getSequenceProduct()
    {
        $orderObj = Product::query()->count();
        if ($orderObj == 0) {
            return $orderObj + 1;
        } else {
            return $orderObj+1;
        }
    }

    public function getSequenceAccessories()
    {
        $orderObj = Accessory::query()->count();
        if ($orderObj==0) {
            return $orderObj + 1;
        } else {
            return $orderObj+1;
        }
    }

    public function getSequenceParties()
    {
        $orderObj = Party::query()->count();
        if ($orderObj==0) {
            return $orderObj + 1;
        } else {
            return $orderObj+1;
        }
    }
    public function getSequenceSuppliers()
    {
        $orderObj = Supplier::query()->count();
        if ($orderObj==0) {
            return $orderObj + 1;
        } else {
            return $orderObj+1;
        }
    }

    public function city()
    {
        return DB::table('cities')->whereNull("city_id")->pluck("name", "id");
    }
    public function country()
    {
        return DB::table('cities')->where("city_id",10)->pluck("name", "id");
    }



}
