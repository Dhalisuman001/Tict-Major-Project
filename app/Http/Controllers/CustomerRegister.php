<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerRegister extends Controller
{
     public function Index()
    {
        return view('CustomerEntry');
    }
}
