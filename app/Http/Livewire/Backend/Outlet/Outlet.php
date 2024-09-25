<?php

namespace App\Http\Livewire\Backend\Outlet;

use App\Models\Setting;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Outlet extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "user" => User::where('name', 'like', '%'.$this->search.'%')->where('level','=','Outlet')->paginate(5),
        ];
        return view('livewire.backend.outlet.outlet', $data)->extends('layouts.backend.main', $data)->section('content');
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('hapus', 'Data Berhasil Dihapus!');
    }
}
