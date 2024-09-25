<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edituser extends Component
{
    public $name,$email,$password,$level,$idX;


    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->idX = $user->id;
        $this->email = $user->email;
        $this->level = $user->level;
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
        ];
        return view('livewire.backend.user.edituser', $data)->extends('layouts.backend.main', $data)->section('content');
    }


    public function update($id)
    {
        $user = User::findOrFail($id);
        if($this->password != ""){
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'level' => $this->level,
            ]);
            session()->flash('insert', 'Data berhasil disimpan.');
        }else{
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'level' => $this->level,
            ]);
            session()->flash('insert', 'Data berhasil disimpan.');
        }

    }


}
