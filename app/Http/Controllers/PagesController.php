<?php

namespace App\Http\Controllers;

use App\Catégorie;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){
        $categories = Catégorie::all();
        return view('pages.index')->with('categories', $categories);
    }

    public function checkOut(){
        return view('pages.checkout');
    }

}