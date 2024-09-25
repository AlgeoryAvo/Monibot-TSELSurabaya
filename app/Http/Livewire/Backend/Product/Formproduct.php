<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Livewire\Component;

class Formproduct extends Component
{
    public $iduser,$product,$terjual,$price;
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "user" => User::where('level','=','Outlet')->paginate(5),
        ];
        return view('livewire.backend.product.formproduct', $data)->extends('layouts.backend.main', $data)->section('content');
    }


    public function store()
    {
        Product::create([
            'user_id' => auth()->user()->id,
            'product' => $this->product,
            'terjual' => $this->terjual,
            'price' => $this->price,
        ]);
        session()->flash('insert', 'Data berhasil disimpan.');
        return redirect('product');
    }
}
