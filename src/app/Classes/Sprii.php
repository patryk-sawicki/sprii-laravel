<?php

namespace PatrykSawicki\SpriiApi\app\Classes;

class Sprii
{
    public static function products(): Products
    {
        return new Products();
    }

    public static function orders(): Orders
    {
        return new Orders();
    }
}