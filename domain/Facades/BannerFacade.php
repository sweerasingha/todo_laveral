<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\BannerService;

class BannerFacade extends Facade{

    protected static function getFacadeAccessor(){
        return BannerService::class;
    }

}
