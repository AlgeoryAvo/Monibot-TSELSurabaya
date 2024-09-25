<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\Setting;
use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];


    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "user" => ModelsUser::where('name', 'like', '%'.$this->search.'%')->where('level','!=','Outlet')->paginate(5),
        ];
        return view('livewire.backend.user.user', $data)->extends('layouts.backend.main', $data)->section('content');
    }

    public function delete($id)
    {
        $user = ModelsUser::findOrFail($id);
        $user->delete();
        session()->flash('hapus', 'Data Berhasil Dihapus!');
    }
}
