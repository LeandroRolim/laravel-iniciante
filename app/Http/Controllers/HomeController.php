<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(string $nome, Request $request)
    {
        return "bem vindo $nome";
    }
}
