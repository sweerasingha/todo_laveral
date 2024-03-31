<?php

namespace infrastructure\Facade;
use Illuminate\Support\Facades\Facade;
use Infrastructure\FileService;

class FileFacade extends Facade{

    protected static function getFacadeAccessor(){

        return FileService::class;
    }


}
