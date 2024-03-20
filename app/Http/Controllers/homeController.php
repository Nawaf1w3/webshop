<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categorie;

class homeController extends Controller

{
    public function index(){

        $categories = Categorie::get();

        return view('welcome', compact('categories'));
    }


}