<?php

namespace App\Http\Controllers;

use App\Models\Presences;
use Illuminate\View\View;
use App\Models\Enseignants;

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
            'presences' => Presences::latest()->paginate(10),
        ]);
    }
}
