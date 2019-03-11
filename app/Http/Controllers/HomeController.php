<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Saritasa\Laravel\Controllers\BaseController;
use App\Models;

/**
 * Controller for home page.
 */
class HomeController extends BaseController
{
    /**
     * Home page
     *
     * @return View
     */
    public function index(): View
    {
        $brands = Models\CarsBrands::all();
        return view('home.index', [
            'brands' => $brands
        ]);
    }
}
