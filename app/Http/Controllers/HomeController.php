<?php

namespace App\Http\Controllers;

use App\Models\Enseignants;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        
        return view('home.index', [
            'enseignants' => Enseignants::latest()->get(),
        ]);
    }
}
