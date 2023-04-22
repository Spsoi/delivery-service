<?php

namespace App\Http\Controllers;

use App\Http\Request\Request;

class BaseController
{
    protected $request;
    protected $verification;
    protected $service;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}