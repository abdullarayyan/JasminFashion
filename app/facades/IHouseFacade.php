<?php


namespace App\facades;


use Illuminate\Support\Facades\Facade;

class IHouseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ihouse';
    }
}
