<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function index(){
        $data = Data::all();
        return view('welcome', compact('data'));
    }

    public function create(){
        return view('tambah');
    }

    public function store(Request $request){
        $rules = [
            'nama'  => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Data::create([
            'nama'  => $request->nama
        ]);

        return redirect()->route('index');
    }
}
