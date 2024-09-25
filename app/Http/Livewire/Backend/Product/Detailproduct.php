<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Detailproduct extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];
    protected $listeners = ['refreshComponent' => '$refresh'];


    public $product;
    public function mount($user_id)
    {
        $this->product = Product::where('user_id','=',$user_id)->get();
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            // 'z'    => Product::where('user_id','=',$user_id),
        ];
        return view('livewire.backend.product.detailproduct', $data)->extends('layouts.backend.main', $data)->section('content');
    }

    public function delete($id)
    {
        $user = Product::findOrFail($id);
        $user->delete();
        session()->flash('hapus', 'Data Berhasil Dihapus!');
    }
}
