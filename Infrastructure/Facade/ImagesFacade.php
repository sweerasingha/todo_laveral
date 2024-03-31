<?php

namespace infrastructure\Facade;
use Illuminate\Support\Facades\Facade;
use Infrastructure\Images;

class ImagesFacade extends Facade{

    protected static function getFacadeAccessor(){

        return Images::class;
    }


}
