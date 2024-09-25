<?php

namespace App\Http\Livewire\Backend\Outlet;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Formoutlet extends Component
{
    public $name,$email,$password,$location,$owner;

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->owner = '';
        $this->location = '';
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
        ];
        return view('livewire.backend.outlet.formoutlet', $data)->extends('layouts.backend.main', $data)->section('content');
    }


    public function store()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'owner' => $this->owner,
            'location' => $this->location,
            'password' => Hash::make($this->password),
            'level' => 'Outlet',
        ]);
        session()->flash('insert', 'Data berhasil disimpan.');
        $this->resetInputFields();
    }

}
