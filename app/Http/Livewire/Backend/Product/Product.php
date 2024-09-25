<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product as ModelsProduct;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];


    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "outlet" => ModelsProduct::where('product', 'like', '%'.$this->search.'%')->where('user_id','=',auth()->user()->id)->groupBy('user_id')->paginate(5),
        ];
        return view('livewire.backend.product.product', $data)->extends('layouts.backend.main', $data)->section('content');
    }

    public function delete($user_id)
    {
        $user = ModelsProduct::where('user_id','=',$user_id);
        $user->delete();
        session()->flash('hapus', 'Data Berhasil Dihapus!');
    }
}
