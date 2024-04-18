<?php

namespace App\Http\Controllers;
use App\Models\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function create(){

        return view('size.create');
    }

    public function store(Request $request){
  ;
        $request->validate([
            'name'=>'required|string',
        ]);


        $size = new Size;
        $size->name = $request->input('name');
        $size->save();

        return view('size.create');

    }
}
