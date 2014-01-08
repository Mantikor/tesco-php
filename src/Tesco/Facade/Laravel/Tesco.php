<?php namespace Tesco\Facade\Laravel;

class Tesco extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tesco';
    }
}