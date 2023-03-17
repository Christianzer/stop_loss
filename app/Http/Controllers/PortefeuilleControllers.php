<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortefeuilleControllers extends Controller
{
    //
    public function portefeuille(){
        return view('portefeuille');
    }

    public function portefeuille_create(Request $request){

    }

    public function position(){
        return view('position');
    }
}
