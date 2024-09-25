<?php

namespace App\Http\Livewire\Backend\Outlet;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Editoutlet extends Component
{
    public $name,$email,$password,$location,$owner,$idX;

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->location = $user->location;
        $this->owner = $user->owner;
        $this->email = $user->email;
        $this->idX = $user->id;
    }


    public function render()
    {
        $data = [
            "setting" => Setting::get(),
        ];
        return view('livewire.backend.outlet.editoutlet', $data)->extends('layouts.backend.main', $data)->section('content');

    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        if($this->password != ""){
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'owner' => $this->owner,
                'location' => $this->location,
                'password' => Hash::make($this->password),
                'level' => 'Outlet',
            ]);
            session()->flash('insert', 'Data berhasil disimpan.');
        }else{
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'owner' => $this->owner,
                'location' => $this->location,
                'level' => 'Outlet',
            ]);
            session()->flash('insert', 'Data berhasil disimpan.');
        }

    }
}
