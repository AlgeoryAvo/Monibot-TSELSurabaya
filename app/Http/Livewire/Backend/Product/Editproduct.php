<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use App\Models\Setting;
use Livewire\Component;

class Editproduct extends Component
{
    public $iduser,$product,$terjual,$price,$idx;

    public function mount($id)
    {
        $user = Product::findOrFail($id);
        $this->product = $user->product;
        $this->terjual = $user->terjual;
        $this->price = $user->price;
        $this->price = $user->price;
        $this->idx = $user->id;
    }

    public function update($id)
    {
        $pr = Product::findOrFail($id);
        $pr->update([
            'product' => $this->product,
            'terjual' => $this->terjual,
            'price' => $this->price,
        ]);
        session()->flash('insert', 'Data berhasil disimpan.');

    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
        ];
        return view('livewire.backend.product.editproduct', $data)->extends('layouts.backend.main', $data)->section('content');

    }
}
