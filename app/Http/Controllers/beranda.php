<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\profilController;

class beranda extends Controller
{
    public function index() {
        return view ('beranda');
    }
    public function profil() {
        return view ('profil');
    }
    
}
?>