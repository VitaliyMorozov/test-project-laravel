<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Contracts\View\View;
use Saritasa\Laravel\Controllers\BaseController;
use App\Models\User;
 
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
        $users = User::all();
        foreach ($users as $user) {
            dd($user->toArray());
        }
        return view('layouts/admin');
    }
}