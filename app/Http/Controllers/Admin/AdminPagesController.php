<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPagesController extends Controller
{
    public function admin(): View
    {
        return view('pages.admin.admin');
    }
}
