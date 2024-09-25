<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Formuser extends Component
{
    public $name,$email,$password,$level;

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->level = '';
    }


    public function render()
    {
        $data = [
            "setting" => Setting::get(),
        ];
        return view('livewire.backend.user.formuser', $data)->extends('layouts.backend.main', $data)->section('content');
    }

    public function store()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'level' => $this->level,
        ]);
        session()->flash('insert', 'Data berhasil disimpan.');
        $this->resetInputFields();
    }
}
