<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class HomeController extends Controller
{
    public function index() 
    {
        $currentTime = now()->format("H:i:s");
        $hour = date("H");
        //dd($hour); // var_dump + die();
        /* //MOže i ovako
        return view('welcome', [
            'time' => $currentTime
        ]);

        */
        return view('welcome', @compact('currentTime', 'hour'));
        
    }
}
