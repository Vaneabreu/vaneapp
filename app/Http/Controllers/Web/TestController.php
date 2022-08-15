<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $this->user = auth()->user();

            abort_unless($this->user->can_view, 403, 'user is not admin');

            return $next($request);
        }); 
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function register()
    {
        return view('register');
    }

    public function branch()
    {
        return view('branch');
    }

    public function pay()
    {
        return view('pay');
    }

    public function bill()
    {
        return view('bill');
    }

    public function users()
    {
        return view('users');
    }

    public function contact()
    {
        return view('contact');
    }

    public function cars()
    {
        return view('cars');
    }
    
    public function expenses()
    {
        return view('expenses');
    }

    public function bill_detail()
    {
        return view('bill_detail');
    }

    public function notes()
    {
        return view('notes');
    }
}
