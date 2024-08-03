<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view("panel.pages.home");
    }
}
