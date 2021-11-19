<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use F9Web\ApiResponseHelpers;


class Controller extends BaseController
{
    use ApiResponseHelpers;

    public function __construct()
    {
        app()->setLocale('en');
        $this->setDefaultSuccessResponse([]);
    }
}
