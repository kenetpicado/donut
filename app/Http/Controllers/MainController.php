<?php

namespace App\Http\Controllers;

use App\Services\YearService;

class MainController extends Controller
{

    public function __construct(private YearService $years)
    {
        //
    }

    /* Main View */
    public function index()
    {
        return view('main.home', ['years' => $this->years->get()]);
    }
    
    /* Range View */
    public function range()
    {
        return view('main.range',  ['years' => $this->years->get()]);
    }
}
