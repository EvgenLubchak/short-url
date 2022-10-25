<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Index page
     *
     * @return View
     */
    public function index(): View
    {
        return view('index');
    }
}
