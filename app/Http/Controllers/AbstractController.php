<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;

abstract class AbstractController extends Controller
{
    protected $classe;
}