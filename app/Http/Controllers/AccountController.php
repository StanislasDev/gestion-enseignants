<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user(); 

        // Retourner la vue avec les détails de l'utilisateur
        return view('auth.account', compact('user'));
    }
}
