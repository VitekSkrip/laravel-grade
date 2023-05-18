<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServiceController extends Controller
{
    public function __construct()
    {
    }

    public function show(
    ): View {
        return view('pages.service');
    }
}
