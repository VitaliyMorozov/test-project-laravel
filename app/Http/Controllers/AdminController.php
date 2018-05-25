<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Saritasa\Laravel\Controllers\BaseController;

/**
 * Admin default controller.
 */
class AdminController extends BaseController
{
    /**
     * Default route.
     *
     * @return View
     */
    public function index(): View
    {
        return view('layouts/admin');
    }
}
