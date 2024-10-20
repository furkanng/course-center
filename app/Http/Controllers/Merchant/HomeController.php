<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(): view
    {
        return view("merchant.pages.home");
    }
}
