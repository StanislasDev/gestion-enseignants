<?php

namespace App\Http\Controllers;

use App\Models\Enseignants;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index', ['enseignants' => Enseignants::latest()->get(),]
            );
    }
}
