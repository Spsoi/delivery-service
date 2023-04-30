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

    public function getJsonStream()
    {
        $json = file_get_contents('php://input');
        return json_decode($json);
    }

    public function getArrayStream()
    {
        $json = file_get_contents('php://input');
        return json_decode($json, true);
    }

    public function getObjectStream()
    {
        $json = file_get_contents('php://input');
        return json_decode($json);
    }
}