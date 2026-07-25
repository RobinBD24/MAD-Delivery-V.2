<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brands = [
            ['name' => 'Cheez! Pizza', 'slug' => 'cheez', 'description' => 'Thick & thin crust gourmet pizza'],
            ['name' => 'Madchef', 'slug' => 'madchef', 'description' => 'Gourmet burgers, wraps & rice meals'],
        ];
        return view('home', compact('brands'));
    }
}
