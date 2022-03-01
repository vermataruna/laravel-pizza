<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class FrontEndController extends Controller
{
    public function index() {
        $pizzas = Pizza::latest()->get();
        return view('frontpage', compact('pizzas'));
    }
}
